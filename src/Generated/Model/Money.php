<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A representation of an amount of money.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class Money
{
    /**
     * @param int|null $amount The amount of represented by this data.
     * @param int|null $divisor The divisor to render the amount.
     * @param string|null $currency_code The ISO currency code for this data.
     */
    public function __construct(
        public ?int $amount = null,
        public ?int $divisor = null,
        public ?string $currency_code = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            amount: isset($data['amount']) ? (int) $data['amount'] : null,
            divisor: isset($data['divisor']) ? (int) $data['divisor'] : null,
            currency_code: isset($data['currency_code']) ? (string) $data['currency_code'] : null,
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
            $data['amount'] = $this->amount;
        }
        if ($this->divisor !== null) {
            $data['divisor'] = $this->divisor;
        }
        if ($this->currency_code !== null) {
            $data['currency_code'] = $this->currency_code;
        }

        return $data;
    }
}
