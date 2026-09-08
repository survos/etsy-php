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
final readonly class BuyerTaxonomyApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the full hierarchy tree of buyer taxonomy nodes.
     */
    public function getBuyerTaxonomyNodes(): Model\BuyerTaxonomyNodes
    {
        $path = self::BASE_PATH . '/v3/application/buyer-taxonomy/nodes';
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\BuyerTaxonomyNodes::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a list of product properties, with applicable scales and values, supported for a specific buyer taxonomy ID.
     *
     * @param int $taxonomy_id The unique numeric ID of an Etsy taxonomy node, which is a metadata category for listings organized into the seller taxonomy hierarchy tree....
     */
    public function getPropertiesByBuyerTaxonomyId(int $taxonomy_id): Model\BuyerTaxonomyNodeProperties
    {
        $path = strtr(self::BASE_PATH . '/v3/application/buyer-taxonomy/nodes/{taxonomy_id}/properties', [
            '{taxonomy_id}' => rawurlencode((string) $taxonomy_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\BuyerTaxonomyNodeProperties::fromArray($response);
    }
}
