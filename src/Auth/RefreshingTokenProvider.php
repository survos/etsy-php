<?php

declare(strict_types=1);

namespace Survos\Etsy\Auth;

use Survos\Etsy\Exception\EtsyAuthenticationException;

/**
 * Refreshes the access token when it nears expiry and hands the replacement to the
 * caller's store.
 *
 * Etsy access tokens last one hour, so this fires far more often than the eBay
 * equivalent -- roughly every session rather than every few months. Refresh tokens
 * last ninety days and are NOT rotated, so a persist failure is recoverable here in
 * a way it is not on Mercado Libre: the old refresh token still works.
 *
 * Ninety days is still a deadline, though. A shop that goes three months without a
 * listing needs the seller back through consent, and nothing warns you first.
 */
final class RefreshingTokenProvider implements AccessTokenProviderInterface
{
    /** @var callable(): ?EtsyToken */
    private $load;

    /** @var callable(EtsyToken): void */
    private $persist;

    private ?EtsyToken $cached = null;

    /**
     * @param callable(): ?EtsyToken    $load
     * @param callable(EtsyToken): void $persist
     */
    public function __construct(
        private readonly OAuthService $oauth,
        callable $load,
        callable $persist,
        private readonly int $leewaySeconds = 60,
    ) {
        $this->load = $load;
        $this->persist = $persist;
    }

    public function accessToken(): string
    {
        return $this->current()->accessToken;
    }

    public function userId(): ?int
    {
        return $this->current()->userId;
    }

    private function current(): EtsyToken
    {
        $token = $this->cached ??= ($this->load)();

        if (null === $token) {
            throw new EtsyAuthenticationException(
                401, null, null,
                'No stored Etsy token. Send the seller through OAuthService::consentUrl() first.',
            );
        }

        if (!$token->isExpired(leewaySeconds: $this->leewaySeconds)) {
            return $token;
        }

        if (!$token->canRefresh()) {
            throw new EtsyAuthenticationException(
                401, null, null,
                'The Etsy access token expired and there is no refresh token. Re-consent required.',
            );
        }

        $refreshed = $this->oauth->refresh($token);
        ($this->persist)($refreshed);
        $this->cached = $refreshed;

        return $refreshed;
    }
}
