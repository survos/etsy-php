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
final readonly class ShopListingOfferingApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Get an Offering for a Listing
     *
     * @param bool|null $legacy This parameter is needed to enable new parameters and response values related to processing profiles.
     */
    public function getListingOffering(int $listing_id, int $product_id, int $product_offering_id, ?bool $legacy = null): Model\ListingInventoryProductOffering
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}/products/{product_id}/offerings/{product_offering_id}', [
            '{listing_id}' => rawurlencode((string) $listing_id),
            '{product_id}' => rawurlencode((string) $product_id),
            '{product_offering_id}' => rawurlencode((string) $product_offering_id),
        ]);
        $query = [];
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ListingInventoryProductOffering::fromArray($response);
    }
}
