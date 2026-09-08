<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class EtsyModulesListingPersonalizationApiResourcesOpenApiPersonalizationQuestion
{
    /**
     * @param list<array<string, mixed>>|null $options
     */
    public function __construct(
        public ?int $question_id = null,
        public ?string $question_text = null,
        public ?string $instructions = null,
        public ?string $question_type = null,
        public ?bool $required = null,
        public ?int $max_allowed_characters = null,
        public ?int $max_allowed_files = null,
        public ?Money $add_on_price = null,
        public ?array $options = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            question_id: isset($data['question_id']) ? (int) $data['question_id'] : null,
            question_text: isset($data['question_text']) ? (string) $data['question_text'] : null,
            instructions: isset($data['instructions']) ? (string) $data['instructions'] : null,
            question_type: isset($data['question_type']) ? (string) $data['question_type'] : null,
            required: isset($data['required']) ? (bool) $data['required'] : null,
            max_allowed_characters: isset($data['max_allowed_characters']) ? (int) $data['max_allowed_characters'] : null,
            max_allowed_files: isset($data['max_allowed_files']) ? (int) $data['max_allowed_files'] : null,
            add_on_price: isset($data['add_on_price']) && is_array($data['add_on_price']) ? Money::fromArray($data['add_on_price']) : null,
            options: isset($data['options']) ? (array) $data['options'] : null,
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
        if ($this->question_id !== null) {
            $data['question_id'] = $this->question_id;
        }
        if ($this->question_text !== null) {
            $data['question_text'] = $this->question_text;
        }
        if ($this->instructions !== null) {
            $data['instructions'] = $this->instructions;
        }
        if ($this->question_type !== null) {
            $data['question_type'] = $this->question_type;
        }
        if ($this->required !== null) {
            $data['required'] = $this->required;
        }
        if ($this->max_allowed_characters !== null) {
            $data['max_allowed_characters'] = $this->max_allowed_characters;
        }
        if ($this->max_allowed_files !== null) {
            $data['max_allowed_files'] = $this->max_allowed_files;
        }
        if ($this->add_on_price !== null) {
            $data['add_on_price'] = $this->add_on_price->toArray();
        }
        if ($this->options !== null) {
            $data['options'] = $this->options;
        }

        return $data;
    }
}
