<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A representation of a shipping profile upgrade option.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopShippingProfileUpgrade
{
    /**
     * @param int|null $shipping_profile_id The numeric ID of the base shipping profile.
     * @param int|null $upgrade_id The numeric ID that is associated with a shipping upgrade
     * @param string|null $upgrade_name Name for the shipping upgrade shown to shoppers at checkout, e.g. USPS Priority.
     * @param int|null $type The type of the shipping upgrade. Domestic (0) or international (1). One of: 0, 1.
     * @param int|null $rank The positive non-zero numeric position in the images displayed in a listing, with rank 1 images appearing in the left-most position in a listing.
     * @param string|null $language The IETF language tag for the language of the shipping profile. Ex: `de`, `en`, `es`, `fr`, `it`, `ja`, `nl`, `pl`, `pt`
     * @param Money|null $price Additional cost of adding the shipping upgrade.
     * @param Money|null $secondary_price Additional cost of adding the shipping upgrade for each additional item.
     * @param int|null $shipping_carrier_id The unique ID of a supported shipping carrier, which is used to calculate an Estimated Delivery Date. **Required with `mail_class`** if `min_delivery_days` and `max_delivery_days` are null.
     * @param string|null $mail_class The unique ID string of a shipping carrier's mail class, which is used to calculate an estimated delivery date. **Required with `shipping_carrier_id`** if `min_delivery_days` and `max_delivery_days` are null.
     * @param int|null $min_delivery_days The minimum number of business days a buyer can expect to wait to receive their purchased item once it has shipped. **Required with `max_delivery_days`** if `mail_class` is null.
     * @param int|null $max_delivery_days The maximum number of business days a buyer can expect to wait to receive their purchased item once it has shipped. **Required with `min_delivery_days`** if `mail_class` is null.
     */
    public function __construct(
        public ?int $shipping_profile_id = null,
        public ?int $upgrade_id = null,
        public ?string $upgrade_name = null,
        public ?int $type = null,
        public ?int $rank = null,
        public ?string $language = null,
        public ?Money $price = null,
        public ?Money $secondary_price = null,
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
            shipping_profile_id: isset($data['shipping_profile_id']) ? (int) $data['shipping_profile_id'] : null,
            upgrade_id: isset($data['upgrade_id']) ? (int) $data['upgrade_id'] : null,
            upgrade_name: isset($data['upgrade_name']) ? (string) $data['upgrade_name'] : null,
            type: isset($data['type']) ? (int) $data['type'] : null,
            rank: isset($data['rank']) ? (int) $data['rank'] : null,
            language: isset($data['language']) ? (string) $data['language'] : null,
            price: isset($data['price']) && is_array($data['price']) ? Money::fromArray($data['price']) : null,
            secondary_price: isset($data['secondary_price']) && is_array($data['secondary_price']) ? Money::fromArray($data['secondary_price']) : null,
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
        if ($this->shipping_profile_id !== null) {
            $data['shipping_profile_id'] = $this->shipping_profile_id;
        }
        if ($this->upgrade_id !== null) {
            $data['upgrade_id'] = $this->upgrade_id;
        }
        if ($this->upgrade_name !== null) {
            $data['upgrade_name'] = $this->upgrade_name;
        }
        if ($this->type !== null) {
            $data['type'] = $this->type;
        }
        if ($this->rank !== null) {
            $data['rank'] = $this->rank;
        }
        if ($this->language !== null) {
            $data['language'] = $this->language;
        }
        if ($this->price !== null) {
            $data['price'] = $this->price->toArray();
        }
        if ($this->secondary_price !== null) {
            $data['secondary_price'] = $this->secondary_price->toArray();
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
