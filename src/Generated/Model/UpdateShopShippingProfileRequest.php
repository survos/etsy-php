<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class UpdateShopShippingProfileRequest
{
    /**
     * @param string|null $title The name string of this shipping profile.
     * @param string|null $origin_country_iso The ISO code of the country from which the listing ships.
     * @param int|null $min_processing_time The minimum time required to process to ship listings with this shipping profile.
     * @param int|null $max_processing_time The maximum processing time the listing needs to ship.
     * @param string|null $processing_time_unit The unit used to represent how long a processing time is. A week is equivalent to the set processing schedule (default to 5 business days). If none is provided, the unit is set to "business_days". One of: business_days, weeks.
     * @param string|null $origin_postal_code The postal code string (not necessarily a number) for the location from which the listing ships. Required if the `origin_country_iso` supports postal codes. See the [Fulfillment Tutorial docs](https://developer.etsy.com/...
     */
    public function __construct(
        public ?string $title = null,
        public ?string $origin_country_iso = null,
        public ?int $min_processing_time = null,
        public ?int $max_processing_time = null,
        public ?string $processing_time_unit = null,
        public ?string $origin_postal_code = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            title: isset($data['title']) ? (string) $data['title'] : null,
            origin_country_iso: isset($data['origin_country_iso']) ? (string) $data['origin_country_iso'] : null,
            min_processing_time: isset($data['min_processing_time']) ? (int) $data['min_processing_time'] : null,
            max_processing_time: isset($data['max_processing_time']) ? (int) $data['max_processing_time'] : null,
            processing_time_unit: isset($data['processing_time_unit']) ? (string) $data['processing_time_unit'] : null,
            origin_postal_code: isset($data['origin_postal_code']) ? (string) $data['origin_postal_code'] : null,
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
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }
        if ($this->origin_country_iso !== null) {
            $data['origin_country_iso'] = $this->origin_country_iso;
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
        if ($this->origin_postal_code !== null) {
            $data['origin_postal_code'] = $this->origin_postal_code;
        }

        return $data;
    }
}
