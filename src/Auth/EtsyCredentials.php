<?php

declare(strict_types=1);

namespace Survos\Etsy\Auth;

/**
 * One Etsy application's keys, from the "Your Apps" page.
 *
 * `keystring` is sent as `x-api-key` on EVERY request, including authenticated
 * ones — it identifies the app alongside the bearer token that identifies the
 * seller. Omitting it fails even with a perfectly good OAuth token, which is a
 * confusing way to spend an afternoon.
 */
final readonly class EtsyCredentials
{
    public function __construct(
        public string $keystring,
        public ?string $sharedSecret = null,
        public ?string $redirectUri = null,
    ) {
    }

    /**
     * The x-api-key header value.
     *
     * Etsy wants `keystring:shared_secret`, not the keystring alone -- the
     * securityScheme in their own contract says so, and an app-level call without
     * the secret fails with a 403 whose message is, mercifully, exactly
     * "Shared secret is required in x-api-key header."
     *
     * Falls back to the bare keystring when no secret is configured, which is
     * enough for some OAuth-authenticated calls and fails loudly for the rest.
     */
    public function apiKeyHeader(): string
    {
        return null !== $this->sharedSecret && '' !== $this->sharedSecret
            ? $this->keystring . ':' . $this->sharedSecret
            : $this->keystring;
    }
}
