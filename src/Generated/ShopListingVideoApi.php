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
final readonly class ShopListingVideoApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Open API V3 endpoint to delete a listing video. A copy of the video remains on our servers, and so a deleted video may be re-associated with the listing without re-uploading the original video...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int $video_id The unique ID of a video associated with a listing.
     *
     * @return array<string, mixed>
     */
    public function deleteListingVideo(int $shop_id, int $listing_id, int $video_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/videos/{video_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
            '{video_id}' => rawurlencode((string) $video_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('DELETE', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a single video associated with the given listing. Requesting a video from a listing returns an empty result.
     *
     * @param int $video_id The unique ID of a video associated with a listing.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     */
    public function getListingVideo(int $video_id, int $listing_id): Model\ListingVideo
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}/videos/{video_id}', [
            '{video_id}' => rawurlencode((string) $video_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ListingVideo::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves all listing video resources for a listing with a specific listing ID.
     *
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     */
    public function getListingVideos(int $listing_id): Model\ListingVideos
    {
        $path = strtr(self::BASE_PATH . '/v3/application/listings/{listing_id}/videos', [
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ListingVideos::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Uploads a new video for a listing, or associates an existing video with a specific listing. You must either provide the `video_id` of an existing video, or the name and binary file data for a...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     */
    public function uploadListingVideo(int $shop_id, int $listing_id, Model\UploadListingVideoRequest $body): Model\ListingVideo
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/videos', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ListingVideo::fromArray($response);
    }
}
