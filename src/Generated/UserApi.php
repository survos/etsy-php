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
final readonly class UserApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a user profile based on a unique user ID. Access is limited to profiles of the authenticated user or linked buyers. For the primary_email field, specific app-based permissions are re...
     */
    public function getUser(int $user_id): Model\User
    {
        $path = strtr(self::BASE_PATH . '/v3/application/users/{user_id}', [
            '{user_id}' => rawurlencode((string) $user_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\User::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Returns basic info for the user making the request.
     */
    public function getMe(): Model\SelfModel
    {
        $path = self::BASE_PATH . '/v3/application/users/me';
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\SelfModel::fromArray($response);
    }
}
