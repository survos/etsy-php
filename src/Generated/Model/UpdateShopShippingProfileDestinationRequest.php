<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class UpdateShopShippingProfileDestinationRequest
{
    /**
     * @param float|null $primary_cost The cost of shipping to this country/region alone, measured in the store's default currency.
     * @param float|null $secondary_cost The cost of shipping to this country/region with another item, measured in the store's default currency.
     * @param string|null $destination_country_iso The ISO code of the country to which the listing ships. If null, request sets destination to destination_region. Required if destination_region is null or not provided.
     * @param string|null $destination_region The code of the region to which the listing ships. A region represents a set of countries. Supported regions are Europe Union and Non-Europe Union (countries in Europe not in EU). If `none`, request sets destination to d... One of: eu, non_eu, none.
     * @param int|null $shipping_carrier_id The unique ID of a supported shipping carrier, which is used to calculate an Estimated Delivery Date. **Required with `mail_class`** if `min_delivery_days` and `max_delivery_days` are null.
     * @param string|null $mail_class The unique ID string of a shipping carrier's mail class, which is used to calculate an estimated delivery date. **Required with `shipping_carrier_id`** if `min_delivery_days` and `max_delivery_days` are null.
     * @param int|null $min_delivery_days The minimum number of business days a buyer can expect to wait to receive their purchased item once it has shipped. **Required with `max_delivery_days`** if `mail_class` is null.
     * @param int|null $max_delivery_days The maximum number of business days a buyer can expect to wait to receive their purchased item once it has shipped. **Required with `min_delivery_days`** if `mail_class` is null.
     */
    public function __construct(
        public ?float $primary_cost = null,
        public ?float $secondary_cost = null,
        public ?string $destination_country_iso = null,
        public ?string $destination_region = null,
        public ?int $shipping_carrier_id = null,
        public ?string $mail_class = null,
        public ?int $min_delivery_days = null,
        public ?int $max_delivery_days = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            primary_cost: isset($data['primary_cost']) ? (float) $data['primary_cost'] : null,
            secondary_cost: isset($data['secondary_cost']) ? (float) $data['secondary_cost'] : null,
            destination_country_iso: isset($data['destination_country_iso']) ? (string) $data['destination_country_iso'] : null,
            destination_region: isset($data['destination_region']) ? (string) $data['destination_region'] : null,
            shipping_carrier_id: isset($data['shipping_carrier_id']) ? (int) $data['shipping_carrier_id'] : null,
            mail_class: isset($data['mail_class']) ? (string) $data['mail_class'] : null,
            min_delivery_days: isset($data['min_delivery_days']) ? (int) $data['min_delivery_days'] : null,
            max_delivery_days: isset($data['max_delivery_days']) ? (int) $data['max_delivery_days'] : null,
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
        if ($this->primary_cost !== null) {
            $data['primary_cost'] = $this->primary_cost;
        }
        if ($this->secondary_cost !== null) {
            $data['secondary_cost'] = $this->secondary_cost;
        }
        if ($this->destination_country_iso !== null) {
            $data['destination_country_iso'] = $this->destination_country_iso;
        }
        if ($this->destination_region !== null) {
            $data['destination_region'] = $this->destination_region;
        }
        if ($this->shipping_carrier_id !== null) {
            $data['shipping_carrier_id'] = $this->shipping_carrier_id;
        }
        if ($this->mail_class !== null) {
            $data['mail_class'] = $this->mail_class;
        }
        if ($this->min_delivery_days !== null) {
            $data['min_delivery_days'] = $this->min_delivery_days;
        }
        if ($this->max_delivery_days !== null) {
            $data['max_delivery_days'] = $this->max_delivery_days;
        }

        return $data;
    }
}
