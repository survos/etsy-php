<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class EtsyModulesListingPersonalizationApiResourcesOpenApiListingPersonalization
{
    /**
     * @param list<EtsyModulesListingPersonalizationApiResourcesOpenApiPersonalizationQuestion>|null $personalization_questions
     */
    public function __construct(
        public ?array $personalization_questions = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            personalization_questions: isset($data['personalization_questions']) && is_array($data['personalization_questions'])
                ? array_values(array_map(static fn (array $i): EtsyModulesListingPersonalizationApiResourcesOpenApiPersonalizationQuestion => EtsyModulesListingPersonalizationApiResourcesOpenApiPersonalizationQuestion::fromArray($i), $data['personalization_questions']))
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
        if ($this->personalization_questions !== null) {
            $data['personalization_questions'] = array_map(static fn (EtsyModulesListingPersonalizationApiResourcesOpenApiPersonalizationQuestion $i): array => $i->toArray(), $this->personalization_questions);
        }

        return $data;
    }
}
