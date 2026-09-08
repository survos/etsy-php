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
final readonly class UserAddressApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Open API V3 endpoint to delete a UserAddress for a User.
     *
     * @param int $user_address_id The numeric ID of the user's address.
     *
     * @return array<string, mixed>
     */
    public function deleteUserAddress(int $user_address_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/user/addresses/{user_address_id}', [
            '{user_address_id}' => rawurlencode((string) $user_address_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Open API V3 endpoint to retrieve a UserAddress for a User.
     *
     * @param int $user_address_id The numeric ID of the user's address.
     */
    public function getUserAddress(int $user_address_id): Model\UserAddress
    {
        $path = strtr(self::BASE_PATH . '/v3/application/user/addresses/{user_address_id}', [
            '{user_address_id}' => rawurlencode((string) $user_address_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\UserAddress::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Open API V3 endpoint to retrieve UserAddresses for a User.
     *
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     */
    public function getUserAddresses(?int $limit = null, ?int $offset = null): Model\UserAddresses
    {
        $path = self::BASE_PATH . '/v3/application/user/addresses';
        $query = [];
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\UserAddresses::fromArray($response);
    }
}
