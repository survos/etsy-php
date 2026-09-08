<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents a profile used to set a listing's shipping information. Please note that it's not possible to create calculated shipping templates via the API. However, you can associate calculated shipping profiles created from Shop Manager with listings using the API.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopShippingProfile
{
    /**
     * @param int|null $shipping_profile_id The numeric ID of the shipping profile.
     * @param string|null $title The name string of this shipping profile.
     * @param int|null $user_id The numeric ID for the [user](/documentation/reference#tag/User) who owns the shipping profile.
     * @param string|null $origin_country_iso The ISO code of the country from which the listing ships.
     * @param bool|null $is_deleted When true, someone deleted this shipping profile.
     * @param list<ShopShippingProfileDestination>|null $shipping_profile_destinations A list of [shipping profile destinations](/documentation/reference/#operation/createShopShippingProfileDestination) available for this shipping profile.
     * @param list<ShopShippingProfileUpgrade>|null $shipping_profile_upgrades A list of [shipping profile upgrades](/documentation/reference/#operation/createShopShippingProfileUpgrade) available for this shipping profile.
     * @param string|null $origin_postal_code The postal code string (not necessarily a number) for the location from which the listing ships. Required if the `origin_country_iso` supports postal codes. See the [Fulfillment Tutorial docs](https://developer.etsy.com/...
     * @param string|null $profile_type One of: manual, calculated.
     * @param float|null $domestic_handling_fee The domestic handling fee added to buyer's shipping total - only available for calculated shipping profiles.
     * @param float|null $international_handling_fee The international handling fee added to buyer's shipping total - only available for calculated shipping profiles.
     */
    public function __construct(
        public ?int $shipping_profile_id = null,
        public ?string $title = null,
        public ?int $user_id = null,
        public ?string $origin_country_iso = null,
        public ?bool $is_deleted = null,
        public ?array $shipping_profile_destinations = null,
        public ?array $shipping_profile_upgrades = null,
        public ?string $origin_postal_code = null,
        public ?string $profile_type = null,
        public ?float $domestic_handling_fee = null,
        public ?float $international_handling_fee = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            shipping_profile_id: isset($data['shipping_profile_id']) ? (int) $data['shipping_profile_id'] : null,
            title: isset($data['title']) ? (string) $data['title'] : null,
            user_id: isset($data['user_id']) ? (int) $data['user_id'] : null,
            origin_country_iso: isset($data['origin_country_iso']) ? (string) $data['origin_country_iso'] : null,
            is_deleted: isset($data['is_deleted']) ? (bool) $data['is_deleted'] : null,
            shipping_profile_destinations: isset($data['shipping_profile_destinations']) && is_array($data['shipping_profile_destinations'])
                ? array_values(array_map(static fn (array $i): ShopShippingProfileDestination => ShopShippingProfileDestination::fromArray($i), $data['shipping_profile_destinations']))
                : null,
            shipping_profile_upgrades: isset($data['shipping_profile_upgrades']) && is_array($data['shipping_profile_upgrades'])
                ? array_values(array_map(static fn (array $i): ShopShippingProfileUpgrade => ShopShippingProfileUpgrade::fromArray($i), $data['shipping_profile_upgrades']))
                : null,
            origin_postal_code: isset($data['origin_postal_code']) ? (string) $data['origin_postal_code'] : null,
            profile_type: isset($data['profile_type']) ? (string) $data['profile_type'] : null,
            domestic_handling_fee: isset($data['domestic_handling_fee']) ? (float) $data['domestic_handling_fee'] : null,
            international_handling_fee: isset($data['international_handling_fee']) ? (float) $data['international_handling_fee'] : null,
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
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }
        if ($this->user_id !== null) {
            $data['user_id'] = $this->user_id;
        }
        if ($this->origin_country_iso !== null) {
            $data['origin_country_iso'] = $this->origin_country_iso;
        }
        if ($this->is_deleted !== null) {
            $data['is_deleted'] = $this->is_deleted;
        }
        if ($this->shipping_profile_destinations !== null) {
            $data['shipping_profile_destinations'] = array_map(static fn (ShopShippingProfileDestination $i): array => $i->toArray(), $this->shipping_profile_destinations);
        }
        if ($this->shipping_profile_upgrades !== null) {
            $data['shipping_profile_upgrades'] = array_map(static fn (ShopShippingProfileUpgrade $i): array => $i->toArray(), $this->shipping_profile_upgrades);
        }
        if ($this->origin_postal_code !== null) {
            $data['origin_postal_code'] = $this->origin_postal_code;
        }
        if ($this->profile_type !== null) {
            $data['profile_type'] = $this->profile_type;
        }
        if ($this->domestic_handling_fee !== null) {
            $data['domestic_handling_fee'] = $this->domestic_handling_fee;
        }
        if ($this->international_handling_fee !== null) {
            $data['international_handling_fee'] = $this->international_handling_fee;
        }

        return $data;
    }
}
