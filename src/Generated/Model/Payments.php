<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents several payments made with Etsy Payments. All monetary amounts are in USD pennies unless otherwise specified.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class Payments
{
    /**
     * @param int|null $count The number of payments in the response.
     * @param list<Payment>|null $results A list of payments.
     */
    public function __construct(
        public ?int $count = null,
        public ?array $results = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            count: isset($data['count']) ? (int) $data['count'] : null,
            results: isset($data['results']) && is_array($data['results'])
                ? array_values(array_map(static fn (array $i): Payment => Payment::fromArray($i), $data['results']))
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
        if ($this->count !== null) {
            $data['count'] = $this->count;
        }
        if ($this->results !== null) {
            $data['results'] = array_map(static fn (Payment $i): array => $i->toArray(), $this->results);
        }

        return $data;
    }
}
