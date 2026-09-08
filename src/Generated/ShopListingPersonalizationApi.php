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
final readonly class ShopListingPersonalizationApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Deletes personalization for a listing.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     *
     * @return array<string, mixed>
     */
    public function deleteListingPersonalization(int $shop_id, int $listing_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/personalization', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Creates or updates personalization settings for a listing, allowing the seller to collect personalization from the buyer. This endpoint will fully replace any existing personalization on the l...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param bool|null $supports_multiple_personalization_questions This query parameter indicates that the caller supports up to 5 personalization questions and the following question types: 'text_input', 'd...
     */
    public function updateListingPersonalization(int $shop_id, int $listing_id, Model\UpdateListingPersonalizationRequest $body, ?bool $supports_multiple_personalization_questions = null): Model\EtsyModulesListingPersonalizationApiResourcesOpenApiListingPersonalization
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/personalization', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        if ($supports_multiple_personalization_questions !== null) {
            $query['supports_multiple_personalization_questions'] = $supports_multiple_personalization_questions;
        }
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'json');
        return Model\EtsyModulesListingPersonalizationApiResourcesOpenApiListingPersonalization::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a listing's personalization questions by listing ID.
     *
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     */
    public function getListingPersonalization(int $listing_id): Model\EtsyModulesListingPersonalizationApiResourcesOpenApiListingPersonalization
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}/personalization', [
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\EtsyModulesListingPersonalizationApiResourcesOpenApiListingPersonalization::fromArray($response);
    }
}
