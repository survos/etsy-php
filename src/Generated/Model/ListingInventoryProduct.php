<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A representation of a product for a listing.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ListingInventoryProduct
{
    /**
     * @param int|null $product_id The numeric ID for a specific [product](/documentation/reference#tag/ShopListing-Product) purchased from a listing.
     * @param string|null $sku The SKU string for the product
     * @param bool|null $is_deleted When true, someone deleted this product.
     * @param list<ListingInventoryProductOffering>|null $offerings A list of product offering entries for this product.
     * @param list<ListingPropertyValue>|null $property_values A list of property value entries for this product. Note: parenthesis characters (`(` and `)`) are not allowed.
     */
    public function __construct(
        public ?int $product_id = null,
        public ?string $sku = null,
        public ?bool $is_deleted = null,
        public ?array $offerings = null,
        public ?array $property_values = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            product_id: isset($data['product_id']) ? (int) $data['product_id'] : null,
            sku: isset($data['sku']) ? (string) $data['sku'] : null,
            is_deleted: isset($data['is_deleted']) ? (bool) $data['is_deleted'] : null,
            offerings: isset($data['offerings']) && is_array($data['offerings'])
                ? array_values(array_map(static fn (array $i): ListingInventoryProductOffering => ListingInventoryProductOffering::fromArray($i), $data['offerings']))
                : null,
            property_values: isset($data['property_values']) && is_array($data['property_values'])
                ? array_values(array_map(static fn (array $i): ListingPropertyValue => ListingPropertyValue::fromArray($i), $data['property_values']))
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
        if ($this->product_id !== null) {
            $data['product_id'] = $this->product_id;
        }
        if ($this->sku !== null) {
            $data['sku'] = $this->sku;
        }
        if ($this->is_deleted !== null) {
            $data['is_deleted'] = $this->is_deleted;
        }
        if ($this->offerings !== null) {
            $data['offerings'] = array_map(static fn (ListingInventoryProductOffering $i): array => $i->toArray(), $this->offerings);
        }
        if ($this->property_values !== null) {
            $data['property_values'] = array_map(static fn (ListingPropertyValue $i): array => $i->toArray(), $this->property_values);
        }

        return $data;
    }
}
