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
final readonly class ShopListingProductApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Open API V3 endpoint to retrieve a ListingProduct by ID.
     *
     * @param int $listing_id The listing to return a ListingProduct for.
     * @param int $product_id The numeric ID for a specific [product](/documentation/reference#tag/ShopListing-Product) purchased from a listing.
     * @param bool|null $legacy This parameter is needed to enable new parameters and response values related to processing profiles.
     */
    public function getListingProduct(int $listing_id, int $product_id, ?bool $legacy = null): Model\ListingInventoryProduct
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}/inventory/products/{product_id}', [
            '{listing_id}' => rawurlencode((string) $listing_id),
            '{product_id}' => rawurlencode((string) $product_id),
        ]);
        $query = [];
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ListingInventoryProduct::fromArray($response);
    }
}
