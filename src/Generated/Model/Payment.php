<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents a payment made with Etsy Payments. All monetary amounts are in USD pennies unless otherwise specified.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class Payment
{
    /**
     * @param int|null $payment_id A unique numeric ID for a payment to a specific Etsy [shop](/documentation/reference#tag/Shop).
     * @param int|null $buyer_user_id The numeric ID for the [user](/documentation/reference#tag/User) who paid the purchase.
     * @param int|null $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int|null $receipt_id The numeric ID for the [receipt](/documentation/reference#tag/Shop-Receipt) associated to this transaction.
     * @param Money|null $amount_gross An integer equal to gross amount of the order, in pennies, including shipping and taxes.
     * @param Money|null $amount_fees An integer equal to the original card processing fee of the order in pennies.
     * @param Money|null $amount_net An integer equal to the payment value, in pennies, less fees (`amount_gross` - `amount_fees`).
     * @param Money|null $posted_gross The total gross value of the payment posted once the purchase ships. This is equal to the `amount_gross` UNLESS the seller issues a refund prior to shipping. We consider "shipping" to be the event which "posts" to the le...
     * @param Money|null $posted_fees The total value of the fees posted once the purchase ships. Etsy refunds a proportional amount of the fees when a seller refunds a buyer. When the seller issues a refund prior to shipping, the posted amount is less than...
     * @param Money|null $posted_net The total value of the payment at the time of posting, less fees. (`posted_gross` - `posted_fees`)
     * @param Money|null $adjusted_gross The gross payment amount after the seller refunds a payment, partially or fully.
     * @param Money|null $adjusted_fees The new fee amount after a seller refunds a payment, partially or fully.
     * @param Money|null $adjusted_net The total value of the payment after refunds, less fees (`adjusted_gross` - `adjusted_fees`).
     * @param string|null $currency The ISO (alphabetic) code string for the payment's currency.
     * @param string|null $shop_currency The ISO (alphabetic) code for the shop's currency. The shop displays all prices in this currency by default.
     * @param string|null $buyer_currency The currency string of the buyer.
     * @param int|null $shipping_user_id The numeric ID of the user to which the seller ships the order.
     * @param int|null $shipping_address_id The numeric id identifying the shipping address.
     * @param int|null $billing_address_id The numeric ID identifying the billing address of the buyer.
     * @param string|null $status A string indicating the current status of the payment, most commonly "settled" or "authed".
     * @param int|null $shipped_timestamp The transaction's shipping date and time, in epoch seconds.
     * @param int|null $create_timestamp The transaction's creation date and time, in epoch seconds.
     * @param int|null $created_timestamp The transaction's creation date and time, in epoch seconds.
     * @param int|null $update_timestamp The date and time of the last change to the payment adjustment in epoch seconds.
     * @param int|null $updated_timestamp The date and time of the last change to the payment adjustment in epoch seconds.
     * @param list<PaymentAdjustment>|null $payment_adjustments List of refund objects on an Etsy Payments transaction. All monetary amounts are in USD pennies unless otherwise specified.
     */
    public function __construct(
        public ?int $payment_id = null,
        public ?int $buyer_user_id = null,
        public ?int $shop_id = null,
        public ?int $receipt_id = null,
        public ?Money $amount_gross = null,
        public ?Money $amount_fees = null,
        public ?Money $amount_net = null,
        public ?Money $posted_gross = null,
        public ?Money $posted_fees = null,
        public ?Money $posted_net = null,
        public ?Money $adjusted_gross = null,
        public ?Money $adjusted_fees = null,
        public ?Money $adjusted_net = null,
        public ?string $currency = null,
        public ?string $shop_currency = null,
        public ?string $buyer_currency = null,
        public ?int $shipping_user_id = null,
        public ?int $shipping_address_id = null,
        public ?int $billing_address_id = null,
        public ?string $status = null,
        public ?int $shipped_timestamp = null,
        public ?int $create_timestamp = null,
        public ?int $created_timestamp = null,
        public ?int $update_timestamp = null,
        public ?int $updated_timestamp = null,
        public ?array $payment_adjustments = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            payment_id: isset($data['payment_id']) ? (int) $data['payment_id'] : null,
            buyer_user_id: isset($data['buyer_user_id']) ? (int) $data['buyer_user_id'] : null,
            shop_id: isset($data['shop_id']) ? (int) $data['shop_id'] : null,
            receipt_id: isset($data['receipt_id']) ? (int) $data['receipt_id'] : null,
            amount_gross: isset($data['amount_gross']) && is_array($data['amount_gross']) ? Money::fromArray($data['amount_gross']) : null,
            amount_fees: isset($data['amount_fees']) && is_array($data['amount_fees']) ? Money::fromArray($data['amount_fees']) : null,
            amount_net: isset($data['amount_net']) && is_array($data['amount_net']) ? Money::fromArray($data['amount_net']) : null,
            posted_gross: isset($data['posted_gross']) && is_array($data['posted_gross']) ? Money::fromArray($data['posted_gross']) : null,
            posted_fees: isset($data['posted_fees']) && is_array($data['posted_fees']) ? Money::fromArray($data['posted_fees']) : null,
            posted_net: isset($data['posted_net']) && is_array($data['posted_net']) ? Money::fromArray($data['posted_net']) : null,
            adjusted_gross: isset($data['adjusted_gross']) && is_array($data['adjusted_gross']) ? Money::fromArray($data['adjusted_gross']) : null,
            adjusted_fees: isset($data['adjusted_fees']) && is_array($data['adjusted_fees']) ? Money::fromArray($data['adjusted_fees']) : null,
            adjusted_net: isset($data['adjusted_net']) && is_array($data['adjusted_net']) ? Money::fromArray($data['adjusted_net']) : null,
            currency: isset($data['currency']) ? (string) $data['currency'] : null,
            shop_currency: isset($data['shop_currency']) ? (string) $data['shop_currency'] : null,
            buyer_currency: isset($data['buyer_currency']) ? (string) $data['buyer_currency'] : null,
            shipping_user_id: isset($data['shipping_user_id']) ? (int) $data['shipping_user_id'] : null,
            shipping_address_id: isset($data['shipping_address_id']) ? (int) $data['shipping_address_id'] : null,
            billing_address_id: isset($data['billing_address_id']) ? (int) $data['billing_address_id'] : null,
            status: isset($data['status']) ? (string) $data['status'] : null,
            shipped_timestamp: isset($data['shipped_timestamp']) ? (int) $data['shipped_timestamp'] : null,
            create_timestamp: isset($data['create_timestamp']) ? (int) $data['create_timestamp'] : null,
            created_timestamp: isset($data['created_timestamp']) ? (int) $data['created_timestamp'] : null,
            update_timestamp: isset($data['update_timestamp']) ? (int) $data['update_timestamp'] : null,
            updated_timestamp: isset($data['updated_timestamp']) ? (int) $data['updated_timestamp'] : null,
            payment_adjustments: isset($data['payment_adjustments']) && is_array($data['payment_adjustments'])
                ? array_values(array_map(static fn (array $i): PaymentAdjustment => PaymentAdjustment::fromArray($i), $data['payment_adjustments']))
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
        if ($this->payment_id !== null) {
            $data['payment_id'] = $this->payment_id;
        }
        if ($this->buyer_user_id !== null) {
            $data['buyer_user_id'] = $this->buyer_user_id;
        }
        if ($this->shop_id !== null) {
            $data['shop_id'] = $this->shop_id;
        }
        if ($this->receipt_id !== null) {
            $data['receipt_id'] = $this->receipt_id;
        }
        if ($this->amount_gross !== null) {
            $data['amount_gross'] = $this->amount_gross->toArray();
        }
        if ($this->amount_fees !== null) {
            $data['amount_fees'] = $this->amount_fees->toArray();
        }
        if ($this->amount_net !== null) {
            $data['amount_net'] = $this->amount_net->toArray();
        }
        if ($this->posted_gross !== null) {
            $data['posted_gross'] = $this->posted_gross->toArray();
        }
        if ($this->posted_fees !== null) {
            $data['posted_fees'] = $this->posted_fees->toArray();
        }
        if ($this->posted_net !== null) {
            $data['posted_net'] = $this->posted_net->toArray();
        }
        if ($this->adjusted_gross !== null) {
            $data['adjusted_gross'] = $this->adjusted_gross->toArray();
        }
        if ($this->adjusted_fees !== null) {
            $data['adjusted_fees'] = $this->adjusted_fees->toArray();
        }
        if ($this->adjusted_net !== null) {
            $data['adjusted_net'] = $this->adjusted_net->toArray();
        }
        if ($this->currency !== null) {
            $data['currency'] = $this->currency;
        }
        if ($this->shop_currency !== null) {
            $data['shop_currency'] = $this->shop_currency;
        }
        if ($this->buyer_currency !== null) {
            $data['buyer_currency'] = $this->buyer_currency;
        }
        if ($this->shipping_user_id !== null) {
            $data['shipping_user_id'] = $this->shipping_user_id;
        }
        if ($this->shipping_address_id !== null) {
            $data['shipping_address_id'] = $this->shipping_address_id;
        }
        if ($this->billing_address_id !== null) {
            $data['billing_address_id'] = $this->billing_address_id;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status;
        }
        if ($this->shipped_timestamp !== null) {
            $data['shipped_timestamp'] = $this->shipped_timestamp;
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
        if ($this->payment_adjustments !== null) {
            $data['payment_adjustments'] = array_map(static fn (PaymentAdjustment $i): array => $i->toArray(), $this->payment_adjustments);
        }

        return $data;
    }
}
