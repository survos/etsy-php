<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A list of variations chosen by the buyer during checkout.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class TransactionVariations
{
    /**
     * @param int|null $property_id The variation property ID.
     * @param int|null $value_id The ID of the variation value selected.
     * @param string|null $formatted_name Formatted name of the variation.
     * @param string|null $formatted_value Value of the variation entered by the buyer.
     * @param int|null $question_id [Personalization only] The ID of the original personalization question.
     */
    public function __construct(
        public ?int $property_id = null,
        public ?int $value_id = null,
        public ?string $formatted_name = null,
        public ?string $formatted_value = null,
        public ?int $question_id = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            property_id: isset($data['property_id']) ? (int) $data['property_id'] : null,
            value_id: isset($data['value_id']) ? (int) $data['value_id'] : null,
            formatted_name: isset($data['formatted_name']) ? (string) $data['formatted_name'] : null,
            formatted_value: isset($data['formatted_value']) ? (string) $data['formatted_value'] : null,
            question_id: isset($data['question_id']) ? (int) $data['question_id'] : null,
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
        if ($this->formatted_name !== null) {
            $data['formatted_name'] = $this->formatted_name;
        }
        if ($this->formatted_value !== null) {
            $data['formatted_value'] = $this->formatted_value;
        }
        if ($this->question_id !== null) {
            $data['question_id'] = $this->question_id;
        }

        return $data;
    }
}
