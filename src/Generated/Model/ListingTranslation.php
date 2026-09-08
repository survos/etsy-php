<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents the translation data for a Listing.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ListingTranslation
{
    /**
     * @param int|null $listing_id The numeric ID for the Listing.
     * @param string|null $language The IETF language tag (e.g. 'fr') for the language of this translation.
     * @param string|null $title The title of the Listing of this Translation.
     * @param string|null $description The description of the Listing of this Translation.
     * @param list<string>|null $tags The tags of the Listing of this Translation.
     */
    public function __construct(
        public ?int $listing_id = null,
        public ?string $language = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?array $tags = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            listing_id: isset($data['listing_id']) ? (int) $data['listing_id'] : null,
            language: isset($data['language']) ? (string) $data['language'] : null,
            title: isset($data['title']) ? (string) $data['title'] : null,
            description: isset($data['description']) ? (string) $data['description'] : null,
            tags: isset($data['tags']) ? (array) $data['tags'] : null,
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
        if ($this->language !== null) {
            $data['language'] = $this->language;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->tags !== null) {
            $data['tags'] = $this->tags;
        }

        return $data;
    }
}
