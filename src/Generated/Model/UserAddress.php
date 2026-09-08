<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents a user's address.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class UserAddress
{
    /**
     * @param int|null $user_address_id The numeric ID of the user's address.
     * @param int|null $user_id The user's numeric ID.
     * @param string|null $name The user's name for this address.
     * @param string|null $first_line The first line of the user's address.
     * @param string|null $second_line The second line of the user's address.
     * @param string|null $city The city field of the user's address.
     * @param string|null $state The state field of the user's address.
     * @param string|null $zip The zip code field of the user's address.
     * @param string|null $iso_country_code The ISO code of the country in this address.
     * @param string|null $country_name The name of the user's country.
     * @param bool|null $is_default_shipping_address Is this the user's default shipping address.
     */
    public function __construct(
        public ?int $user_address_id = null,
        public ?int $user_id = null,
        public ?string $name = null,
        public ?string $first_line = null,
        public ?string $second_line = null,
        public ?string $city = null,
        public ?string $state = null,
        public ?string $zip = null,
        public ?string $iso_country_code = null,
        public ?string $country_name = null,
        public ?bool $is_default_shipping_address = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            user_address_id: isset($data['user_address_id']) ? (int) $data['user_address_id'] : null,
            user_id: isset($data['user_id']) ? (int) $data['user_id'] : null,
            name: isset($data['name']) ? (string) $data['name'] : null,
            first_line: isset($data['first_line']) ? (string) $data['first_line'] : null,
            second_line: isset($data['second_line']) ? (string) $data['second_line'] : null,
            city: isset($data['city']) ? (string) $data['city'] : null,
            state: isset($data['state']) ? (string) $data['state'] : null,
            zip: isset($data['zip']) ? (string) $data['zip'] : null,
            iso_country_code: isset($data['iso_country_code']) ? (string) $data['iso_country_code'] : null,
            country_name: isset($data['country_name']) ? (string) $data['country_name'] : null,
            is_default_shipping_address: isset($data['is_default_shipping_address']) ? (bool) $data['is_default_shipping_address'] : null,
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
        if ($this->user_address_id !== null) {
            $data['user_address_id'] = $this->user_address_id;
        }
        if ($this->user_id !== null) {
            $data['user_id'] = $this->user_id;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->first_line !== null) {
            $data['first_line'] = $this->first_line;
        }
        if ($this->second_line !== null) {
            $data['second_line'] = $this->second_line;
        }
        if ($this->city !== null) {
            $data['city'] = $this->city;
        }
        if ($this->state !== null) {
            $data['state'] = $this->state;
        }
        if ($this->zip !== null) {
            $data['zip'] = $this->zip;
        }
        if ($this->iso_country_code !== null) {
            $data['iso_country_code'] = $this->iso_country_code;
        }
        if ($this->country_name !== null) {
            $data['country_name'] = $this->country_name;
        }
        if ($this->is_default_shipping_address !== null) {
            $data['is_default_shipping_address'] = $this->is_default_shipping_address;
        }

        return $data;
    }
}
