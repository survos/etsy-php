<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * The buyer-facing price for a listing, including VAT, inclusive shipping (UK), and active promotions.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ListingBuyerPrice
{
    /**
     * @param Money|null $base_price The pre-discount listing price with VAT applied, excluding shipping. When a promotion is active, this is the price before the discount is applied.
     * @param Money|null $shipping_cost The shipping cost to the buyer's country. Includes VAT where applicable. Null when shipping is free or unavailable — use is_free_shipping to distinguish.
     * @param bool|null $is_free_shipping Whether shipping is free to the buyer's country.
     * @param Money|null $original_price The display price. For UK buyers, includes base + shipping (DMCC). For others, base price only.
     * @param Money|null $discounted_price The sale price. For UK buyers, includes base + shipping. For others, base price only. Null if no active promotion.
     * @param Money|null $discount_amount The discount amount as money (original_price - discounted_price). Null if no active promotion.
     * @param int|null $discount_percentage The discount percentage (e.g. 20 for 20% off). Null if no active promotion or if the promotion is a fixed-amount discount.
     * @param bool|null $has_discount Whether an active promotion applies to this listing.
     * @param int|null $discount_start_epoch The start timestamp of the active promotion. Null if no active promotion.
     * @param int|null $discount_end_epoch The end timestamp of the active promotion. Null if no active promotion.
     */
    public function __construct(
        public ?Money $base_price = null,
        public ?Money $shipping_cost = null,
        public ?bool $is_free_shipping = null,
        public ?Money $original_price = null,
        public ?Money $discounted_price = null,
        public ?Money $discount_amount = null,
        public ?int $discount_percentage = null,
        public ?bool $has_discount = null,
        public ?int $discount_start_epoch = null,
        public ?int $discount_end_epoch = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            base_price: isset($data['base_price']) && is_array($data['base_price']) ? Money::fromArray($data['base_price']) : null,
            shipping_cost: isset($data['shipping_cost']) && is_array($data['shipping_cost']) ? Money::fromArray($data['shipping_cost']) : null,
            is_free_shipping: isset($data['is_free_shipping']) ? (bool) $data['is_free_shipping'] : null,
            original_price: isset($data['original_price']) && is_array($data['original_price']) ? Money::fromArray($data['original_price']) : null,
            discounted_price: isset($data['discounted_price']) && is_array($data['discounted_price']) ? Money::fromArray($data['discounted_price']) : null,
            discount_amount: isset($data['discount_amount']) && is_array($data['discount_amount']) ? Money::fromArray($data['discount_amount']) : null,
            discount_percentage: isset($data['discount_percentage']) ? (int) $data['discount_percentage'] : null,
            has_discount: isset($data['has_discount']) ? (bool) $data['has_discount'] : null,
            discount_start_epoch: isset($data['discount_start_epoch']) ? (int) $data['discount_start_epoch'] : null,
            discount_end_epoch: isset($data['discount_end_epoch']) ? (int) $data['discount_end_epoch'] : null,
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
        if ($this->base_price !== null) {
            $data['base_price'] = $this->base_price->toArray();
        }
        if ($this->shipping_cost !== null) {
            $data['shipping_cost'] = $this->shipping_cost->toArray();
        }
        if ($this->is_free_shipping !== null) {
            $data['is_free_shipping'] = $this->is_free_shipping;
        }
        if ($this->original_price !== null) {
            $data['original_price'] = $this->original_price->toArray();
        }
        if ($this->discounted_price !== null) {
            $data['discounted_price'] = $this->discounted_price->toArray();
        }
        if ($this->discount_amount !== null) {
            $data['discount_amount'] = $this->discount_amount->toArray();
        }
        if ($this->discount_percentage !== null) {
            $data['discount_percentage'] = $this->discount_percentage;
        }
        if ($this->has_discount !== null) {
            $data['has_discount'] = $this->has_discount;
        }
        if ($this->discount_start_epoch !== null) {
            $data['discount_start_epoch'] = $this->discount_start_epoch;
        }
        if ($this->discount_end_epoch !== null) {
            $data['discount_end_epoch'] = $this->discount_end_epoch;
        }

        return $data;
    }
}
