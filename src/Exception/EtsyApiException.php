<?php

declare(strict_types=1);

namespace Survos\Etsy\Exception;

/**
 * A non-2xx response from Etsy.
 *
 * Etsy's error envelope is flatter than eBay's: usually `{error: "..."}` or
 * `{error: "...", error_description: "..."}`, sometimes a plain string. All three
 * shapes are normalized here so a caller has one thing to read.
 */
class EtsyApiException extends \RuntimeException implements EtsyException
{
    public function __construct(
        public readonly int $statusCode,
        public readonly ?string $errorCode = null,
        public readonly ?string $rawBody = null,
        string $message = '',
        ?\Throwable $previous = null,
    ) {
        parent::__construct(
            '' !== $message ? $message : self::summarize($statusCode, $errorCode, $rawBody),
            $statusCode,
            $previous,
        );
    }

    /** @param array<string, mixed> $payload */
    public static function fromPayload(int $statusCode, array $payload, ?string $rawBody = null): self
    {
        $error = isset($payload['error']) && is_string($payload['error']) ? $payload['error'] : null;
        $message = '';
        foreach (['error_description', 'error_message', 'message'] as $key) {
            if (isset($payload[$key]) && is_string($payload[$key])) {
                $message = $payload[$key];

                break;
            }
        }

        $text = self::summarize($statusCode, $error, $rawBody);
        if ('' !== $message) {
            $text .= ': ' . $message;
        }

        return match (true) {
            401 === $statusCode, 403 === $statusCode => new EtsyAuthenticationException($statusCode, $error, $rawBody, $text),
            429 === $statusCode => new EtsyRateLimitException($statusCode, $error, $rawBody, $text),
            default => new self($statusCode, $error, $rawBody, $text),
        };
    }

    private static function summarize(int $status, ?string $error, ?string $rawBody): string
    {
        $text = sprintf('Etsy returned HTTP %d', $status);
        if (null !== $error) {
            return $text . ' (' . $error . ')';
        }

        return null !== $rawBody && '' !== $rawBody
            ? $text . '. Body: ' . mb_substr($rawBody, 0, 300)
            : $text . '.';
    }
}
