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
final readonly class ShopApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the shop identified by a specific shop ID.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function getShop(int $shop_id): Model\Shop
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\Shop::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Updates a shop. Assumes that all string parameters are provided in the shop's primary language. Please note that the policy_additional field should only be set for shops located in the EU. Pas...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function updateShop(int $shop_id, Model\UpdateShopRequest $body): Model\Shop
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('PUT', $path, $query, $body->toArray(), $headers, 'form');
        return Model\Shop::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the shop identified by the shop owner's user ID.
     *
     * @param int $user_id The numeric user ID of the [user](/documentation/reference#tag/User) who owns this shop.
     */
    public function getShopByOwnerUserId(int $user_id): Model\Shop
    {
        $path = strtr(self::BASE_PATH . '/v3/application/users/{user_id}/shops', [
            '{user_id}' => rawurlencode((string) $user_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\Shop::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Open API V3 endpoint for searching shops by name. Note: We make every effort to ensure that frozen or removed shops are not included in the search results. However, rarely, due to timing issue...
     *
     * @param string $shop_name The shop's name string.
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     */
    public function findShops(?string $shop_name = null, ?int $limit = null, ?int $offset = null): Model\Shops
    {
        $path = self::BASE_PATH . '/v3/application/shops';
        $query = [];
        if ($shop_name !== null) {
            $query['shop_name'] = $shop_name;
        }
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\Shops::fromArray($response);
    }
}
