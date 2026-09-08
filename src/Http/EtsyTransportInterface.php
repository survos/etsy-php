<?php

declare(strict_types=1);

namespace Survos\Etsy\Http;

/**
 * The single seam between generated API classes and the network.
 *
 * Carries an encoding, unlike the eBay equivalent: Etsy takes most write bodies
 * as `application/x-www-form-urlencoded` rather than JSON, and generated code
 * knows which because the contract says so — the transport cannot guess.
 */
interface EtsyTransportInterface
{
    /**
     * @param string                     $method   HTTP verb
     * @param string                     $path     full path, e.g. `/v3/application/shops/1/listings`
     * @param array<string, scalar|null> $query
     * @param array<string, mixed>|null  $body
     * @param array<string, string>      $headers
     * @param 'json'|'form'              $encoding how to serialize $body
     *
     * @return array<string, mixed> decoded JSON response; [] for 204 No Content
     */
    public function request(
        string $method,
        string $path,
        array $query = [],
        ?array $body = null,
        array $headers = [],
        string $encoding = 'json',
    ): array;

    /**
     * Upload a file as multipart/form-data.
     *
     * Separate from request() because Etsy's image endpoint takes actual BYTES --
     * it does not fetch a URL the way eBay and Mercado Libre do. Anything that
     * wants a picture on a listing has to read it first.
     *
     * @param resource|string       $contents stream or raw bytes
     * @param array<string, scalar> $fields   other form fields sent alongside
     *
     * @return array<string, mixed>
     */
    public function upload(
        string $path,
        string $fieldName,
        mixed $contents,
        string $filename,
        array $fields = [],
    ): array;
}
