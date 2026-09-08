<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Reference urls and metadata for an image associated with a specific listing. The `url_fullxfull` parameter contains the URL for full-sized binary image file.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ListingImage
{
    /**
     * @param int|null $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int|null $listing_image_id The numeric ID of the primary [listing image](/documentation/reference#tag/ShopListing-Image) for this transaction.
     * @param string|null $hex_code The webhex string for the image's average color, in webhex notation.
     * @param int|null $red The numeric red value equal to the image's average red value, from 0-255 (RGB color).
     * @param int|null $green The numeric red value equal to the image's average red value, from 0-255 (RGB color).
     * @param int|null $blue The numeric red value equal to the image's average red value, from 0-255 (RGB color).
     * @param int|null $hue The numeric hue equal to the image's average hue, from 0-360 (HSV color).
     * @param int|null $saturation The numeric saturation equal to the image's average saturation, from 0-100 (HSV color).
     * @param int|null $brightness The numeric brightness equal to the image's average brightness, from 0-100 (HSV color).
     * @param bool|null $is_black_and_white When true, the image is in black & white.
     * @param int|null $creation_tsz The listing image's creation time, in epoch seconds.
     * @param int|null $created_timestamp The listing image's creation time, in epoch seconds.
     * @param int|null $rank The positive non-zero numeric position in the images displayed in a listing, with rank 1 images appearing in the left-most position in a listing.
     * @param string|null $url_75x75 The url string for a 75x75 pixel thumbnail of the image.
     * @param string|null $url_170x135 The url string for a 170x135 pixel thumbnail of the image.
     * @param string|null $url_570xN The url string for a thumbnail of the image, no more than 570 pixels wide with variable height.
     * @param string|null $url_fullxfull The url string for the full-size image, up to 3000 pixels in each dimension.
     * @param int|null $full_height The numeric height, measured in pixels, of the full-sized image referenced in url_fullxfull.
     * @param int|null $full_width The numeric width, measured in pixels, of the full-sized image referenced in url_fullxfull.
     * @param string|null $alt_text Alt text for the listing image. Max length 500 characters.
     */
    public function __construct(
        public ?int $listing_id = null,
        public ?int $listing_image_id = null,
        public ?string $hex_code = null,
        public ?int $red = null,
        public ?int $green = null,
        public ?int $blue = null,
        public ?int $hue = null,
        public ?int $saturation = null,
        public ?int $brightness = null,
        public ?bool $is_black_and_white = null,
        public ?int $creation_tsz = null,
        public ?int $created_timestamp = null,
        public ?int $rank = null,
        public ?string $url_75x75 = null,
        public ?string $url_170x135 = null,
        public ?string $url_570xN = null,
        public ?string $url_fullxfull = null,
        public ?int $full_height = null,
        public ?int $full_width = null,
        public ?string $alt_text = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            listing_id: isset($data['listing_id']) ? (int) $data['listing_id'] : null,
            listing_image_id: isset($data['listing_image_id']) ? (int) $data['listing_image_id'] : null,
            hex_code: isset($data['hex_code']) ? (string) $data['hex_code'] : null,
            red: isset($data['red']) ? (int) $data['red'] : null,
            green: isset($data['green']) ? (int) $data['green'] : null,
            blue: isset($data['blue']) ? (int) $data['blue'] : null,
            hue: isset($data['hue']) ? (int) $data['hue'] : null,
            saturation: isset($data['saturation']) ? (int) $data['saturation'] : null,
            brightness: isset($data['brightness']) ? (int) $data['brightness'] : null,
            is_black_and_white: isset($data['is_black_and_white']) ? (bool) $data['is_black_and_white'] : null,
            creation_tsz: isset($data['creation_tsz']) ? (int) $data['creation_tsz'] : null,
            created_timestamp: isset($data['created_timestamp']) ? (int) $data['created_timestamp'] : null,
            rank: isset($data['rank']) ? (int) $data['rank'] : null,
            url_75x75: isset($data['url_75x75']) ? (string) $data['url_75x75'] : null,
            url_170x135: isset($data['url_170x135']) ? (string) $data['url_170x135'] : null,
            url_570xN: isset($data['url_570xN']) ? (string) $data['url_570xN'] : null,
            url_fullxfull: isset($data['url_fullxfull']) ? (string) $data['url_fullxfull'] : null,
            full_height: isset($data['full_height']) ? (int) $data['full_height'] : null,
            full_width: isset($data['full_width']) ? (int) $data['full_width'] : null,
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
        if ($this->listing_id !== null) {
            $data['listing_id'] = $this->listing_id;
        }
        if ($this->listing_image_id !== null) {
            $data['listing_image_id'] = $this->listing_image_id;
        }
        if ($this->hex_code !== null) {
            $data['hex_code'] = $this->hex_code;
        }
        if ($this->red !== null) {
            $data['red'] = $this->red;
        }
        if ($this->green !== null) {
            $data['green'] = $this->green;
        }
        if ($this->blue !== null) {
            $data['blue'] = $this->blue;
        }
        if ($this->hue !== null) {
            $data['hue'] = $this->hue;
        }
        if ($this->saturation !== null) {
            $data['saturation'] = $this->saturation;
        }
        if ($this->brightness !== null) {
            $data['brightness'] = $this->brightness;
        }
        if ($this->is_black_and_white !== null) {
            $data['is_black_and_white'] = $this->is_black_and_white;
        }
        if ($this->creation_tsz !== null) {
            $data['creation_tsz'] = $this->creation_tsz;
        }
        if ($this->created_timestamp !== null) {
            $data['created_timestamp'] = $this->created_timestamp;
        }
        if ($this->rank !== null) {
            $data['rank'] = $this->rank;
        }
        if ($this->url_75x75 !== null) {
            $data['url_75x75'] = $this->url_75x75;
        }
        if ($this->url_170x135 !== null) {
            $data['url_170x135'] = $this->url_170x135;
        }
        if ($this->url_570xN !== null) {
            $data['url_570xN'] = $this->url_570xN;
        }
        if ($this->url_fullxfull !== null) {
            $data['url_fullxfull'] = $this->url_fullxfull;
        }
        if ($this->full_height !== null) {
            $data['full_height'] = $this->full_height;
        }
        if ($this->full_width !== null) {
            $data['full_width'] = $this->full_width;
        }
        if ($this->alt_text !== null) {
            $data['alt_text'] = $this->alt_text;
        }

        return $data;
    }
}
