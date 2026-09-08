<?php

declare(strict_types=1);

namespace Survos\Etsy\Http;

use Survos\Etsy\Auth\AccessTokenProviderInterface;
use Survos\Etsy\Auth\EtsyCredentials;
use Survos\Etsy\Exception\EtsyApiException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * The one place that knows about hosts, keys, tokens and error shapes.
 *
 * Two Etsy-specific things live here:
 *
 *  - `x-api-key` goes on EVERY request, authenticated or not. It identifies the
 *    app; the bearer token identifies the seller. A perfectly good OAuth token
 *    still 403s without it, which reads exactly like a token problem.
 *  - Most write bodies are form-urlencoded rather than JSON. The generated code
 *    passes the encoding through because the contract says which; the transport
 *    cannot guess.
 *
 * There is no sandbox. Etsy has one environment, so a Seller App key against a
 * real shop is the only way to test — draft listings are the safety margin.
 */
final readonly class EtsyTransport implements EtsyTransportInterface
{
    public const string API_HOST = 'https://openapi.etsy.com';

    public function __construct(
        private HttpClientInterface $httpClient,
        private EtsyCredentials $credentials,
        private ?AccessTokenProviderInterface $tokenProvider = null,
    ) {
    }

    public function request(
        string $method,
        string $path,
        array $query = [],
        ?array $body = null,
        array $headers = [],
        string $encoding = 'json',
    ): array {
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                // Required on every call, alongside any bearer token.
                'x-api-key' => $this->credentials->keystring,
                ...$headers,
            ],
        ];

        if (null !== $this->tokenProvider) {
            $options['headers']['Authorization'] = 'Bearer ' . $this->tokenProvider->accessToken();
        }

        if ($query !== []) {
            $options['query'] = array_filter($query, static fn (mixed $v): bool => null !== $v);
        }

        if (null !== $body) {
            $body = array_filter($body, static fn (mixed $v): bool => null !== $v);

            if ('form' === $encoding) {
                // Symfony's HttpClient form-encodes an array body and sets the
                // header, but nested arrays have to be flattened first: Etsy takes
                // repeated keys, not PHP's a[0]=x bracket notation.
                $options['body'] = self::flattenForForm($body);
            } else {
                $options['headers']['Content-Type'] = 'application/json';
                $options['body'] = json_encode($body, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);
            }
        }

        $response = $this->httpClient->request($method, self::API_HOST . $path, $options);
        $status = $response->getStatusCode();
        $raw = $response->getContent(throw: false);

        if ('' === $raw) {
            if ($status >= 400) {
                throw EtsyApiException::fromPayload($status, [], $raw);
            }

            return [];
        }

        $payload = json_decode($raw, true);

        if (!is_array($payload)) {
            throw new EtsyApiException($status, null, $raw);
        }

        if ($status >= 400) {
            /** @var array<string, mixed> $payload */
            throw EtsyApiException::fromPayload($status, $payload, $raw);
        }

        return $payload;
    }

    /**
     * Etsy expects scalars, and JSON for anything structured (tags, materials and
     * the inventory payload all arrive as JSON strings inside a form body).
     *
     * @param array<string, mixed> $body
     *
     * @return array<string, scalar>
     */
    private static function flattenForForm(array $body): array
    {
        $flat = [];
        foreach ($body as $key => $value) {
            if (is_bool($value)) {
                $flat[$key] = $value ? 'true' : 'false';
            } elseif (is_scalar($value)) {
                $flat[$key] = $value;
            } else {
                $flat[$key] = json_encode($value, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);
            }
        }

        return $flat;
    }
}
