<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents an entry in a shop's ledger.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class PaymentAccountLedgerEntry
{
    /**
     * @param int|null $entry_id The ledger entry's numeric ID.
     * @param int|null $ledger_id The ledger's numeric ID.
     * @param int|null $sequence_number The sequence allows ledger entries to be sorted chronologically. The higher the sequence, the more recent the entry.
     * @param int|null $amount The amount of money credited to the ledger.
     * @param string|null $currency The currency of the entry on the ledger.
     * @param string|null $description Details what kind of ledger entry this is: a payment, refund, reversal of a failed refund, disbursement, returned disbursement, recoupment, miscellaneous credit, miscellaneous debit, or bill payment.
     * @param int|null $balance The amount of money in the shop's ledger the moment after this entry was applied.
     * @param int|null $create_date The date and time the ledger entry was created in Epoch seconds.
     * @param int|null $created_timestamp The date and time the ledger entry was created in Epoch seconds.
     * @param string|null $ledger_type The original reference type for the ledger entry.
     * @param string|null $reference_type The object type the ledger entry refers to.
     * @param string|null $reference_id The object id the ledger entry refers to.
     * @param int|null $parent_entry_id The parent ledger entry ID used to match related entries (e.g., vat_seller_services to originating seller fees).
     * @param list<PaymentAdjustment>|null $payment_adjustments List of refund objects on an Etsy Payments transaction. All monetary amounts are in USD pennies unless otherwise specified.
     */
    public function __construct(
        public ?int $entry_id = null,
        public ?int $ledger_id = null,
        public ?int $sequence_number = null,
        public ?int $amount = null,
        public ?string $currency = null,
        public ?string $description = null,
        public ?int $balance = null,
        public ?int $create_date = null,
        public ?int $created_timestamp = null,
        public ?string $ledger_type = null,
        public ?string $reference_type = null,
        public ?string $reference_id = null,
        public ?int $parent_entry_id = null,
        public ?array $payment_adjustments = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            entry_id: isset($data['entry_id']) ? (int) $data['entry_id'] : null,
            ledger_id: isset($data['ledger_id']) ? (int) $data['ledger_id'] : null,
            sequence_number: isset($data['sequence_number']) ? (int) $data['sequence_number'] : null,
            amount: isset($data['amount']) ? (int) $data['amount'] : null,
            currency: isset($data['currency']) ? (string) $data['currency'] : null,
            description: isset($data['description']) ? (string) $data['description'] : null,
            balance: isset($data['balance']) ? (int) $data['balance'] : null,
            create_date: isset($data['create_date']) ? (int) $data['create_date'] : null,
            created_timestamp: isset($data['created_timestamp']) ? (int) $data['created_timestamp'] : null,
            ledger_type: isset($data['ledger_type']) ? (string) $data['ledger_type'] : null,
            reference_type: isset($data['reference_type']) ? (string) $data['reference_type'] : null,
            reference_id: isset($data['reference_id']) ? (string) $data['reference_id'] : null,
            parent_entry_id: isset($data['parent_entry_id']) ? (int) $data['parent_entry_id'] : null,
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
        if ($this->entry_id !== null) {
            $data['entry_id'] = $this->entry_id;
        }
        if ($this->ledger_id !== null) {
            $data['ledger_id'] = $this->ledger_id;
        }
        if ($this->sequence_number !== null) {
            $data['sequence_number'] = $this->sequence_number;
        }
        if ($this->amount !== null) {
            $data['amount'] = $this->amount;
        }
        if ($this->currency !== null) {
            $data['currency'] = $this->currency;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->balance !== null) {
            $data['balance'] = $this->balance;
        }
        if ($this->create_date !== null) {
            $data['create_date'] = $this->create_date;
        }
        if ($this->created_timestamp !== null) {
            $data['created_timestamp'] = $this->created_timestamp;
        }
        if ($this->ledger_type !== null) {
            $data['ledger_type'] = $this->ledger_type;
        }
        if ($this->reference_type !== null) {
            $data['reference_type'] = $this->reference_type;
        }
        if ($this->reference_id !== null) {
            $data['reference_id'] = $this->reference_id;
        }
        if ($this->parent_entry_id !== null) {
            $data['parent_entry_id'] = $this->parent_entry_id;
        }
        if ($this->payment_adjustments !== null) {
            $data['payment_adjustments'] = array_map(static fn (PaymentAdjustment $i): array => $i->toArray(), $this->payment_adjustments);
        }

        return $data;
    }
}
