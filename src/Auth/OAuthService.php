<?php

declare(strict_types=1);

namespace Survos\Etsy\Auth;

use Survos\Etsy\Exception\EtsyApiException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Etsy's OAuth 2.0 authorization-code flow, with PKCE.
 *
 * PKCE is MANDATORY here, unlike eBay and Mercado Libre. Etsy rejects an
 * authorization request without a code_challenge, and rejects the token exchange
 * without the matching code_verifier — so the verifier generated at /connect has
 * to survive until the callback. Keep it in the session; it is single use and
 * short-lived, and losing it means starting the consent again.
 *
 * There is no client-credentials equivalent worth using: Etsy's app-only calls use
 * the x-api-key header alone, which the transport already sends.
 */
final readonly class OAuthService
{
    public const string AUTHORIZE_URL = 'https://www.etsy.com/oauth/connect';
    public const string TOKEN_URL = 'https://api.etsy.com/v3/public/oauth/token';

    public function __construct(
        private HttpClientInterface $httpClient,
        private EtsyCredentials $credentials,
    ) {
    }

    /**
     * A PKCE verifier: 43-128 unreserved characters. Generate one per consent
     * attempt and hand it back to {@see exchangeCode()} unchanged.
     */
    public static function generateCodeVerifier(): string
    {
        return rtrim(strtr(base64_encode(random_bytes(48)), '+/', '-_'), '=');
    }

    public static function challengeFor(string $codeVerifier): string
    {
        return rtrim(strtr(base64_encode(hash('sha256', $codeVerifier, true)), '+/', '-_'), '=');
    }

    /**
     * Where to send a seller to grant access.
     *
     * @param list<string> $scopes every scope the token will need; adding one later
     *                             means sending the seller back through consent
     */
    public function consentUrl(array $scopes, string $state, string $codeVerifier): string
    {
        if (null === $this->credentials->redirectUri) {
            throw new \LogicException(
                'consentUrl() needs the redirect URI, and it must match one registered on the '
                . 'app exactly — Etsy compares the whole string.',
            );
        }

        return self::AUTHORIZE_URL . '?' . http_build_query([
            'response_type' => 'code',
            'client_id' => $this->credentials->keystring,
            'redirect_uri' => $this->credentials->redirectUri,
            'scope' => implode(' ', $scopes),
            'state' => $state,
            'code_challenge' => self::challengeFor($codeVerifier),
            'code_challenge_method' => 'S256',
        ]);
    }

    /** Exchange the code from your redirect. Single use, and short-lived. */
    public function exchangeCode(string $code, string $codeVerifier): EtsyToken
    {
        return EtsyToken::fromResponse($this->token([
            'grant_type' => 'authorization_code',
            'client_id' => $this->credentials->keystring,
            'redirect_uri' => (string) $this->credentials->redirectUri,
            'code' => $code,
            'code_verifier' => $codeVerifier,
        ]));
    }

    public function refresh(EtsyToken $token): EtsyToken
    {
        if (null === $token->refreshToken) {
            throw new \LogicException('Cannot refresh a token that has no refresh token.');
        }

        return $token->refreshed($this->token([
            'grant_type' => 'refresh_token',
            'client_id' => $this->credentials->keystring,
            'refresh_token' => $token->refreshToken,
        ]));
    }

    /**
     * @param array<string, string> $body
     *
     * @return array<string, mixed>
     */
    private function token(array $body): array
    {
        $response = $this->httpClient->request('POST', self::TOKEN_URL, [
            'headers' => ['Accept' => 'application/json', 'Content-Type' => 'application/x-www-form-urlencoded'],
            'body' => $body,
        ]);

        $status = $response->getStatusCode();
        $raw = $response->getContent(throw: false);
        $payload = json_decode($raw, true);
        $payload = is_array($payload) ? $payload : [];

        if ($status >= 400) {
            throw EtsyApiException::fromPayload($status, $payload, $raw);
        }

        return $payload;
    }
}
