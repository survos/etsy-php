<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A representation of structured data values.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ListingPropertyValue
{
    /**
     * @param int|null $property_id The numeric ID of the Property.
     * @param string|null $property_name The name of the Property.
     * @param int|null $scale_id The numeric ID of the scale (if any).
     * @param string|null $scale_name The label used to describe the chosen scale (if any).
     * @param list<int>|null $value_ids The numeric IDs of the Property values
     * @param list<string>|null $values The Property values
     */
    public function __construct(
        public ?int $property_id = null,
        public ?string $property_name = null,
        public ?int $scale_id = null,
        public ?string $scale_name = null,
        public ?array $value_ids = null,
        public ?array $values = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            property_id: isset($data['property_id']) ? (int) $data['property_id'] : null,
            property_name: isset($data['property_name']) ? (string) $data['property_name'] : null,
            scale_id: isset($data['scale_id']) ? (int) $data['scale_id'] : null,
            scale_name: isset($data['scale_name']) ? (string) $data['scale_name'] : null,
            value_ids: isset($data['value_ids']) ? (array) $data['value_ids'] : null,
            values: isset($data['values']) ? (array) $data['values'] : null,
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
        if ($this->property_name !== null) {
            $data['property_name'] = $this->property_name;
        }
        if ($this->scale_id !== null) {
            $data['scale_id'] = $this->scale_id;
        }
        if ($this->scale_name !== null) {
            $data['scale_name'] = $this->scale_name;
        }
        if ($this->value_ids !== null) {
            $data['value_ids'] = $this->value_ids;
        }
        if ($this->values !== null) {
            $data['values'] = $this->values;
        }

        return $data;
    }
}
