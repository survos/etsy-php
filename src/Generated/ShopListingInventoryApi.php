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
final readonly class ShopListingInventoryApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the inventory record for a listing. Listings you did not edit using the Etsy.com inventory tools have no inventory records. This endpoint returns SKU data if you are the owner of the...
     *
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param bool|null $show_deleted A boolean value for inventory whether to include deleted products and their offerings. Default value is false.
     * @param string|null $includes An enumerated string that attaches a valid association. Default value is null.
     */
    public function getListingInventory(int $listing_id, ?bool $show_deleted = null, ?string $includes = null): Model\ListingInventoryWithAssociations
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}/inventory', [
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        if ($show_deleted !== null) {
            $query['show_deleted'] = $show_deleted;
        }
        if ($includes !== null) {
            $query['includes'] = $includes;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ListingInventoryWithAssociations::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Updates the inventory for a listing identified by a listing ID. The update fails if the supplied values for product sku, offering quantity, price, and/or processing profile are incompatible wi...
     *
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param string|null $max_variations_supported Coming soon: This parameter determines whether a third variation can be added to or updated for a listing. It accepts values of 2 or 3, wher...
     */
    public function updateListingInventory(int $listing_id, Model\UpdateListingInventoryRequest $body, ?string $max_variations_supported = null): Model\ListingInventory
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}/inventory', [
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        if ($max_variations_supported !== null) {
            $query['max_variations_supported'] = $max_variations_supported;
        }
        $headers = [];

        $response = $this->transport->request('PUT', $path, $query, $body->toArray(), $headers, 'json');
        return Model\ListingInventory::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the inventory record for each listing referenced by listing ID. Requires the `listings_r` OAuth scope. Limit 100 listing IDs per request. All requested listing IDs must exist — if an...
     *
     * @param array $listing_ids The list of numeric IDS for the listings in a specific Etsy shop.
     */
    public function getListingsInventoryByListingIds(?array $listing_ids = null): Model\ShopListingsWithAssociations
    {
        $path = self::BASE_PATH . '/v3/application/listings/batch/inventory';
        $query = [];
        if ($listing_ids !== null) {
            $query['listing_ids'] = $listing_ids;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListingsWithAssociations::fromArray($response);
    }
}
