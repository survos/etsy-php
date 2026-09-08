<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class UpdateShopReceiptRequest
{
    /**
     * @param bool|null $was_shipped When `true`, returns receipts where the seller shipped the product(s) in this receipt. When `false`, returns receipts where shipment has not been set.
     * @param bool|null $was_paid When `true`, returns receipts where the seller has received payment for the receipt. When `false`, returns receipts where payment has not been received.
     */
    public function __construct(
        public ?bool $was_shipped = null,
        public ?bool $was_paid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            was_shipped: isset($data['was_shipped']) ? (bool) $data['was_shipped'] : null,
            was_paid: isset($data['was_paid']) ? (bool) $data['was_paid'] : null,
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
        if ($this->was_shipped !== null) {
            $data['was_shipped'] = $this->was_shipped;
        }
        if ($this->was_paid !== null) {
            $data['was_paid'] = $this->was_paid;
        }

        return $data;
    }
}
