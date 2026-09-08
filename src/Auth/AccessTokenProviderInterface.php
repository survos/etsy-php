<?php

declare(strict_types=1);

namespace Survos\Etsy\Auth;

interface AccessTokenProviderInterface
{
    /** @throws \Survos\Etsy\Exception\EtsyAuthenticationException */
    public function accessToken(): string;

    /** The seller's user id, parsed from the token prefix. Needed to resolve their shop. */
    public function userId(): ?int;
}
