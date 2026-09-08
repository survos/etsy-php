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
final readonly class ReviewApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Open API V3 to retrieve the reviews for a listing given its ID.
     *
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     * @param int|null $min_created The earliest unix timestamp for when a record was created.
     * @param int|null $max_created The latest unix timestamp for when a record was created.
     */
    public function getReviewsByListing(int $listing_id, ?int $limit = null, ?int $offset = null, ?int $min_created = null, ?int $max_created = null): Model\ListingReviews
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}/reviews', [
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        if ($min_created !== null) {
            $query['min_created'] = $min_created;
        }
        if ($max_created !== null) {
            $query['max_created'] = $max_created;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ListingReviews::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Open API V3 to retrieve the reviews from a shop given its ID.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     * @param int|null $min_created The earliest unix timestamp for when a record was created.
     * @param int|null $max_created The latest unix timestamp for when a record was created.
     */
    public function getReviewsByShop(int $shop_id, ?int $limit = null, ?int $offset = null, ?int $min_created = null, ?int $max_created = null): Model\TransactionReviews
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/reviews', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        if ($min_created !== null) {
            $query['min_created'] = $min_created;
        }
        if ($max_created !== null) {
            $query['max_created'] = $max_created;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\TransactionReviews::fromArray($response);
    }
}
