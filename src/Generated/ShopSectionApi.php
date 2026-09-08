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
final readonly class ShopSectionApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Creates a new section in a specific shop.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function createShopSection(int $shop_id, Model\CreateShopSectionRequest $body): Model\ShopSection
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/sections', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopSection::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the list of shop sections in a specific shop identified by shop ID.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function getShopSections(int $shop_id): Model\ShopSections
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/sections', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopSections::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Deletes a section in a specific shop given a valid shop_section_id.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shop_section_id The numeric ID of a section in a specific Etsy shop.
     *
     * @return array<string, mixed>
     */
    public function deleteShopSection(int $shop_id, int $shop_section_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/sections/{shop_section_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shop_section_id}' => rawurlencode((string) $shop_section_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a shop section, referenced by section ID and shop ID.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shop_section_id The numeric ID of a section in a specific Etsy shop.
     */
    public function getShopSection(int $shop_id, int $shop_section_id): Model\ShopSection
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/sections/{shop_section_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shop_section_id}' => rawurlencode((string) $shop_section_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopSection::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Updates a section in a specific shop given a valid shop_section_id.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $shop_section_id The numeric ID of a section in a specific Etsy shop.
     */
    public function updateShopSection(int $shop_id, int $shop_section_id, Model\UpdateShopSectionRequest $body): Model\ShopSection
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/sections/{shop_section_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{shop_section_id}' => rawurlencode((string) $shop_section_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('PUT', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopSection::fromArray($response);
    }
}
