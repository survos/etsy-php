<?php

declare(strict_types=1);

namespace Survos\Etsy\Exception;

/**
 * 401/403. Retrying cannot help.
 *
 * On Etsy this is very often NOT the token: the x-api-key header is required on
 * every request alongside the bearer token, and omitting it fails the same way a
 * bad token does. Check the header before suspecting the token.
 *
 * A 403 can also mean the app's tier does not permit the call — a Seller App can
 * only touch its own registrant's shop.
 */
final class EtsyAuthenticationException extends EtsyApiException
{
}
