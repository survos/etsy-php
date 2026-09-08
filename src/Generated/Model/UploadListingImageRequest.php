<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class UploadListingImageRequest
{
    /**
     * @param string|null $image The file name string of a file to upload
     * @param int|null $listing_image_id The numeric ID of the primary [listing image](/documentation/reference#tag/ShopListing-Image) for this transaction.
     * @param int|null $rank The positive non-zero numeric position in the images displayed in a listing, with rank 1 images appearing in the left-most position in a listing.
     * @param bool|null $overwrite When true, this request replaces the existing image at a given rank.
     * @param bool|null $is_watermarked When true, indicates that the uploaded image has a watermark.
     * @param string|null $alt_text Alt text for the listing image. Max length 500 characters.
     */
    public function __construct(
        public ?string $image = null,
        public ?int $listing_image_id = null,
        public ?int $rank = null,
        public ?bool $overwrite = null,
        public ?bool $is_watermarked = null,
        public ?string $alt_text = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            image: isset($data['image']) ? (string) $data['image'] : null,
            listing_image_id: isset($data['listing_image_id']) ? (int) $data['listing_image_id'] : null,
            rank: isset($data['rank']) ? (int) $data['rank'] : null,
            overwrite: isset($data['overwrite']) ? (bool) $data['overwrite'] : null,
            is_watermarked: isset($data['is_watermarked']) ? (bool) $data['is_watermarked'] : null,
            alt_text: isset($data['alt_text']) ? (string) $data['alt_text'] : null,
        );
    }

    /**
     * Null properties are omitted: eBay rejects some explicit nulls and reads
     * others as "clear this field", so emitting them is never harmless.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = [];
        if ($this->image !== null) {
            $data['image'] = $this->image;
        }
        if ($this->listing_image_id !== null) {
            $data['listing_image_id'] = $this->listing_image_id;
        }
        if ($this->rank !== null) {
            $data['rank'] = $this->rank;
        }
        if ($this->overwrite !== null) {
            $data['overwrite'] = $this->overwrite;
        }
        if ($this->is_watermarked !== null) {
            $data['is_watermarked'] = $this->is_watermarked;
        }
        if ($this->alt_text !== null) {
            $data['alt_text'] = $this->alt_text;
        }

        return $data;
    }
}
