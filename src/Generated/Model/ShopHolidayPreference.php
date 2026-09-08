<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents a shop's holiday preference
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopHolidayPreference
{
    /**
     * @param int|null $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int|null $holiday_id The unique id that maps to the holiday a country observes. See the [Fulfillment Tutorial docs](https://developer.etsy.com/documentation/tutorials/fulfillment/#country-holidays) for more info One of: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105.
     * @param string|null $country_iso The country ISO where the shop is located.
     * @param bool|null $is_working A boolean value for whether the shop will process orders on a particular holiday.
     * @param string|null $holiday_name The name of the holiday that a country observes.
     */
    public function __construct(
        public ?int $shop_id = null,
        public ?int $holiday_id = null,
        public ?string $country_iso = null,
        public ?bool $is_working = null,
        public ?string $holiday_name = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            shop_id: isset($data['shop_id']) ? (int) $data['shop_id'] : null,
            holiday_id: isset($data['holiday_id']) ? (int) $data['holiday_id'] : null,
            country_iso: isset($data['country_iso']) ? (string) $data['country_iso'] : null,
            is_working: isset($data['is_working']) ? (bool) $data['is_working'] : null,
            holiday_name: isset($data['holiday_name']) ? (string) $data['holiday_name'] : null,
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
        if ($this->holiday_id !== null) {
            $data['holiday_id'] = $this->holiday_id;
        }
        if ($this->country_iso !== null) {
            $data['country_iso'] = $this->country_iso;
        }
        if ($this->is_working !== null) {
            $data['is_working'] = $this->is_working;
        }
        if ($this->holiday_name !== null) {
            $data['holiday_name'] = $this->holiday_name;
        }

        return $data;
    }
}
