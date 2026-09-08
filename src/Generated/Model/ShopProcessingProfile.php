<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents a processing profile to set a product offering's readiness state and processing time info.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopProcessingProfile
{
    /**
     * @param int|null $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int|null $readiness_state_id The numeric ID of the [processing profile](/documentation/reference#operation/getShopReadinessStateDefinition) associated with the listing. Returned only when the listing is `active` and of type `physical`, and the endpo...
     * @param string|null $readiness_state The readiness state of a product: \"1\" means \"ready_to_ship\", and \"2\" means \"made_to_order\" One of: ready_to_ship, made_to_order.
     * @param int|null $min_processing_days The minimum number of days for processing a specific product.
     * @param int|null $max_processing_days The maximum number of days for processing a specific product.
     * @param string|null $processing_days_display_label Translated display label string for processing days, for example "3 - 5 days".
     */
    public function __construct(
        public ?int $shop_id = null,
        public ?int $readiness_state_id = null,
        public ?string $readiness_state = null,
        public ?int $min_processing_days = null,
        public ?int $max_processing_days = null,
        public ?string $processing_days_display_label = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            shop_id: isset($data['shop_id']) ? (int) $data['shop_id'] : null,
            readiness_state_id: isset($data['readiness_state_id']) ? (int) $data['readiness_state_id'] : null,
            readiness_state: isset($data['readiness_state']) ? (string) $data['readiness_state'] : null,
            min_processing_days: isset($data['min_processing_days']) ? (int) $data['min_processing_days'] : null,
            max_processing_days: isset($data['max_processing_days']) ? (int) $data['max_processing_days'] : null,
            processing_days_display_label: isset($data['processing_days_display_label']) ? (string) $data['processing_days_display_label'] : null,
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
        if ($this->shop_id !== null) {
            $data['shop_id'] = $this->shop_id;
        }
        if ($this->readiness_state_id !== null) {
            $data['readiness_state_id'] = $this->readiness_state_id;
        }
        if ($this->readiness_state !== null) {
            $data['readiness_state'] = $this->readiness_state;
        }
        if ($this->min_processing_days !== null) {
            $data['min_processing_days'] = $this->min_processing_days;
        }
        if ($this->max_processing_days !== null) {
            $data['max_processing_days'] = $this->max_processing_days;
        }
        if ($this->processing_days_display_label !== null) {
            $data['processing_days_display_label'] = $this->processing_days_display_label;
        }

        return $data;
    }
}
