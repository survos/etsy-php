<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 *
 * Etsy declares these REQUIRED when creating or updating: personalization_questions.
 * They are still nullable here -- a response model has to survive a field
 * Etsy stops sending -- so the requirement is documented, not enforced by the
 * constructor. Validate before sending, not after parsing.
 */
final readonly class UpdateListingPersonalizationRequest
{
    /**
     * @param list<array<string, mixed>>|null $personalization_questions
     */
    public function __construct(
        public ?array $personalization_questions = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            personalization_questions: isset($data['personalization_questions']) ? (array) $data['personalization_questions'] : null,
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
        if ($this->personalization_questions !== null) {
            $data['personalization_questions'] = $this->personalization_questions;
        }

        return $data;
    }
}
