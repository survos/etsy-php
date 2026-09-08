<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 *
 * Etsy declares these REQUIRED when creating or updating: products.
 * They are still nullable here -- a response model has to survive a field
 * Etsy stops sending -- so the requirement is documented, not enforced by the
 * constructor. Validate before sending, not after parsing.
 */
final readonly class UpdateListingInventoryRequest
{
    /**
     * @param list<array<string, mixed>>|null $products A JSON array of products available in a listing, even if only one product. All field names in the JSON blobs are lowercase.
     * @param list<int>|null $price_on_property An array of unique [listing property](/documentation/reference#operation/getListingInventory) ID integers for the properties that change product prices, if any. For example, if you charge specific prices for different si...
     * @param list<int>|null $quantity_on_property An array of unique [listing property](/documentation/reference#operation/getListingInventory) ID integers for the properties that change the quantity of the products, if any. For example, if you stock specific quantities...
     * @param list<int>|null $sku_on_property An array of unique [listing property](/documentation/reference#operation/getListingInventory) ID integers for the properties that change the product SKU, if any. For example, if you use specific skus for different colore...
     * @param list<int>|null $readiness_state_on_property An array of unique [listing property](/documentation/reference#operation/getListingInventory) ID integers for the properties that change processing profile, if any. For example, if you need specific processing profiles f...
     */
    public function __construct(
        public ?array $products = null,
        public ?array $price_on_property = null,
        public ?array $quantity_on_property = null,
        public ?array $sku_on_property = null,
        public ?array $readiness_state_on_property = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            products: isset($data['products']) ? (array) $data['products'] : null,
            price_on_property: isset($data['price_on_property']) ? (array) $data['price_on_property'] : null,
            quantity_on_property: isset($data['quantity_on_property']) ? (array) $data['quantity_on_property'] : null,
            sku_on_property: isset($data['sku_on_property']) ? (array) $data['sku_on_property'] : null,
            readiness_state_on_property: isset($data['readiness_state_on_property']) ? (array) $data['readiness_state_on_property'] : null,
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
        if ($this->products !== null) {
            $data['products'] = $this->products;
        }
        if ($this->price_on_property !== null) {
            $data['price_on_property'] = $this->price_on_property;
        }
        if ($this->quantity_on_property !== null) {
            $data['quantity_on_property'] = $this->quantity_on_property;
        }
        if ($this->sku_on_property !== null) {
            $data['sku_on_property'] = $this->sku_on_property;
        }
        if ($this->readiness_state_on_property !== null) {
            $data['readiness_state_on_property'] = $this->readiness_state_on_property;
        }

        return $data;
    }
}
