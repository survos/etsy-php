<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class UpdateShopReadinessStateDefinitionRequest
{
    /**
     * @param string|null $readiness_state The readiness state of a product: \"1\" means \"ready_to_ship\", and \"2\" means \"made_to_order\" One of: ready_to_ship, made_to_order.
     * @param int|null $min_processing_time The minimum number of days or weeks for processing a specific product.
     * @param int|null $max_processing_time The maximum number of days or weeks for processing a specific product.
     * @param string|null $processing_time_unit The unit used to represent how long a processing time is. A week is equivalent to how many days the seller works per week as stated in their processing schedule. If none is provided, the unit is set to \"days\". One of: days, weeks.
     */
    public function __construct(
        public ?string $readiness_state = null,
        public ?int $min_processing_time = null,
        public ?int $max_processing_time = null,
        public ?string $processing_time_unit = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            readiness_state: isset($data['readiness_state']) ? (string) $data['readiness_state'] : null,
            min_processing_time: isset($data['min_processing_time']) ? (int) $data['min_processing_time'] : null,
            max_processing_time: isset($data['max_processing_time']) ? (int) $data['max_processing_time'] : null,
            processing_time_unit: isset($data['processing_time_unit']) ? (string) $data['processing_time_unit'] : null,
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
        if ($this->readiness_state !== null) {
            $data['readiness_state'] = $this->readiness_state;
        }
        if ($this->min_processing_time !== null) {
            $data['min_processing_time'] = $this->min_processing_time;
        }
        if ($this->max_processing_time !== null) {
            $data['max_processing_time'] = $this->max_processing_time;
        }
        if ($this->processing_time_unit !== null) {
            $data['processing_time_unit'] = $this->processing_time_unit;
        }

        return $data;
    }
}
