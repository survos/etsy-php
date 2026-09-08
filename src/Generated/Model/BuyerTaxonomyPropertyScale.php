<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A scale defining the assignable increments for the property values available to specific product properties.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class BuyerTaxonomyPropertyScale
{
    /**
     * @param int|null $scale_id The unique numeric ID of a scale.
     * @param string|null $display_name The name string for a scale.
     * @param string|null $description The description string for a scale.
     */
    public function __construct(
        public ?int $scale_id = null,
        public ?string $display_name = null,
        public ?string $description = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            scale_id: isset($data['scale_id']) ? (int) $data['scale_id'] : null,
            display_name: isset($data['display_name']) ? (string) $data['display_name'] : null,
            description: isset($data['description']) ? (string) $data['description'] : null,
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
        if ($this->scale_id !== null) {
            $data['scale_id'] = $this->scale_id;
        }
        if ($this->display_name !== null) {
            $data['display_name'] = $this->display_name;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }

        return $data;
    }
}
