<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A product property definition.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class TaxonomyNodeProperty
{
    /**
     * @param int|null $property_id The unique numeric ID of this product property.
     * @param string|null $name The name string for this taxonomy node.
     * @param string|null $display_name The human-readable product property name string.
     * @param list<TaxonomyPropertyScale>|null $scales A list of available scales.
     * @param bool|null $is_required When true, listings assigned eligible taxonomy IDs require this property.
     * @param bool|null $supports_attributes When true, you can use this property in listing properties.
     * @param bool|null $supports_variations When true, you can use this property in listing inventory.
     * @param bool|null $is_multivalued When true, you can assign multiple property values to this property
     * @param int|null $max_values_allowed When true, you can assign multiple property values to this property
     * @param list<TaxonomyPropertyValue>|null $possible_values A list of supported property value strings for this property.
     * @param list<TaxonomyPropertyValue>|null $selected_values A list of property value strings automatically and always selected for the given property.
     */
    public function __construct(
        public ?int $property_id = null,
        public ?string $name = null,
        public ?string $display_name = null,
        public ?array $scales = null,
        public ?bool $is_required = null,
        public ?bool $supports_attributes = null,
        public ?bool $supports_variations = null,
        public ?bool $is_multivalued = null,
        public ?int $max_values_allowed = null,
        public ?array $possible_values = null,
        public ?array $selected_values = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            property_id: isset($data['property_id']) ? (int) $data['property_id'] : null,
            name: isset($data['name']) ? (string) $data['name'] : null,
            display_name: isset($data['display_name']) ? (string) $data['display_name'] : null,
            scales: isset($data['scales']) && is_array($data['scales'])
                ? array_values(array_map(static fn (array $i): TaxonomyPropertyScale => TaxonomyPropertyScale::fromArray($i), $data['scales']))
                : null,
            is_required: isset($data['is_required']) ? (bool) $data['is_required'] : null,
            supports_attributes: isset($data['supports_attributes']) ? (bool) $data['supports_attributes'] : null,
            supports_variations: isset($data['supports_variations']) ? (bool) $data['supports_variations'] : null,
            is_multivalued: isset($data['is_multivalued']) ? (bool) $data['is_multivalued'] : null,
            max_values_allowed: isset($data['max_values_allowed']) ? (int) $data['max_values_allowed'] : null,
            possible_values: isset($data['possible_values']) && is_array($data['possible_values'])
                ? array_values(array_map(static fn (array $i): TaxonomyPropertyValue => TaxonomyPropertyValue::fromArray($i), $data['possible_values']))
                : null,
            selected_values: isset($data['selected_values']) && is_array($data['selected_values'])
                ? array_values(array_map(static fn (array $i): TaxonomyPropertyValue => TaxonomyPropertyValue::fromArray($i), $data['selected_values']))
                : null,
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
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->display_name !== null) {
            $data['display_name'] = $this->display_name;
        }
        if ($this->scales !== null) {
            $data['scales'] = array_map(static fn (TaxonomyPropertyScale $i): array => $i->toArray(), $this->scales);
        }
        if ($this->is_required !== null) {
            $data['is_required'] = $this->is_required;
        }
        if ($this->supports_attributes !== null) {
            $data['supports_attributes'] = $this->supports_attributes;
        }
        if ($this->supports_variations !== null) {
            $data['supports_variations'] = $this->supports_variations;
        }
        if ($this->is_multivalued !== null) {
            $data['is_multivalued'] = $this->is_multivalued;
        }
        if ($this->max_values_allowed !== null) {
            $data['max_values_allowed'] = $this->max_values_allowed;
        }
        if ($this->possible_values !== null) {
            $data['possible_values'] = array_map(static fn (TaxonomyPropertyValue $i): array => $i->toArray(), $this->possible_values);
        }
        if ($this->selected_values !== null) {
            $data['selected_values'] = array_map(static fn (TaxonomyPropertyValue $i): array => $i->toArray(), $this->selected_values);
        }

        return $data;
    }
}
