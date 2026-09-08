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
final readonly class ShopListingApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Creates a physical draft [listing](/documentation/reference#tag/ShopListing) product in a shop on the Etsy channel.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function createDraftListing(int $shop_id, Model\CreateDraftListingRequest $body): Model\ShopListing
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopListing::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Endpoint to list Listings that belong to a Shop. Listings can be filtered using the 'state' param.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param string|null $state When _updating_ a listing, this value can be either `active` or `inactive`. Note: Setting a `draft` listing to `active` will also publish th...
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     * @param string|null $sort_on The value to sort a search result of listings on. NOTES: a) `sort_on` only works when combined with one of the search options (keywords, reg...
     * @param string|null $sort_order The ascending(up) or descending(down) order to sort listings by. NOTE: sort_order only works when combined with one of the search options (k...
     * @param array|null $includes An enumerated string that attaches a valid association. Acceptable inputs are 'Shipping', 'Shop', 'Images', 'User', 'Translations', 'Videos'...
     */
    public function getListingsByShop(int $shop_id, ?string $state = null, ?int $limit = null, ?int $offset = null, ?string $sort_on = null, ?string $sort_order = null, ?array $includes = null): Model\ShopListingsWithAssociations
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        if ($state !== null) {
            $query['state'] = $state;
        }
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        if ($sort_on !== null) {
            $query['sort_on'] = $sort_on;
        }
        if ($sort_order !== null) {
            $query['sort_order'] = $sort_order;
        }
        if ($includes !== null) {
            $query['includes'] = $includes;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListingsWithAssociations::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Open API V3 endpoint to delete a ShopListing. A ShopListing can be deleted only if the state is one of the following: SOLD_OUT, DRAFT, EXPIRED, INACTIVE, ACTIVE and is_available or ACTIVE and...
     *
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     *
     * @return array<string, mixed>
     */
    public function deleteListing(int $listing_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}', [
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a listing record by listing ID.
     *
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param array|null $includes An enumerated string that attaches a valid association. Acceptable inputs are 'Shop', 'Images', 'User', 'Translations', 'Videos', 'Personali...
     * @param string|null $language The IETF language tag for the language of this translation. Ex: `de`, `en`, `es`, `fr`, `it`, `ja`, `nl`, `pl`, `pt`.
     * @param bool|null $allow_suggested_title This parameter will include in the response a suggested title for the listing, if one is available. Since suggestions are only available to...
     */
    public function getListing(int $listing_id, ?array $includes = null, ?string $language = null, ?bool $allow_suggested_title = null): Model\ShopListingWithAssociations
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}', [
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        if ($includes !== null) {
            $query['includes'] = $includes;
        }
        if ($language !== null) {
            $query['language'] = $language;
        }
        if ($allow_suggested_title !== null) {
            $query['allow_suggested_title'] = $allow_suggested_title;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListingWithAssociations::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. A list of all active listings on Etsy paginated by their creation date. Without sort_order listings will be returned newest-first by default.
     *
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     * @param string|null $keywords Search term or phrase that must appear in all results.
     * @param string|null $sort_on The value to sort a search result of listings on. NOTES: a) `sort_on` only works when combined with one of the search options (keywords, reg...
     * @param string|null $sort_order The ascending(up) or descending(down) order to sort listings by. NOTE: sort_order only works when combined with one of the search options (k...
     * @param float|null $min_price The minimum price of listings to be returned by a search result.
     * @param float|null $max_price The maximum price of listings to be returned by a search result.
     * @param int|null $taxonomy_id The numerical taxonomy ID of the listing. See [SellerTaxonomy](/documentation/reference#tag/SellerTaxonomy) and [BuyerTaxonomy](/documentati...
     * @param string|null $shop_location Filters by shop location. If location cannot be parsed, Etsy responds with an error.
     * @param bool|null $is_safe When true, filters out mature/adult content from search results.
     * @param string|null $currency The ISO 4217 alphabetic currency code (e.g., EUR, MXN) for price conversion. If provided, the listing price will be converted to this curren...
     * @param string|null $buyer_country The ISO 3166-1 alpha-2 country code (e.g., DE, MX). Filters results to listings that ship to this country.
     */
    public function findAllListingsActive(?int $limit = null, ?int $offset = null, ?string $keywords = null, ?string $sort_on = null, ?string $sort_order = null, ?float $min_price = null, ?float $max_price = null, ?int $taxonomy_id = null, ?string $shop_location = null, ?bool $is_safe = null, ?string $currency = null, ?string $buyer_country = null): Model\ShopListings
    {
        $path = self::BASE_PATH . '/v3/application/listings/active';
        $query = [];
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        if ($keywords !== null) {
            $query['keywords'] = $keywords;
        }
        if ($sort_on !== null) {
            $query['sort_on'] = $sort_on;
        }
        if ($sort_order !== null) {
            $query['sort_order'] = $sort_order;
        }
        if ($min_price !== null) {
            $query['min_price'] = $min_price;
        }
        if ($max_price !== null) {
            $query['max_price'] = $max_price;
        }
        if ($taxonomy_id !== null) {
            $query['taxonomy_id'] = $taxonomy_id;
        }
        if ($shop_location !== null) {
            $query['shop_location'] = $shop_location;
        }
        if ($is_safe !== null) {
            $query['is_safe'] = $is_safe;
        }
        if ($currency !== null) {
            $query['currency'] = $currency;
        }
        if ($buyer_country !== null) {
            $query['buyer_country'] = $buyer_country;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListings::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a list of all active listings on Etsy in a specific shop, paginated by listing creation date.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int|null $limit The maximum number of results to return.
     * @param string|null $sort_on The value to sort a search result of listings on. NOTES: a) `sort_on` only works when combined with one of the search options (keywords, reg...
     * @param string|null $sort_order The ascending(up) or descending(down) order to sort listings by. NOTE: sort_order only works when combined with one of the search options (k...
     * @param int|null $offset The number of records to skip before selecting the first result.
     * @param string|null $keywords Search term or phrase that must appear in all results.
     */
    public function findAllActiveListingsByShop(int $shop_id, ?int $limit = null, ?string $sort_on = null, ?string $sort_order = null, ?int $offset = null, ?string $keywords = null): Model\ShopListings
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/active', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($sort_on !== null) {
            $query['sort_on'] = $sort_on;
        }
        if ($sort_order !== null) {
            $query['sort_order'] = $sort_order;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        if ($keywords !== null) {
            $query['keywords'] = $keywords;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListings::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Allows to query multiple listing ids at once. Limit 100 ids maximum per query.
     *
     * @param array $listing_ids The list of numeric IDS for the listings in a specific Etsy shop.
     * @param array|null $includes An enumerated string that attaches a valid association. Acceptable inputs are 'Shop', 'Images', 'User', 'Translations', 'Videos', 'Personali...
     * @param bool|null $legacy This parameter is needed to enable new parameters and response values related to processing profiles.
     * @param string|null $currency The ISO 4217 alphabetic currency code (e.g., EUR, MXN) for price conversion. If provided, the listing price will be converted to this curren...
     * @param string|null $buyer_country The ISO 3166-1 alpha-2 country code (e.g., GB, DE). Used for buyer-facing price calculations (VAT, inclusive shipping). Does not filter list...
     */
    public function getListingsByListingIds(?array $listing_ids = null, ?array $includes = null, ?bool $legacy = null, ?string $currency = null, ?string $buyer_country = null): Model\ShopListingsWithAssociations
    {
        $path = self::BASE_PATH . '/v3/application/listings/batch';
        $query = [];
        if ($listing_ids !== null) {
            $query['listing_ids'] = $listing_ids;
        }
        if ($includes !== null) {
            $query['includes'] = $includes;
        }
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        if ($currency !== null) {
            $query['currency'] = $currency;
        }
        if ($buyer_country !== null) {
            $query['buyer_country'] = $buyer_country;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListingsWithAssociations::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves Listings associated to a Shop that are featured.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     * @param bool|null $legacy This parameter is needed to enable new parameters and response values related to processing profiles.
     */
    public function getFeaturedListingsByShop(int $shop_id, ?int $limit = null, ?int $offset = null, ?bool $legacy = null): Model\ShopListings
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/featured', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListings::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Deletes a property for a Listing.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int $property_id The unique ID of an Etsy [listing property](/documentation/reference#operation/getListingProperties).
     *
     * @return array<string, mixed>
     */
    public function deleteListingProperty(int $shop_id, int $listing_id, int $property_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/properties/{property_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
            '{property_id}' => rawurlencode((string) $property_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Updates or populates the properties list defining product offerings for a listing. Each offering requires both a `value` and a `value_id` that are valid for a `scale_id` assigned to the listin...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int $property_id The unique ID of an Etsy [listing property](/documentation/reference#operation/getListingProperties).
     */
    public function updateListingProperty(int $shop_id, int $listing_id, int $property_id, Model\UpdateListingPropertyRequest $body): Model\ListingPropertyValue
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/properties/{property_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
            '{property_id}' => rawurlencode((string) $property_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('PUT', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ListingPropertyValue::fromArray($response);
    }

    /**
     * Feedback only Give feedbackDevelopment for this endpoint is in progress. It will only return a 501 response. Retrieves a listing's property
     *
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int $property_id The unique ID of an Etsy [listing property](/documentation/reference#operation/getListingProperties).
     */
    public function getListingProperty(int $listing_id, int $property_id): Model\ListingPropertyValue
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}/properties/{property_id}', [
            '{listing_id}' => rawurlencode((string) $listing_id),
            '{property_id}' => rawurlencode((string) $property_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ListingPropertyValue::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Get a listing's properties
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     */
    public function getListingProperties(int $shop_id, int $listing_id): Model\ListingPropertyValues
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/properties', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ListingPropertyValues::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the shipping profile for each listing referenced by listing ID. Requires the `shops_r` OAuth scope. Limit 100 listing IDs per request. All requested listing IDs must exist — if any s...
     *
     * @param array $listing_ids The list of numeric IDS for the listings in a specific Etsy shop.
     */
    public function getListingsShippingByListingIds(?array $listing_ids = null): Model\ShopListingsWithAssociations
    {
        $path = self::BASE_PATH . '/v3/application/listings/batch/shipping';
        $query = [];
        if ($listing_ids !== null) {
            $query['listing_ids'] = $listing_ids;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListingsWithAssociations::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Updates a listing, identified by a listing ID, for a specific shop identified by a shop ID. Note that this is a PATCH method type. When activating, or manually renewing a physical listing, the...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     */
    public function updateListing(int $shop_id, int $listing_id, Model\UpdateListingRequest $body): Model\ShopListing
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('PATCH', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopListing::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Gets all listings associated with a receipt.
     *
     * @param int $receipt_id The numeric ID for the [receipt](/documentation/reference#tag/Shop-Receipt) associated to this transaction.
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     * @param bool|null $legacy This parameter is needed to enable new parameters and response values related to processing profiles.
     */
    public function getListingsByShopReceipt(int $receipt_id, int $shop_id, ?int $limit = null, ?int $offset = null, ?bool $legacy = null): Model\ShopListings
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/receipts/{receipt_id}/listings', [
            '{receipt_id}' => rawurlencode((string) $receipt_id),
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListings::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Gets all listings associated with a Return Policy.
     *
     * @param int $return_policy_id The numeric ID of the [Return Policy](/documentation/reference#operation/getShopReturnPolicies).
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param bool|null $legacy This parameter is needed to enable new parameters and response values related to processing profiles.
     */
    public function getListingsByShopReturnPolicy(int $return_policy_id, int $shop_id, ?bool $legacy = null): Model\ShopListings
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/policies/return/{return_policy_id}/listings', [
            '{return_policy_id}' => rawurlencode((string) $return_policy_id),
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListings::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves all the listings from the section of a specific shop.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param array $shop_section_ids A list of numeric IDS for all sections in a specific Etsy shop.
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     * @param string|null $sort_on The value to sort a search result of listings on. NOTES: a) `sort_on` only works when combined with one of the search options (keywords, reg...
     * @param string|null $sort_order The ascending(up) or descending(down) order to sort listings by. NOTE: sort_order only works when combined with one of the search options (k...
     * @param bool|null $legacy This parameter is needed to enable new parameters and response values related to processing profiles.
     */
    public function getListingsByShopSectionId(int $shop_id, ?array $shop_section_ids = null, ?int $limit = null, ?int $offset = null, ?string $sort_on = null, ?string $sort_order = null, ?bool $legacy = null): Model\ShopListings
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/shop-sections/listings', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        if ($shop_section_ids !== null) {
            $query['shop_section_ids'] = $shop_section_ids;
        }
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        if ($sort_on !== null) {
            $query['sort_on'] = $sort_on;
        }
        if ($sort_order !== null) {
            $query['sort_order'] = $sort_order;
        }
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListings::fromArray($response);
    }
}
