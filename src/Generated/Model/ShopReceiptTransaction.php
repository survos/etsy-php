<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A transaction object associated with a shop receipt. Etsy generates one transaction per listing purchased as recorded on the order receipt.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopReceiptTransaction
{
    /**
     * @param int|null $transaction_id The unique numeric ID for a transaction.
     * @param string|null $title The title string of the [listing](/documentation/reference#tag/ShopListing) purchased in this transaction.
     * @param string|null $description The description string of the [listing](/documentation/reference#tag/ShopListing) purchased in this transaction.
     * @param int|null $seller_user_id The numeric user ID for the seller in this transaction.
     * @param int|null $buyer_user_id The numeric user ID for the buyer in this transaction.
     * @param int|null $create_timestamp The transaction's creation date and time, in epoch seconds.
     * @param int|null $created_timestamp The transaction's creation date and time, in epoch seconds.
     * @param int|null $paid_timestamp The transaction's paid date and time, in epoch seconds.
     * @param int|null $shipped_timestamp The transaction's shipping date and time, in epoch seconds.
     * @param int|null $quantity The numeric quantity of products purchased in this transaction.
     * @param int|null $listing_image_id The numeric ID of the primary [listing image](/documentation/reference#tag/ShopListing-Image) for this transaction.
     * @param int|null $receipt_id The numeric ID for the [receipt](/documentation/reference#tag/Shop-Receipt) associated to this transaction.
     * @param bool|null $is_digital When true, the transaction recorded the purchase of a digital listing.
     * @param string|null $file_data A string describing the files purchased in this transaction.
     * @param int|null $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param string|null $transaction_type The type string for the transaction, usually "listing".
     * @param int|null $product_id The numeric ID for a specific [product](/documentation/reference#tag/ShopListing-Product) purchased from a listing.
     * @param string|null $sku The SKU string for the product
     * @param Money|null $price A money object representing the price recorded the transaction.
     * @param Money|null $shipping_cost A money object representing the shipping cost for this transaction.
     * @param list<TransactionVariations>|null $variations Array of variations and personalizations the buyer chose.
     * @param list<ListingPropertyValue>|null $product_data A list of property value entries for this product. Note: parenthesis characters (`(` and `)`) are not allowed.
     * @param int|null $shipping_profile_id The ID of the shipping profile selected for this listing.
     * @param int|null $min_processing_days The minimum number of days for processing the listing.
     * @param int|null $max_processing_days The maximum number of days for processing the listing.
     * @param string|null $shipping_method Name of the selected shipping method.
     * @param string|null $shipping_upgrade The name of the shipping upgrade selected for this listing. Default value is null.
     * @param int|null $expected_ship_date The date & time of the expected ship date, in epoch seconds.
     * @param float|null $buyer_coupon The amount of the buyer coupon that was discounted in the shop's currency.
     * @param float|null $shop_coupon The amount of the shop coupon that was discounted in the shop's currency.
     */
    public function __construct(
        public ?int $transaction_id = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?int $seller_user_id = null,
        public ?int $buyer_user_id = null,
        public ?int $create_timestamp = null,
        public ?int $created_timestamp = null,
        public ?int $paid_timestamp = null,
        public ?int $shipped_timestamp = null,
        public ?int $quantity = null,
        public ?int $listing_image_id = null,
        public ?int $receipt_id = null,
        public ?bool $is_digital = null,
        public ?string $file_data = null,
        public ?int $listing_id = null,
        public ?string $transaction_type = null,
        public ?int $product_id = null,
        public ?string $sku = null,
        public ?Money $price = null,
        public ?Money $shipping_cost = null,
        public ?array $variations = null,
        public ?array $product_data = null,
        public ?int $shipping_profile_id = null,
        public ?int $min_processing_days = null,
        public ?int $max_processing_days = null,
        public ?string $shipping_method = null,
        public ?string $shipping_upgrade = null,
        public ?int $expected_ship_date = null,
        public ?float $buyer_coupon = null,
        public ?float $shop_coupon = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            transaction_id: isset($data['transaction_id']) ? (int) $data['transaction_id'] : null,
            title: isset($data['title']) ? (string) $data['title'] : null,
            description: isset($data['description']) ? (string) $data['description'] : null,
            seller_user_id: isset($data['seller_user_id']) ? (int) $data['seller_user_id'] : null,
            buyer_user_id: isset($data['buyer_user_id']) ? (int) $data['buyer_user_id'] : null,
            create_timestamp: isset($data['create_timestamp']) ? (int) $data['create_timestamp'] : null,
            created_timestamp: isset($data['created_timestamp']) ? (int) $data['created_timestamp'] : null,
            paid_timestamp: isset($data['paid_timestamp']) ? (int) $data['paid_timestamp'] : null,
            shipped_timestamp: isset($data['shipped_timestamp']) ? (int) $data['shipped_timestamp'] : null,
            quantity: isset($data['quantity']) ? (int) $data['quantity'] : null,
            listing_image_id: isset($data['listing_image_id']) ? (int) $data['listing_image_id'] : null,
            receipt_id: isset($data['receipt_id']) ? (int) $data['receipt_id'] : null,
            is_digital: isset($data['is_digital']) ? (bool) $data['is_digital'] : null,
            file_data: isset($data['file_data']) ? (string) $data['file_data'] : null,
            listing_id: isset($data['listing_id']) ? (int) $data['listing_id'] : null,
            transaction_type: isset($data['transaction_type']) ? (string) $data['transaction_type'] : null,
            product_id: isset($data['product_id']) ? (int) $data['product_id'] : null,
            sku: isset($data['sku']) ? (string) $data['sku'] : null,
            price: isset($data['price']) && is_array($data['price']) ? Money::fromArray($data['price']) : null,
            shipping_cost: isset($data['shipping_cost']) && is_array($data['shipping_cost']) ? Money::fromArray($data['shipping_cost']) : null,
            variations: isset($data['variations']) && is_array($data['variations'])
                ? array_values(array_map(static fn (array $i): TransactionVariations => TransactionVariations::fromArray($i), $data['variations']))
                : null,
            product_data: isset($data['product_data']) && is_array($data['product_data'])
                ? array_values(array_map(static fn (array $i): ListingPropertyValue => ListingPropertyValue::fromArray($i), $data['product_data']))
                : null,
            shipping_profile_id: isset($data['shipping_profile_id']) ? (int) $data['shipping_profile_id'] : null,
            min_processing_days: isset($data['min_processing_days']) ? (int) $data['min_processing_days'] : null,
            max_processing_days: isset($data['max_processing_days']) ? (int) $data['max_processing_days'] : null,
            shipping_method: isset($data['shipping_method']) ? (string) $data['shipping_method'] : null,
            shipping_upgrade: isset($data['shipping_upgrade']) ? (string) $data['shipping_upgrade'] : null,
            expected_ship_date: isset($data['expected_ship_date']) ? (int) $data['expected_ship_date'] : null,
            buyer_coupon: isset($data['buyer_coupon']) ? (float) $data['buyer_coupon'] : null,
            shop_coupon: isset($data['shop_coupon']) ? (float) $data['shop_coupon'] : null,
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
        if ($this->transaction_id !== null) {
            $data['transaction_id'] = $this->transaction_id;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->seller_user_id !== null) {
            $data['seller_user_id'] = $this->seller_user_id;
        }
        if ($this->buyer_user_id !== null) {
            $data['buyer_user_id'] = $this->buyer_user_id;
        }
        if ($this->create_timestamp !== null) {
            $data['create_timestamp'] = $this->create_timestamp;
        }
        if ($this->created_timestamp !== null) {
            $data['created_timestamp'] = $this->created_timestamp;
        }
        if ($this->paid_timestamp !== null) {
            $data['paid_timestamp'] = $this->paid_timestamp;
        }
        if ($this->shipped_timestamp !== null) {
            $data['shipped_timestamp'] = $this->shipped_timestamp;
        }
        if ($this->quantity !== null) {
            $data['quantity'] = $this->quantity;
        }
        if ($this->listing_image_id !== null) {
            $data['listing_image_id'] = $this->listing_image_id;
        }
        if ($this->receipt_id !== null) {
            $data['receipt_id'] = $this->receipt_id;
        }
        if ($this->is_digital !== null) {
            $data['is_digital'] = $this->is_digital;
        }
        if ($this->file_data !== null) {
            $data['file_data'] = $this->file_data;
        }
        if ($this->listing_id !== null) {
            $data['listing_id'] = $this->listing_id;
        }
        if ($this->transaction_type !== null) {
            $data['transaction_type'] = $this->transaction_type;
        }
        if ($this->product_id !== null) {
            $data['product_id'] = $this->product_id;
        }
        if ($this->sku !== null) {
            $data['sku'] = $this->sku;
        }
        if ($this->price !== null) {
            $data['price'] = $this->price->toArray();
        }
        if ($this->shipping_cost !== null) {
            $data['shipping_cost'] = $this->shipping_cost->toArray();
        }
        if ($this->variations !== null) {
            $data['variations'] = array_map(static fn (TransactionVariations $i): array => $i->toArray(), $this->variations);
        }
        if ($this->product_data !== null) {
            $data['product_data'] = array_map(static fn (ListingPropertyValue $i): array => $i->toArray(), $this->product_data);
        }
        if ($this->shipping_profile_id !== null) {
            $data['shipping_profile_id'] = $this->shipping_profile_id;
        }
        if ($this->min_processing_days !== null) {
            $data['min_processing_days'] = $this->min_processing_days;
        }
        if ($this->max_processing_days !== null) {
            $data['max_processing_days'] = $this->max_processing_days;
        }
        if ($this->shipping_method !== null) {
            $data['shipping_method'] = $this->shipping_method;
        }
        if ($this->shipping_upgrade !== null) {
            $data['shipping_upgrade'] = $this->shipping_upgrade;
        }
        if ($this->expected_ship_date !== null) {
            $data['expected_ship_date'] = $this->expected_ship_date;
        }
        if ($this->buyer_coupon !== null) {
            $data['buyer_coupon'] = $this->buyer_coupon;
        }
        if ($this->shop_coupon !== null) {
            $data['shop_coupon'] = $this->shop_coupon;
        }

        return $data;
    }
}
