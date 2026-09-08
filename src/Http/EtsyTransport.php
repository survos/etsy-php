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
                'x-api-key' => $this->credentials->apiKeyHeader(),
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

    public function upload(
        string $path,
        string $fieldName,
        mixed $contents,
        string $filename,
        array $fields = [],
    ): array {
        $headers = [
            'Accept' => 'application/json',
            'x-api-key' => $this->credentials->apiKeyHeader(),
        ];

        if (null !== $this->tokenProvider) {
            $headers['Authorization'] = 'Bearer ' . $this->tokenProvider->accessToken();
        }

        if (is_string($contents)) {
            $stream = fopen('php://temp', 'r+');
            if (false === $stream) {
                throw new \RuntimeException('Could not open a temp stream for the upload.');
            }
            fwrite($stream, $contents);
            rewind($stream);
            $contents = $stream;
        }

        // Symfony's HttpClient encodes an array body containing a resource as
        // multipart/form-data and sets the boundary itself, so Content-Type is
        // deliberately NOT set here -- setting it would omit the boundary.
        $response = $this->httpClient->request('POST', self::API_HOST . $path, [
            'headers' => $headers,
            'body' => [...$fields, $fieldName => $contents],
        ]);

        $status = $response->getStatusCode();
        $raw = $response->getContent(throw: false);
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
     * Etsy expects scalars, and takes structured values two different ways in a form
     * body -- which is not documented anywhere and is only visible from its errors.
     *
     * A plain list of scalars (tags, materials, styles, image_ids) must be
     * COMMA-SEPARATED. JSON-encoding one is rejected with
     * `{"path":"/tags","type":"invalid_characters"}`, because the brackets and
     * quotes are themselves the invalid characters -- an error that reads like the
     * tags are bad when the encoding is.
     *
     * Anything nested (the inventory `products` payload) really is JSON.
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
            } elseif (self::isScalarList($value)) {
                $flat[$key] = implode(',', array_map(
                    static fn (mixed $v): string => is_bool($v) ? ($v ? 'true' : 'false') : (string) $v,
                    $value,
                ));
            } else {
                $flat[$key] = json_encode($value, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);
            }
        }

        return $flat;
    }

    /** @phpstan-assert-if-true list<scalar> $value */
    private static function isScalarList(mixed $value): bool
    {
        if (!is_array($value) || !array_is_list($value) || [] === $value) {
            return false;
        }

        foreach ($value as $item) {
            if (!is_scalar($item)) {
                return false;
            }
        }

        return true;
    }
}
