<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 *
 * Etsy declares these REQUIRED when creating or updating: title.
 * They are still nullable here -- a response model has to survive a field
 * Etsy stops sending -- so the requirement is documented, not enforced by the
 * constructor. Validate before sending, not after parsing.
 */
final readonly class CreateShopSectionRequest
{
    /**
     * @param string|null $title The title string for a shop section.
     */
    public function __construct(
        public ?string $title = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            title: isset($data['title']) ? (string) $data['title'] : null,
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
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }

        return $data;
    }
}
