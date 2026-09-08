<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A listing review record left by a User.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ListingReview
{
    /**
     * @param int|null $shop_id The shop's numeric ID.
     * @param int|null $listing_id The ID of the ShopListing that the TransactionReview belongs to.
     * @param int|null $rating Rating value on scale from 1 to 5
     * @param string|null $review A message left by the author, explaining the feedback, if provided.
     * @param string|null $language The language of the TransactionReview
     * @param string|null $image_url_fullxfull The url to a photo provided with the feedback, dimensions fullxfull. Note: This field may be absent, depending on the buyer's privacy settings.
     * @param int|null $create_timestamp The date and time the TransactionReview was created in epoch seconds.
     * @param int|null $created_timestamp The date and time the TransactionReview was created in epoch seconds.
     * @param int|null $update_timestamp The date and time the TransactionReview was updated in epoch seconds.
     * @param int|null $updated_timestamp The date and time the TransactionReview was updated in epoch seconds.
     */
    public function __construct(
        public ?int $shop_id = null,
        public ?int $listing_id = null,
        public ?int $rating = null,
        public ?string $review = null,
        public ?string $language = null,
        public ?string $image_url_fullxfull = null,
        public ?int $create_timestamp = null,
        public ?int $created_timestamp = null,
        public ?int $update_timestamp = null,
        public ?int $updated_timestamp = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            shop_id: isset($data['shop_id']) ? (int) $data['shop_id'] : null,
            listing_id: isset($data['listing_id']) ? (int) $data['listing_id'] : null,
            rating: isset($data['rating']) ? (int) $data['rating'] : null,
            review: isset($data['review']) ? (string) $data['review'] : null,
            language: isset($data['language']) ? (string) $data['language'] : null,
            image_url_fullxfull: isset($data['image_url_fullxfull']) ? (string) $data['image_url_fullxfull'] : null,
            create_timestamp: isset($data['create_timestamp']) ? (int) $data['create_timestamp'] : null,
            created_timestamp: isset($data['created_timestamp']) ? (int) $data['created_timestamp'] : null,
            update_timestamp: isset($data['update_timestamp']) ? (int) $data['update_timestamp'] : null,
            updated_timestamp: isset($data['updated_timestamp']) ? (int) $data['updated_timestamp'] : null,
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
        if ($this->shop_id !== null) {
            $data['shop_id'] = $this->shop_id;
        }
        if ($this->listing_id !== null) {
            $data['listing_id'] = $this->listing_id;
        }
        if ($this->rating !== null) {
            $data['rating'] = $this->rating;
        }
        if ($this->review !== null) {
            $data['review'] = $this->review;
        }
        if ($this->language !== null) {
            $data['language'] = $this->language;
        }
        if ($this->image_url_fullxfull !== null) {
            $data['image_url_fullxfull'] = $this->image_url_fullxfull;
        }
        if ($this->create_timestamp !== null) {
            $data['create_timestamp'] = $this->create_timestamp;
        }
        if ($this->created_timestamp !== null) {
            $data['created_timestamp'] = $this->created_timestamp;
        }
        if ($this->update_timestamp !== null) {
            $data['update_timestamp'] = $this->update_timestamp;
        }
        if ($this->updated_timestamp !== null) {
            $data['updated_timestamp'] = $this->updated_timestamp;
        }

        return $data;
    }
}
