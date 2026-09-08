<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 *
 * Etsy declares these REQUIRED when creating or updating: value_ids, values.
 * They are still nullable here -- a response model has to survive a field
 * Etsy stops sending -- so the requirement is documented, not enforced by the
 * constructor. Validate before sending, not after parsing.
 */
final readonly class UpdateListingPropertyRequest
{
    /**
     * @param list<int>|null $value_ids An array of unique IDs of multiple Etsy [listing property](/documentation/reference#operation/getListingProperties) values. For example, if your listing is composed of different materials, then the value ID list contains...
     * @param list<string>|null $values An array of value strings for multiple Etsy [listing property](/documentation/reference#operation/getListingProperties) values. For example, if your listing is painted in different colors, then the values array contains...
     * @param int|null $scale_id The numeric ID of a single Etsy.com measurement scale. For example, for shoe size, there are three `scale_id`s available - `UK`, `US/Canada`, and `EU`, where `US/Canada` has `scale_id` 19.
     */
    public function __construct(
        public ?array $value_ids = null,
        public ?array $values = null,
        public ?int $scale_id = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            value_ids: isset($data['value_ids']) ? (array) $data['value_ids'] : null,
            values: isset($data['values']) ? (array) $data['values'] : null,
            scale_id: isset($data['scale_id']) ? (int) $data['scale_id'] : null,
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
        if ($this->value_ids !== null) {
            $data['value_ids'] = $this->value_ids;
        }
        if ($this->values !== null) {
            $data['values'] = $this->values;
        }
        if ($this->scale_id !== null) {
            $data['scale_id'] = $this->scale_id;
        }

        return $data;
    }
}
