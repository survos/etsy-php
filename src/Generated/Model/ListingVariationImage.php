<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A representation of the associations of variations and images on a listing.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ListingVariationImage
{
    /**
     * @param int|null $property_id The numeric ID of the Property.
     * @param int|null $value_id The numeric ID of the Value.
     * @param string|null $value The string value of the property.
     * @param int|null $image_id The numeric ID of the Image.
     */
    public function __construct(
        public ?int $property_id = null,
        public ?int $value_id = null,
        public ?string $value = null,
        public ?int $image_id = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            property_id: isset($data['property_id']) ? (int) $data['property_id'] : null,
            value_id: isset($data['value_id']) ? (int) $data['value_id'] : null,
            value: isset($data['value']) ? (string) $data['value'] : null,
            image_id: isset($data['image_id']) ? (int) $data['image_id'] : null,
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
        if ($this->property_id !== null) {
            $data['property_id'] = $this->property_id;
        }
        if ($this->value_id !== null) {
            $data['value_id'] = $this->value_id;
        }
        if ($this->value !== null) {
            $data['value'] = $this->value;
        }
        if ($this->image_id !== null) {
            $data['image_id'] = $this->image_id;
        }

        return $data;
    }
}
