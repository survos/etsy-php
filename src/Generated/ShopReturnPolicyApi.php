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
final readonly class ShopReturnPolicyApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Consolidates Return Policies by moving all listings from a source return policy to a destination return policy, and deleting the source return policy. This is commonly used in the event that a...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function consolidateShopReturnPolicies(int $shop_id, Model\ConsolidateShopReturnPoliciesRequest $body): Model\ShopReturnPolicy
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/policies/return/consolidate', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopReturnPolicy::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Creates a new Return Policy. Note: if either accepts_returns or accepts_exchanges is true, then a return_deadline is required.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function createShopReturnPolicy(int $shop_id, Model\CreateShopReturnPolicyRequest $body): Model\ShopReturnPolicy
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/policies/return', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopReturnPolicy::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Returns a shop's list of existing Return Policies
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function getShopReturnPolicies(int $shop_id): Model\ShopReturnPolicies
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/policies/return', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopReturnPolicies::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Deletes an existing Return Policy. Deletion is only allowed for policies which have no associated listings – move them to another policy before attempting deletion.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $return_policy_id The numeric ID of the [Return Policy](/documentation/reference#operation/getShopReturnPolicies).
     *
     * @return array<string, mixed>
     */
    public function deleteShopReturnPolicy(int $shop_id, int $return_policy_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/policies/return/{return_policy_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{return_policy_id}' => rawurlencode((string) $return_policy_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves an existing Return Policy.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $return_policy_id The numeric ID of the [Return Policy](/documentation/reference#operation/getShopReturnPolicies).
     */
    public function getShopReturnPolicy(int $shop_id, int $return_policy_id): Model\ShopReturnPolicy
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/policies/return/{return_policy_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{return_policy_id}' => rawurlencode((string) $return_policy_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopReturnPolicy::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Updates an existing Return Policy. Note: if either accepts_returns or accepts_exchanges is true, then a return_deadline is required.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $return_policy_id The numeric ID of the [Return Policy](/documentation/reference#operation/getShopReturnPolicies).
     */
    public function updateShopReturnPolicy(int $shop_id, int $return_policy_id, Model\UpdateShopReturnPolicyRequest $body): Model\ShopReturnPolicy
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/policies/return/{return_policy_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{return_policy_id}' => rawurlencode((string) $return_policy_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('PUT', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopReturnPolicy::fromArray($response);
    }
}
