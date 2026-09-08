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
final readonly class ShopShippingProfileApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a list of available shipping carriers and the mail classes associated with them for a given country
     *
     * @param string $origin_country_iso The ISO code of the country from which the listing ships.
     */
    public function getShippingCarriers(?string $origin_country_iso = null): Model\ShippingCarriers
    {
        $path = self::BASE_PATH . '/v3/application/shipping-carriers';
        $query = [];
        if ($origin_country_iso !== null) {
            $query['origin_country_iso'] = $origin_country_iso;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShippingCarriers::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Creates a new ShippingProfile. You can pass a country iso code or a region when creating a ShippingProfile, but not both. Only one is required. You must pass either a shipping_carrier_id AND m...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function createShopShippingProfile(int $shop_id, Model\CreateShopShippingProfileRequest $body): Model\ShopShippingProfile
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopShippingProfile::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a list of shipping profiles available in the specific Etsy shop identified by its shop ID.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function getShopShippingProfiles(int $shop_id): Model\ShopShippingProfiles
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopShippingProfiles::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Deletes a ShippingProfile by given id.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shipping_profile_id The numeric ID of the [shipping profile](/documentation/reference#operation/getShopShippingProfile) associated with the listing. Required wh...
     *
     * @return array<string, mixed>
     */
    public function deleteShopShippingProfile(int $shop_id, int $shipping_profile_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles/{shipping_profile_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shipping_profile_id}' => rawurlencode((string) $shipping_profile_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a Shipping Profile referenced by shipping profile ID.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shipping_profile_id The numeric ID of the [shipping profile](/documentation/reference#operation/getShopShippingProfile) associated with the listing. Required wh...
     */
    public function getShopShippingProfile(int $shop_id, int $shipping_profile_id): Model\ShopShippingProfile
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles/{shipping_profile_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shipping_profile_id}' => rawurlencode((string) $shipping_profile_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopShippingProfile::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Changes the settings in a shipping profile. You can pass a country iso code or a region when updating a ShippingProfile, but not both. Only one is required. You must pass either a shipping_car...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shipping_profile_id The numeric ID of the [shipping profile](/documentation/reference#operation/getShopShippingProfile) associated with the listing. Required wh...
     */
    public function updateShopShippingProfile(int $shop_id, int $shipping_profile_id, Model\UpdateShopShippingProfileRequest $body): Model\ShopShippingProfile
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles/{shipping_profile_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shipping_profile_id}' => rawurlencode((string) $shipping_profile_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('PUT', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopShippingProfile::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Creates a new shipping destination, which sets the shipping cost, carrier, and class for a destination in a [shipping profile](/documentation/reference/#tag/Shop-ShippingProfile). createShopSh...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shipping_profile_id The numeric ID of the [shipping profile](/documentation/reference#operation/getShopShippingProfile) associated with the listing. Required wh...
     */
    public function createShopShippingProfileDestination(int $shop_id, int $shipping_profile_id, Model\CreateShopShippingProfileDestinationRequest $body): Model\ShopShippingProfileDestination
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles/{shipping_profile_id}/destinations', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shipping_profile_id}' => rawurlencode((string) $shipping_profile_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopShippingProfileDestination::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a list of shipping destination objects associated with a shipping profile.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shipping_profile_id The numeric ID of the [shipping profile](/documentation/reference#operation/getShopShippingProfile) associated with the listing. Required wh...
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     */
    public function getShopShippingProfileDestinationsByShippingProfile(int $shop_id, int $shipping_profile_id, ?int $limit = null, ?int $offset = null): Model\ShopShippingProfileDestinations
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles/{shipping_profile_id}/destinations', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shipping_profile_id}' => rawurlencode((string) $shipping_profile_id),
        ]);
        $query = [];
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopShippingProfileDestinations::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Deletes a shipping destination and removes the destination option from every listing that uses the associated shipping profile. A shipping profile requires at least one shipping destination, s...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shipping_profile_id The numeric ID of the [shipping profile](/documentation/reference#operation/getShopShippingProfile) associated with the listing. Required wh...
     * @param int $shipping_profile_destination_id The numeric ID of the shipping profile destination in the [shipping profile](/documentation/reference#tag/Shop-ShippingProfile) associated w...
     *
     * @return array<string, mixed>
     */
    public function deleteShopShippingProfileDestination(int $shop_id, int $shipping_profile_id, int $shipping_profile_destination_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles/{shipping_profile_id}/destinations/{shipping_profile_destination_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shipping_profile_id}' => rawurlencode((string) $shipping_profile_id),
            '{shipping_profile_destination_id}' => rawurlencode((string) $shipping_profile_destination_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Updates an existing shipping destination, which can set or reassign the shipping cost, carrier, and class for a destination.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shipping_profile_id The numeric ID of the [shipping profile](/documentation/reference#operation/getShopShippingProfile) associated with the listing. Required wh...
     * @param int $shipping_profile_destination_id The numeric ID of the shipping profile destination in the [shipping profile](/documentation/reference#tag/Shop-ShippingProfile) associated w...
     */
    public function updateShopShippingProfileDestination(int $shop_id, int $shipping_profile_id, int $shipping_profile_destination_id, Model\UpdateShopShippingProfileDestinationRequest $body): Model\ShopShippingProfileDestination
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles/{shipping_profile_id}/destinations/{shipping_profile_destination_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shipping_profile_id}' => rawurlencode((string) $shipping_profile_id),
            '{shipping_profile_destination_id}' => rawurlencode((string) $shipping_profile_destination_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('PUT', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopShippingProfileDestination::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Creates a new shipping profile upgrade, which can establish a price for a shipping option, such as an alternate carrier or faster delivery.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shipping_profile_id The numeric ID of the [shipping profile](/documentation/reference#operation/getShopShippingProfile) associated with the listing. Required wh...
     */
    public function createShopShippingProfileUpgrade(int $shop_id, int $shipping_profile_id, Model\CreateShopShippingProfileUpgradeRequest $body): Model\ShopShippingProfileUpgrade
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles/{shipping_profile_id}/upgrades', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shipping_profile_id}' => rawurlencode((string) $shipping_profile_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopShippingProfileUpgrade::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the list of shipping profile upgrades assigned to a specific shipping profile.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shipping_profile_id The numeric ID of the [shipping profile](/documentation/reference#operation/getShopShippingProfile) associated with the listing. Required wh...
     */
    public function getShopShippingProfileUpgrades(int $shop_id, int $shipping_profile_id): Model\ShopShippingProfileUpgrades
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles/{shipping_profile_id}/upgrades', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shipping_profile_id}' => rawurlencode((string) $shipping_profile_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopShippingProfileUpgrades::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Deletes a shipping profile upgrade and removes the upgrade option from every listing that uses the associated shipping profile.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shipping_profile_id The numeric ID of the shipping profile.
     * @param int $upgrade_id The numeric ID that is associated with a shipping upgrade
     *
     * @return array<string, mixed>
     */
    public function deleteShopShippingProfileUpgrade(int $shop_id, int $shipping_profile_id, int $upgrade_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles/{shipping_profile_id}/upgrades/{upgrade_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shipping_profile_id}' => rawurlencode((string) $shipping_profile_id),
            '{upgrade_id}' => rawurlencode((string) $upgrade_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Updates a shipping profile upgrade and updates any listings that use the shipping profile.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shipping_profile_id The numeric ID of the [shipping profile](/documentation/reference#operation/getShopShippingProfile) associated with the listing. Required wh...
     * @param int $upgrade_id The numeric ID that is associated with a shipping upgrade
     */
    public function updateShopShippingProfileUpgrade(int $shop_id, int $shipping_profile_id, int $upgrade_id, Model\UpdateShopShippingProfileUpgradeRequest $body): Model\ShopShippingProfileUpgrade
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shipping-profiles/{shipping_profile_id}/upgrades/{upgrade_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shipping_profile_id}' => rawurlencode((string) $shipping_profile_id),
            '{upgrade_id}' => rawurlencode((string) $upgrade_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('PUT', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopShippingProfileUpgrade::fromArray($response);
    }
}
