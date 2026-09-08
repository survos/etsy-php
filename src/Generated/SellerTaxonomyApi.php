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
final readonly class SellerTaxonomyApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the full hierarchy tree of seller taxonomy nodes.
     */
    public function getSellerTaxonomyNodes(): Model\SellerTaxonomyNodes
    {
        $path = self::BASE_PATH . '/v3/application/seller-taxonomy/nodes';
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\SellerTaxonomyNodes::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a list of product properties, with applicable scales and values, supported for a specific seller taxonomy ID.
     *
     * @param int $taxonomy_id The unique numeric ID of an Etsy taxonomy node, which is a metadata category for listings organized into the seller taxonomy hierarchy tree....
     */
    public function getPropertiesByTaxonomyId(int $taxonomy_id): Model\TaxonomyNodeProperties
    {
        $path = strtr(self::BASE_PATH . '/v3/application/seller-taxonomy/nodes/{taxonomy_id}/properties', [
            '{taxonomy_id}' => rawurlencode((string) $taxonomy_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\TaxonomyNodeProperties::fromArray($response);
    }
}
