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
final readonly class ShopProcessingProfilesApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Creates a new ReadinessStateDefinition. If an existing definition matches the input values, this endpoint will throw a Conflict error, please refer to the Content-Location header to obtain the...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function createShopReadinessStateDefinition(int $shop_id, Model\CreateShopReadinessStateDefinitionRequest $body): Model\ShopProcessingProfile
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/readiness-state-definitions', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopProcessingProfile::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a list of ProcessingProfiles available in the specific Etsy shop identified by its shop ID.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     */
    public function getShopReadinessStateDefinitions(int $shop_id, ?int $limit = null, ?int $offset = null): Model\ShopProcessingProfiles
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/readiness-state-definitions', [
            '{shop_id}' => rawurlencode((string) $shop_id),
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
        return Model\ShopProcessingProfiles::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Deletes a ReadinessStateDefinition by given readiness state definition ID. If there any active offerings linked to the definition, this endpoint will throw a Bad Request error. If you want to...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $readiness_state_definition_id The numeric ID of the [processing profile](/documentation/reference#operation/getShopReadinessStateDefinition) associated with the listing....
     *
     * @return array<string, mixed>
     */
    public function deleteShopReadinessStateDefinition(int $shop_id, int $readiness_state_definition_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/readiness-state-definitions/{readiness_state_definition_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{readiness_state_definition_id}' => rawurlencode((string) $readiness_state_definition_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a ProcessingProfile referenced by readiness state definition ID.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $readiness_state_definition_id The numeric ID of the [processing profile](/documentation/reference#operation/getShopReadinessStateDefinition) associated with the listing....
     */
    public function getShopReadinessStateDefinition(int $shop_id, int $readiness_state_definition_id): Model\ShopProcessingProfile
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/readiness-state-definitions/{readiness_state_definition_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{readiness_state_definition_id}' => rawurlencode((string) $readiness_state_definition_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopProcessingProfile::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Updates an existing ReadinessStateDefinition. If an existing definition matches the input values, this endpoint will throw a Conflict error, please refer to the Content-Location header to obta...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $readiness_state_definition_id The numeric ID of the [processing profile](/documentation/reference#operation/getShopReadinessStateDefinition) associated with the listing....
     */
    public function updateShopReadinessStateDefinition(int $shop_id, int $readiness_state_definition_id, Model\UpdateShopReadinessStateDefinitionRequest $body): Model\ShopProcessingProfile
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/readiness-state-definitions/{readiness_state_definition_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{readiness_state_definition_id}' => rawurlencode((string) $readiness_state_definition_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('PUT', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopProcessingProfile::fromArray($response);
    }
}
