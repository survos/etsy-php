<?php

declare(strict_types=1);

namespace Survos\Etsy\Exception;

/** 429. Etsy allows 10 requests/second and 10,000/day per app. Waiting helps. */
final class EtsyRateLimitException extends EtsyApiException
{
}
