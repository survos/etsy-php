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
}
