<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents a refund, which applies to a prior Etsy payment. All monetary amounts are in USD pennies unless otherwise specified.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class PaymentAdjustment
{
    /**
     * @param int|null $payment_adjustment_id The numeric ID for a payment adjustment.
     * @param int|null $payment_id A unique numeric ID for a payment to a specific Etsy [shop](/documentation/reference#tag/Shop).
     * @param string|null $status The status string of the payment adjustment.
     * @param bool|null $is_success When true, the payment adjustment was or is likely to complete successfully.
     * @param int|null $user_id The numeric ID for the [user](/documentation/reference#tag/User) (seller) fulfilling the purchase.
     * @param string|null $reason_code A human-readable string describing the reason for the refund.
     * @param int|null $total_adjustment_amount The total numeric amount of the refund in the payment currency.
     * @param int|null $shop_total_adjustment_amount The numeric amount of the refund in the shop currency.
     * @param int|null $buyer_total_adjustment_amount The numeric amount of the refund in the buyer currency.
     * @param int|null $total_fee_adjustment_amount The numeric amount of card processing fees associated with a payment adjustment.
     * @param int|null $create_timestamp The transaction's creation date and time, in epoch seconds.
     * @param int|null $created_timestamp The transaction's creation date and time, in epoch seconds.
     * @param int|null $update_timestamp The date and time of the last change to the payment adjustment in epoch seconds.
     * @param int|null $updated_timestamp The date and time of the last change to the payment adjustment in epoch seconds.
     * @param list<PaymentAdjustmentItem>|null $payment_adjustment_items List of payment adjustment line items.
     */
    public function __construct(
        public ?int $payment_adjustment_id = null,
        public ?int $payment_id = null,
        public ?string $status = null,
        public ?bool $is_success = null,
        public ?int $user_id = null,
        public ?string $reason_code = null,
        public ?int $total_adjustment_amount = null,
        public ?int $shop_total_adjustment_amount = null,
        public ?int $buyer_total_adjustment_amount = null,
        public ?int $total_fee_adjustment_amount = null,
        public ?int $create_timestamp = null,
        public ?int $created_timestamp = null,
        public ?int $update_timestamp = null,
        public ?int $updated_timestamp = null,
        public ?array $payment_adjustment_items = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            payment_adjustment_id: isset($data['payment_adjustment_id']) ? (int) $data['payment_adjustment_id'] : null,
            payment_id: isset($data['payment_id']) ? (int) $data['payment_id'] : null,
            status: isset($data['status']) ? (string) $data['status'] : null,
            is_success: isset($data['is_success']) ? (bool) $data['is_success'] : null,
            user_id: isset($data['user_id']) ? (int) $data['user_id'] : null,
            reason_code: isset($data['reason_code']) ? (string) $data['reason_code'] : null,
            total_adjustment_amount: isset($data['total_adjustment_amount']) ? (int) $data['total_adjustment_amount'] : null,
            shop_total_adjustment_amount: isset($data['shop_total_adjustment_amount']) ? (int) $data['shop_total_adjustment_amount'] : null,
            buyer_total_adjustment_amount: isset($data['buyer_total_adjustment_amount']) ? (int) $data['buyer_total_adjustment_amount'] : null,
            total_fee_adjustment_amount: isset($data['total_fee_adjustment_amount']) ? (int) $data['total_fee_adjustment_amount'] : null,
            create_timestamp: isset($data['create_timestamp']) ? (int) $data['create_timestamp'] : null,
            created_timestamp: isset($data['created_timestamp']) ? (int) $data['created_timestamp'] : null,
            update_timestamp: isset($data['update_timestamp']) ? (int) $data['update_timestamp'] : null,
            updated_timestamp: isset($data['updated_timestamp']) ? (int) $data['updated_timestamp'] : null,
            payment_adjustment_items: isset($data['payment_adjustment_items']) && is_array($data['payment_adjustment_items'])
                ? array_values(array_map(static fn (array $i): PaymentAdjustmentItem => PaymentAdjustmentItem::fromArray($i), $data['payment_adjustment_items']))
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
        if ($this->payment_adjustment_id !== null) {
            $data['payment_adjustment_id'] = $this->payment_adjustment_id;
        }
        if ($this->payment_id !== null) {
            $data['payment_id'] = $this->payment_id;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status;
        }
        if ($this->is_success !== null) {
            $data['is_success'] = $this->is_success;
        }
        if ($this->user_id !== null) {
            $data['user_id'] = $this->user_id;
        }
        if ($this->reason_code !== null) {
            $data['reason_code'] = $this->reason_code;
        }
        if ($this->total_adjustment_amount !== null) {
            $data['total_adjustment_amount'] = $this->total_adjustment_amount;
        }
        if ($this->shop_total_adjustment_amount !== null) {
            $data['shop_total_adjustment_amount'] = $this->shop_total_adjustment_amount;
        }
        if ($this->buyer_total_adjustment_amount !== null) {
            $data['buyer_total_adjustment_amount'] = $this->buyer_total_adjustment_amount;
        }
        if ($this->total_fee_adjustment_amount !== null) {
            $data['total_fee_adjustment_amount'] = $this->total_fee_adjustment_amount;
        }
        if ($this->create_timestamp !== null) {
            $data['create_timestamp'] = $this->create_timestamp;
        }
        if ($this->created_timestamp !== null) {
            $data['created_timestamp'] = $this->created_timestamp;
        }
        if ($this->update_timestamp !== null) {
            $data['update_timestamp'] = $this->update_timestamp;
        }
        if ($this->updated_timestamp !== null) {
            $data['updated_timestamp'] = $this->updated_timestamp;
        }
        if ($this->payment_adjustment_items !== null) {
            $data['payment_adjustment_items'] = array_map(static fn (PaymentAdjustmentItem $i): array => $i->toArray(), $this->payment_adjustment_items);
        }

        return $data;
    }
}
