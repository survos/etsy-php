<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A payment adjustment line item for a payment adjustment.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class PaymentAdjustmentItem
{
    /**
     * @param int|null $payment_adjustment_id The numeric ID for a payment adjustment.
     * @param int|null $payment_adjustment_item_id Unique ID for the adjustment line item.
     * @param string|null $adjustment_type String indicating the type of adjustment for this line item.
     * @param int|null $amount Integer value for the amount of the adjustment in original currency.
     * @param int|null $shop_amount Integer value for the amount of the adjustment in currency for the shop.
     * @param int|null $transaction_id The unique numeric ID for a transaction.
     * @param int|null $bill_payment_id Unique ID for the bill payment adjustment.
     * @param int|null $created_timestamp The transaction's creation date and time, in epoch seconds.
     * @param int|null $updated_timestamp The update date and time the payment adjustment in epoch seconds.
     */
    public function __construct(
        public ?int $payment_adjustment_id = null,
        public ?int $payment_adjustment_item_id = null,
        public ?string $adjustment_type = null,
        public ?int $amount = null,
        public ?int $shop_amount = null,
        public ?int $transaction_id = null,
        public ?int $bill_payment_id = null,
        public ?int $created_timestamp = null,
        public ?int $updated_timestamp = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            payment_adjustment_id: isset($data['payment_adjustment_id']) ? (int) $data['payment_adjustment_id'] : null,
            payment_adjustment_item_id: isset($data['payment_adjustment_item_id']) ? (int) $data['payment_adjustment_item_id'] : null,
            adjustment_type: isset($data['adjustment_type']) ? (string) $data['adjustment_type'] : null,
            amount: isset($data['amount']) ? (int) $data['amount'] : null,
            shop_amount: isset($data['shop_amount']) ? (int) $data['shop_amount'] : null,
            transaction_id: isset($data['transaction_id']) ? (int) $data['transaction_id'] : null,
            bill_payment_id: isset($data['bill_payment_id']) ? (int) $data['bill_payment_id'] : null,
            created_timestamp: isset($data['created_timestamp']) ? (int) $data['created_timestamp'] : null,
            updated_timestamp: isset($data['updated_timestamp']) ? (int) $data['updated_timestamp'] : null,
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
        if ($this->payment_adjustment_item_id !== null) {
            $data['payment_adjustment_item_id'] = $this->payment_adjustment_item_id;
        }
        if ($this->adjustment_type !== null) {
            $data['adjustment_type'] = $this->adjustment_type;
        }
        if ($this->amount !== null) {
            $data['amount'] = $this->amount;
        }
        if ($this->shop_amount !== null) {
            $data['shop_amount'] = $this->shop_amount;
        }
        if ($this->transaction_id !== null) {
            $data['transaction_id'] = $this->transaction_id;
        }
        if ($this->bill_payment_id !== null) {
            $data['bill_payment_id'] = $this->bill_payment_id;
        }
        if ($this->created_timestamp !== null) {
            $data['created_timestamp'] = $this->created_timestamp;
        }
        if ($this->updated_timestamp !== null) {
            $data['updated_timestamp'] = $this->updated_timestamp;
        }

        return $data;
    }
}
