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
final readonly class ShopListingVariationImageApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Gets all variation images on a listing.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     */
    public function getListingVariationImages(int $shop_id, int $listing_id): Model\ListingVariationImages
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/variation-images', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ListingVariationImages::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Creates variation images on a listing. `variation_images` is an array with inputs for the `property_id`, `value_id`, and `image_id` fields. `image_ids` are associated with a `ListingImage` on...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     */
    public function updateVariationImages(int $shop_id, int $listing_id, Model\UpdateVariationImagesRequest $body): Model\ListingVariationImages
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/variation-images', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'json');
        return Model\ListingVariationImages::fromArray($response);
    }
}
