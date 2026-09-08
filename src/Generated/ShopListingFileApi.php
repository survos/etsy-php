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
final readonly class ShopListingFileApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Deletes a file from a specific listing. When you delete the final file for a digital listing, the listing converts into a physical listing. The response to a delete request returns a list of t...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int $listing_file_id The unique numeric ID of a file associated with a digital listing.
     *
     * @return array<string, mixed>
     */
    public function deleteListingFile(int $shop_id, int $listing_id, int $listing_file_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/files/{listing_file_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
            '{listing_file_id}' => rawurlencode((string) $listing_file_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a single file associated with the given digital listing. Requesting a file from a physical listing returns an empty result.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int $listing_file_id The unique numeric ID of a file associated with a digital listing.
     */
    public function getListingFile(int $shop_id, int $listing_id, int $listing_file_id): Model\ShopListingFile
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/files/{listing_file_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
            '{listing_file_id}' => rawurlencode((string) $listing_file_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListingFile::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves all the files associated with the given digital listing. Requesting files from a physical listing returns an empty result.
     *
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function getAllListingFiles(int $listing_id, int $shop_id): Model\ShopListingFiles
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/files', [
            '{listing_id}' => rawurlencode((string) $listing_id),
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopListingFiles::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Uploads a new file for a digital listing, or associates an existing file with a specific listing. You must either provide the `listing_file_id` of an existing file, or the name and binary file...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     */
    public function uploadListingFile(int $shop_id, int $listing_id, Model\UploadListingFileRequest $body): Model\ShopListingFile
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/files', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopListingFile::fromArray($response);
    }
}
