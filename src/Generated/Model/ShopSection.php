<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A section within a shop, into which a user can sort listings.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopSection
{
    /**
     * @param int|null $shop_section_id The numeric ID of a section in a specific Etsy shop.
     * @param string|null $title The title string for a shop section.
     * @param int|null $rank The positive non-zero numeric position of this section in the section display order for a shop, with rank 1 sections appearing first.
     * @param int|null $user_id The numeric ID of the [user](/documentation/reference#tag/User) who owns this shop section.
     * @param int|null $active_listing_count The number of active listings in one section of a specific Etsy shop.
     */
    public function __construct(
        public ?int $shop_section_id = null,
        public ?string $title = null,
        public ?int $rank = null,
        public ?int $user_id = null,
        public ?int $active_listing_count = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            shop_section_id: isset($data['shop_section_id']) ? (int) $data['shop_section_id'] : null,
            title: isset($data['title']) ? (string) $data['title'] : null,
            rank: isset($data['rank']) ? (int) $data['rank'] : null,
            user_id: isset($data['user_id']) ? (int) $data['user_id'] : null,
            active_listing_count: isset($data['active_listing_count']) ? (int) $data['active_listing_count'] : null,
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
        if ($this->shop_section_id !== null) {
            $data['shop_section_id'] = $this->shop_section_id;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }
        if ($this->rank !== null) {
            $data['rank'] = $this->rank;
        }
        if ($this->user_id !== null) {
            $data['user_id'] = $this->user_id;
        }
        if ($this->active_listing_count !== null) {
            $data['active_listing_count'] = $this->active_listing_count;
        }

        return $data;
    }
}
