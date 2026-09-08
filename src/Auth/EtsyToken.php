<?php

declare(strict_types=1);

namespace Survos\Etsy\Auth;

/**
 * An Etsy OAuth token pair.
 *
 * Access tokens last one hour and refresh tokens ninety days — between eBay's
 * eighteen months and nothing. Etsy does NOT rotate refresh tokens on use, so a
 * refresh response omitting one means keep the one you have.
 *
 * Etsy access tokens are prefixed with the user id: `12345678.abcdef...`. That is
 * the seller's user id and the only place it is handed to you, so it is parsed out
 * rather than requiring a separate /users/me call.
 */
final readonly class EtsyToken
{
    /** @param list<string> $scopes */
    public function __construct(
        public string $accessToken,
        public \DateTimeImmutable $expiresAt,
        public ?string $refreshToken = null,
        public ?int $userId = null,
        public array $scopes = [],
    ) {
    }

    /** @param array<string, mixed> $payload */
    public static function fromResponse(array $payload, ?\DateTimeImmutable $now = null): self
    {
        $now ??= new \DateTimeImmutable();
        $accessToken = (string) ($payload['access_token'] ?? '');

        return new self(
            accessToken: $accessToken,
            expiresAt: $now->modify(sprintf('+%d seconds', (int) ($payload['expires_in'] ?? 3600))),
            refreshToken: isset($payload['refresh_token']) ? (string) $payload['refresh_token'] : null,
            userId: self::userIdFrom($accessToken),
            scopes: isset($payload['scope']) && is_string($payload['scope'])
                ? array_values(array_filter(explode(' ', $payload['scope'])))
                : [],
        );
    }

    /** `12345678.abcdef…` → 12345678 */
    private static function userIdFrom(string $accessToken): ?int
    {
        $dot = strpos($accessToken, '.');

        if (false === $dot || !ctype_digit($prefix = substr($accessToken, 0, $dot))) {
            return null;
        }

        return (int) $prefix;
    }

    public function isExpired(?\DateTimeImmutable $now = null, int $leewaySeconds = 60): bool
    {
        $now ??= new \DateTimeImmutable();

        return $this->expiresAt <= $now->modify(sprintf('+%d seconds', $leewaySeconds));
    }

    public function canRefresh(): bool
    {
        return null !== $this->refreshToken;
    }

    /** @param array<string, mixed> $payload */
    public function refreshed(array $payload, ?\DateTimeImmutable $now = null): self
    {
        $next = self::fromResponse($payload, $now);

        return new self(
            accessToken: $next->accessToken,
            expiresAt: $next->expiresAt,
            // Etsy does not rotate; an omitted refresh_token means keep this one.
            refreshToken: $next->refreshToken ?? $this->refreshToken,
            userId: $next->userId ?? $this->userId,
            scopes: $next->scopes !== [] ? $next->scopes : $this->scopes,
        );
    }
}
