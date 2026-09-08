<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A property value for a specific product property, which may also employ a specific scale.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class TaxonomyPropertyValue
{
    /**
     * @param int|null $value_id The numeric ID of this property value.
     * @param string|null $name The name string of this property value.
     * @param int|null $scale_id The numeric scale ID of the scale to which this property value belongs.
     * @param list<int>|null $equal_to A list of numeric property value IDs this property value is equal to (if any).
     */
    public function __construct(
        public ?int $value_id = null,
        public ?string $name = null,
        public ?int $scale_id = null,
        public ?array $equal_to = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            value_id: isset($data['value_id']) ? (int) $data['value_id'] : null,
            name: isset($data['name']) ? (string) $data['name'] : null,
            scale_id: isset($data['scale_id']) ? (int) $data['scale_id'] : null,
            equal_to: isset($data['equal_to']) ? (array) $data['equal_to'] : null,
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
        if ($this->value_id !== null) {
            $data['value_id'] = $this->value_id;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->scale_id !== null) {
            $data['scale_id'] = $this->scale_id;
        }
        if ($this->equal_to !== null) {
            $data['equal_to'] = $this->equal_to;
        }

        return $data;
    }
}
