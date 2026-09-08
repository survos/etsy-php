<?php

declare(strict_types=1);

namespace Survos\Etsy\Auth;

/**
 * The scopes this library's calls need.
 *
 * Etsy scopes are fine-grained and read/write are separate, so a token minted for
 * `listings_r` cannot create a draft. Ask for everything up front: widening later
 * means sending the seller back through consent.
 */
final class EtsyScope
{
    public const string LISTINGS_READ = 'listings_r';
    public const string LISTINGS_WRITE = 'listings_w';
    public const string LISTINGS_DELETE = 'listings_d';
    public const string SHOPS_READ = 'shops_r';
    public const string SHOPS_WRITE = 'shops_w';
    public const string PROFILE_READ = 'profile_r';
    public const string EMAIL_READ = 'email_r';

    /**
     * Everything needed to draft and publish a listing with images.
     *
     * @return list<string>
     */
    public static function forListing(): array
    {
        return [self::LISTINGS_READ, self::LISTINGS_WRITE, self::SHOPS_READ];
    }
}
