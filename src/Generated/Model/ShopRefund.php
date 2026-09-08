<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * The refund record for a receipt.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopRefund
{
    /**
     * @param Money|null $amount A number equal to the refund total.
     * @param int|null $created_timestamp The date & time of the refund, in epoch seconds.
     * @param string|null $reason The reason string given for the refund.
     * @param string|null $note_from_issuer The note string created by the refund issuer.
     * @param string|null $status The status indication string for the refund.
     */
    public function __construct(
        public ?Money $amount = null,
        public ?int $created_timestamp = null,
        public ?string $reason = null,
        public ?string $note_from_issuer = null,
        public ?string $status = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            amount: isset($data['amount']) && is_array($data['amount']) ? Money::fromArray($data['amount']) : null,
            created_timestamp: isset($data['created_timestamp']) ? (int) $data['created_timestamp'] : null,
            reason: isset($data['reason']) ? (string) $data['reason'] : null,
            note_from_issuer: isset($data['note_from_issuer']) ? (string) $data['note_from_issuer'] : null,
            status: isset($data['status']) ? (string) $data['status'] : null,
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
        if ($this->amount !== null) {
            $data['amount'] = $this->amount->toArray();
        }
        if ($this->created_timestamp !== null) {
            $data['created_timestamp'] = $this->created_timestamp;
        }
        if ($this->reason !== null) {
            $data['reason'] = $this->reason;
        }
        if ($this->note_from_issuer !== null) {
            $data['note_from_issuer'] = $this->note_from_issuer;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status;
        }

        return $data;
    }
}
