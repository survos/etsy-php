<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A representation of an offering for a listing.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ListingInventoryProductOffering
{
    /**
     * @param int|null $offering_id The ID for the ProductOffering
     * @param int|null $quantity The quantity the ProductOffering
     * @param bool|null $is_enabled Whether or not the offering can be shown to buyers.
     * @param bool|null $is_deleted Whether or not the offering has been deleted.
     * @param Money|null $price Price data for this ProductOffering
     * @param int|null $readiness_state_id Processing Profile for this ProductOffering
     */
    public function __construct(
        public ?int $offering_id = null,
        public ?int $quantity = null,
        public ?bool $is_enabled = null,
        public ?bool $is_deleted = null,
        public ?Money $price = null,
        public ?int $readiness_state_id = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            offering_id: isset($data['offering_id']) ? (int) $data['offering_id'] : null,
            quantity: isset($data['quantity']) ? (int) $data['quantity'] : null,
            is_enabled: isset($data['is_enabled']) ? (bool) $data['is_enabled'] : null,
            is_deleted: isset($data['is_deleted']) ? (bool) $data['is_deleted'] : null,
            price: isset($data['price']) && is_array($data['price']) ? Money::fromArray($data['price']) : null,
            readiness_state_id: isset($data['readiness_state_id']) ? (int) $data['readiness_state_id'] : null,
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
        if ($this->offering_id !== null) {
            $data['offering_id'] = $this->offering_id;
        }
        if ($this->quantity !== null) {
            $data['quantity'] = $this->quantity;
        }
        if ($this->is_enabled !== null) {
            $data['is_enabled'] = $this->is_enabled;
        }
        if ($this->is_deleted !== null) {
            $data['is_deleted'] = $this->is_deleted;
        }
        if ($this->price !== null) {
            $data['price'] = $this->price->toArray();
        }
        if ($this->readiness_state_id !== null) {
            $data['readiness_state_id'] = $this->readiness_state_id;
        }

        return $data;
    }
}
