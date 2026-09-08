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
}
