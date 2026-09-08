<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated;

use Survos\Etsy\Http\EtsyTransportInterface;
use Survos\Etsy\Generated\Model;

/**
 * Etsy Open API v3.
 *
 * Generated from eBay's OpenAPI contract. Do not edit.
 * Authentication, sandbox selection and error mapping live behind the transport.
 */
final readonly class OtherApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Check to confirm connectivity to the Etsy API with an application
     */
    public function ping(): Model\Pong
    {
        $path = self::BASE_PATH . '/v3/application/openapi-ping';
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\Pong::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Check the scopes of the provided token
     */
    public function tokenScopes(Model\TokenScopesRequest $body): Model\Scopes
    {
        $path = self::BASE_PATH . '/v3/application/scopes';
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'form');
        return Model\Scopes::fromArray($response);
    }
}
