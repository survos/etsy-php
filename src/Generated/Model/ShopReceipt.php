<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * The record of a purchase from a shop. Shop receipts display monetary values using the shop's currency.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopReceipt
{
    /**
     * @param int|null $receipt_id The numeric ID for the [receipt](/documentation/reference#tag/Shop-Receipt) associated to this transaction.
     * @param int|null $receipt_type The numeric value for the Etsy channel that serviced the purchase: 0 or 5 for Etsy.com, 1 for a Pattern shop.
     * @param int|null $seller_user_id The numeric ID for the [user](/documentation/reference#tag/User) (seller) fulfilling the purchase.
     * @param string|null $seller_email The email address string for the seller of the listing.
     * @param int|null $buyer_user_id The numeric ID for the [user](/documentation/reference#tag/User) making the purchase.
     * @param string|null $buyer_email The email address string for the buyer of the listing. It will be null if access hasn't been granted. Access is case-by-case and subject to approval.
     * @param string|null $name The name string for the recipient in the shipping address.
     * @param string|null $first_line The first address line string for the recipient in the shipping address.
     * @param string|null $second_line The optional second address line string for the recipient in the shipping address.
     * @param string|null $city The city string for the recipient in the shipping address.
     * @param string|null $state The state string for the recipient in the shipping address.
     * @param string|null $zip The zip code string (not necessarily a number) for the recipient in the shipping address.
     * @param string|null $status The current order status string. One of: `paid`, `completed`, `open`, `payment processing` or `canceled`. One of: paid, completed, open, payment processing, canceled, fully refunded, partially refunded.
     * @param string|null $formatted_address The formatted shipping address string for the recipient in the shipping address.
     * @param string|null $country_iso The ISO-3166 alpha-2 country code string for the recipient in the shipping address.
     * @param string|null $payment_method The payment method string identifying purchaser's payment method, which must be one of: 'cc' (credit card), 'paypal', 'check', 'mo' (money order), 'bt' (bank transfer), 'other', 'ideal', 'sofort', 'apple_pay', 'google',...
     * @param string|null $payment_email The email address string for the email address to which to send payment confirmation
     * @param string|null $message_from_seller An optional message string from the seller.
     * @param string|null $message_from_buyer An optional message string from the buyer.
     * @param string|null $message_from_payment The machine-generated acknowledgement string from the payment system.
     * @param bool|null $is_paid When true, buyer paid for this purchase.
     * @param bool|null $is_shipped When true, seller shipped the products.
     * @param int|null $create_timestamp The receipt's creation time, in epoch seconds.
     * @param int|null $created_timestamp The receipt's creation time, in epoch seconds.
     * @param int|null $update_timestamp The time of the last update to the receipt, in epoch seconds.
     * @param int|null $updated_timestamp The time of the last update to the receipt, in epoch seconds.
     * @param bool|null $is_gift When true, the buyer indicated this purchase is a gift.
     * @param string|null $gift_message A gift message string the buyer requests delivered with the product.
     * @param string|null $gift_sender The name of the person who sent the gift.
     * @param Money|null $grandtotal A number equal to the total_price minus the coupon discount plus tax and shipping costs.
     * @param Money|null $subtotal A number equal to the total_price minus coupon discounts. Does not include tax or shipping costs.
     * @param Money|null $total_price A number equal to the sum of the individual listings' (price * quantity). Does not include tax or shipping costs.
     * @param Money|null $total_shipping_cost A number equal to the total shipping cost of the receipt.
     * @param Money|null $total_tax_cost The total sales tax of the receipt.
     * @param Money|null $total_vat_cost A number equal to the total value-added tax (VAT) of the receipt.
     * @param Money|null $discount_amt The numeric total discounted price for the receipt when using a discount (percent or fixed) coupon. Free shipping coupons are not included in this discount amount.
     * @param Money|null $gift_wrap_price The numeric price of gift wrap for this receipt.
     * @param list<ShopReceiptShipment>|null $shipments A list of shipment statements for this receipt.
     * @param list<ShopReceiptTransaction>|null $transactions Array of transactions for the receipt.
     * @param list<ShopRefund>|null $refunds Refunds for a given receipt.
     */
    public function __construct(
        public ?int $receipt_id = null,
        public ?int $receipt_type = null,
        public ?int $seller_user_id = null,
        public ?string $seller_email = null,
        public ?int $buyer_user_id = null,
        public ?string $buyer_email = null,
        public ?string $name = null,
        public ?string $first_line = null,
        public ?string $second_line = null,
        public ?string $city = null,
        public ?string $state = null,
        public ?string $zip = null,
        public ?string $status = null,
        public ?string $formatted_address = null,
        public ?string $country_iso = null,
        public ?string $payment_method = null,
        public ?string $payment_email = null,
        public ?string $message_from_seller = null,
        public ?string $message_from_buyer = null,
        public ?string $message_from_payment = null,
        public ?bool $is_paid = null,
        public ?bool $is_shipped = null,
        public ?int $create_timestamp = null,
        public ?int $created_timestamp = null,
        public ?int $update_timestamp = null,
        public ?int $updated_timestamp = null,
        public ?bool $is_gift = null,
        public ?string $gift_message = null,
        public ?string $gift_sender = null,
        public ?Money $grandtotal = null,
        public ?Money $subtotal = null,
        public ?Money $total_price = null,
        public ?Money $total_shipping_cost = null,
        public ?Money $total_tax_cost = null,
        public ?Money $total_vat_cost = null,
        public ?Money $discount_amt = null,
        public ?Money $gift_wrap_price = null,
        public ?array $shipments = null,
        public ?array $transactions = null,
        public ?array $refunds = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            receipt_id: isset($data['receipt_id']) ? (int) $data['receipt_id'] : null,
            receipt_type: isset($data['receipt_type']) ? (int) $data['receipt_type'] : null,
            seller_user_id: isset($data['seller_user_id']) ? (int) $data['seller_user_id'] : null,
            seller_email: isset($data['seller_email']) ? (string) $data['seller_email'] : null,
            buyer_user_id: isset($data['buyer_user_id']) ? (int) $data['buyer_user_id'] : null,
            buyer_email: isset($data['buyer_email']) ? (string) $data['buyer_email'] : null,
            name: isset($data['name']) ? (string) $data['name'] : null,
            first_line: isset($data['first_line']) ? (string) $data['first_line'] : null,
            second_line: isset($data['second_line']) ? (string) $data['second_line'] : null,
            city: isset($data['city']) ? (string) $data['city'] : null,
            state: isset($data['state']) ? (string) $data['state'] : null,
            zip: isset($data['zip']) ? (string) $data['zip'] : null,
            status: isset($data['status']) ? (string) $data['status'] : null,
            formatted_address: isset($data['formatted_address']) ? (string) $data['formatted_address'] : null,
            country_iso: isset($data['country_iso']) ? (string) $data['country_iso'] : null,
            payment_method: isset($data['payment_method']) ? (string) $data['payment_method'] : null,
            payment_email: isset($data['payment_email']) ? (string) $data['payment_email'] : null,
            message_from_seller: isset($data['message_from_seller']) ? (string) $data['message_from_seller'] : null,
            message_from_buyer: isset($data['message_from_buyer']) ? (string) $data['message_from_buyer'] : null,
            message_from_payment: isset($data['message_from_payment']) ? (string) $data['message_from_payment'] : null,
            is_paid: isset($data['is_paid']) ? (bool) $data['is_paid'] : null,
            is_shipped: isset($data['is_shipped']) ? (bool) $data['is_shipped'] : null,
            create_timestamp: isset($data['create_timestamp']) ? (int) $data['create_timestamp'] : null,
            created_timestamp: isset($data['created_timestamp']) ? (int) $data['created_timestamp'] : null,
            update_timestamp: isset($data['update_timestamp']) ? (int) $data['update_timestamp'] : null,
            updated_timestamp: isset($data['updated_timestamp']) ? (int) $data['updated_timestamp'] : null,
            is_gift: isset($data['is_gift']) ? (bool) $data['is_gift'] : null,
            gift_message: isset($data['gift_message']) ? (string) $data['gift_message'] : null,
            gift_sender: isset($data['gift_sender']) ? (string) $data['gift_sender'] : null,
            grandtotal: isset($data['grandtotal']) && is_array($data['grandtotal']) ? Money::fromArray($data['grandtotal']) : null,
            subtotal: isset($data['subtotal']) && is_array($data['subtotal']) ? Money::fromArray($data['subtotal']) : null,
            total_price: isset($data['total_price']) && is_array($data['total_price']) ? Money::fromArray($data['total_price']) : null,
            total_shipping_cost: isset($data['total_shipping_cost']) && is_array($data['total_shipping_cost']) ? Money::fromArray($data['total_shipping_cost']) : null,
            total_tax_cost: isset($data['total_tax_cost']) && is_array($data['total_tax_cost']) ? Money::fromArray($data['total_tax_cost']) : null,
            total_vat_cost: isset($data['total_vat_cost']) && is_array($data['total_vat_cost']) ? Money::fromArray($data['total_vat_cost']) : null,
            discount_amt: isset($data['discount_amt']) && is_array($data['discount_amt']) ? Money::fromArray($data['discount_amt']) : null,
            gift_wrap_price: isset($data['gift_wrap_price']) && is_array($data['gift_wrap_price']) ? Money::fromArray($data['gift_wrap_price']) : null,
            shipments: isset($data['shipments']) && is_array($data['shipments'])
                ? array_values(array_map(static fn (array $i): ShopReceiptShipment => ShopReceiptShipment::fromArray($i), $data['shipments']))
                : null,
            transactions: isset($data['transactions']) && is_array($data['transactions'])
                ? array_values(array_map(static fn (array $i): ShopReceiptTransaction => ShopReceiptTransaction::fromArray($i), $data['transactions']))
                : null,
            refunds: isset($data['refunds']) && is_array($data['refunds'])
                ? array_values(array_map(static fn (array $i): ShopRefund => ShopRefund::fromArray($i), $data['refunds']))
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
        if ($this->receipt_id !== null) {
            $data['receipt_id'] = $this->receipt_id;
        }
        if ($this->receipt_type !== null) {
            $data['receipt_type'] = $this->receipt_type;
        }
        if ($this->seller_user_id !== null) {
            $data['seller_user_id'] = $this->seller_user_id;
        }
        if ($this->seller_email !== null) {
            $data['seller_email'] = $this->seller_email;
        }
        if ($this->buyer_user_id !== null) {
            $data['buyer_user_id'] = $this->buyer_user_id;
        }
        if ($this->buyer_email !== null) {
            $data['buyer_email'] = $this->buyer_email;
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
        if ($this->status !== null) {
            $data['status'] = $this->status;
        }
        if ($this->formatted_address !== null) {
            $data['formatted_address'] = $this->formatted_address;
        }
        if ($this->country_iso !== null) {
            $data['country_iso'] = $this->country_iso;
        }
        if ($this->payment_method !== null) {
            $data['payment_method'] = $this->payment_method;
        }
        if ($this->payment_email !== null) {
            $data['payment_email'] = $this->payment_email;
        }
        if ($this->message_from_seller !== null) {
            $data['message_from_seller'] = $this->message_from_seller;
        }
        if ($this->message_from_buyer !== null) {
            $data['message_from_buyer'] = $this->message_from_buyer;
        }
        if ($this->message_from_payment !== null) {
            $data['message_from_payment'] = $this->message_from_payment;
        }
        if ($this->is_paid !== null) {
            $data['is_paid'] = $this->is_paid;
        }
        if ($this->is_shipped !== null) {
            $data['is_shipped'] = $this->is_shipped;
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
        if ($this->is_gift !== null) {
            $data['is_gift'] = $this->is_gift;
        }
        if ($this->gift_message !== null) {
            $data['gift_message'] = $this->gift_message;
        }
        if ($this->gift_sender !== null) {
            $data['gift_sender'] = $this->gift_sender;
        }
        if ($this->grandtotal !== null) {
            $data['grandtotal'] = $this->grandtotal->toArray();
        }
        if ($this->subtotal !== null) {
            $data['subtotal'] = $this->subtotal->toArray();
        }
        if ($this->total_price !== null) {
            $data['total_price'] = $this->total_price->toArray();
        }
        if ($this->total_shipping_cost !== null) {
            $data['total_shipping_cost'] = $this->total_shipping_cost->toArray();
        }
        if ($this->total_tax_cost !== null) {
            $data['total_tax_cost'] = $this->total_tax_cost->toArray();
        }
        if ($this->total_vat_cost !== null) {
            $data['total_vat_cost'] = $this->total_vat_cost->toArray();
        }
        if ($this->discount_amt !== null) {
            $data['discount_amt'] = $this->discount_amt->toArray();
        }
        if ($this->gift_wrap_price !== null) {
            $data['gift_wrap_price'] = $this->gift_wrap_price->toArray();
        }
        if ($this->shipments !== null) {
            $data['shipments'] = array_map(static fn (ShopReceiptShipment $i): array => $i->toArray(), $this->shipments);
        }
        if ($this->transactions !== null) {
            $data['transactions'] = array_map(static fn (ShopReceiptTransaction $i): array => $i->toArray(), $this->transactions);
        }
        if ($this->refunds !== null) {
            $data['refunds'] = array_map(static fn (ShopRefund $i): array => $i->toArray(), $this->refunds);
        }

        return $data;
    }
}
