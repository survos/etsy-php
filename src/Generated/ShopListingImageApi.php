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
final readonly class ShopListingImageApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Open API V3 endpoint to delete a listing image. A copy of the file remains on our servers, and so a deleted image may be re-associated with the listing without re-uploading the original image;...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int $listing_image_id The numeric ID of the primary [listing image](/documentation/reference#tag/ShopListing-Image) for this transaction.
     *
     * @return array<string, mixed>
     */
    public function deleteListingImage(int $shop_id, int $listing_id, int $listing_image_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/images/{listing_image_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
            '{listing_image_id}' => rawurlencode((string) $listing_image_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the references and metadata for a listing image with a specific image ID.
     *
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int $listing_image_id The numeric ID of the primary [listing image](/documentation/reference#tag/ShopListing-Image) for this transaction.
     */
    public function getListingImage(int $listing_id, int $listing_image_id): Model\ListingImage
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}/images/{listing_image_id}', [
            '{listing_id}' => rawurlencode((string) $listing_id),
            '{listing_image_id}' => rawurlencode((string) $listing_image_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ListingImage::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves all listing image resources for a listing with a specific listing ID.
     *
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     */
    public function getListingImages(int $listing_id): Model\ListingImages
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}/images', [
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ListingImages::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Uploads or assigns an image to a listing identified by a shop ID with a listing ID. To upload a new image, set the image file as the value for the `image` parameter. You can assign a previousl...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     */
    public function uploadListingImage(int $shop_id, int $listing_id, Model\UploadListingImageRequest $body): Model\ListingImage
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/images', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ListingImage::fromArray($response);
    }
}
