<?php

declare(strict_types=1);

namespace Survos\Etsy\Tests;

use PHPUnit\Framework\TestCase;
use Survos\Etsy\Auth\EtsyCredentials;
use Survos\Etsy\Auth\EtsyToken;
use Survos\Etsy\Auth\OAuthService;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

final class EtsyOAuthTest extends TestCase
{
    private function service(MockHttpClient $client): OAuthService
    {
        return new OAuthService($client, new EtsyCredentials('keystring-abc', 'secret', 'https://example.org/etsy/callback'));
    }

    public function testConsentUrlCarriesAPkceChallenge(): void
    {
        $verifier = OAuthService::generateCodeVerifier();
        $url = $this->service(new MockHttpClient())->consentUrl(['listings_w'], 'state-123', $verifier);

        parse_str((string) parse_url($url, PHP_URL_QUERY), $q);

        self::assertStringStartsWith('https://www.etsy.com/oauth/connect?', $url);
        self::assertSame('S256', $q['code_challenge_method']);
        self::assertSame(OAuthService::challengeFor($verifier), $q['code_challenge']);
        // PKCE is mandatory on Etsy, unlike eBay and Mercado Libre.
        self::assertNotSame($verifier, $q['code_challenge'], 'the challenge is a hash, not the verifier');
    }

    public function testTheVerifierIsLongEnoughForPkce(): void
    {
        $verifier = OAuthService::generateCodeVerifier();

        self::assertGreaterThanOrEqual(43, strlen($verifier));
        self::assertLessThanOrEqual(128, strlen($verifier));
        self::assertMatchesRegularExpression('/^[A-Za-z0-9\-._~]+$/', $verifier);
    }

    public function testTheSellerUserIdIsParsedFromTheTokenPrefix(): void
    {
        $client = new MockHttpClient([new MockResponse((string) json_encode([
            'access_token' => '12345678.abcdefg',
            'expires_in' => 3600,
            'refresh_token' => '12345678.refresh',
        ]))]);

        $token = $this->service($client)->exchangeCode('code', 'verifier');

        // Etsy prefixes the token with the user id; it arrives nowhere else.
        self::assertSame(12345678, $token->userId);
        self::assertFalse($token->isExpired());
    }

    public function testRefreshKeepsTheExistingTokenWhenEtsyOmitsOne(): void
    {
        // Etsy does not rotate refresh tokens, unlike Mercado Libre.
        $client = new MockHttpClient([new MockResponse((string) json_encode([
            'access_token' => '12345678.fresh', 'expires_in' => 3600,
        ]))]);

        $existing = new EtsyToken('12345678.stale', new \DateTimeImmutable('-1 hour'), '12345678.refresh', 12345678);
        $refreshed = $this->service($client)->refresh($existing);

        self::assertSame('12345678.fresh', $refreshed->accessToken);
        self::assertSame('12345678.refresh', $refreshed->refreshToken);
    }

    public function testConsentUrlWithoutARedirectUriExplainsWhy(): void
    {
        $service = new OAuthService(new MockHttpClient(), new EtsyCredentials('k'));

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Etsy compares the whole string');

        $service->consentUrl(['listings_w'], 's', 'v');
    }
}
