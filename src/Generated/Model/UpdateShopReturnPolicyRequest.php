<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 *
 * Etsy declares these REQUIRED when creating or updating: accepts_returns, accepts_exchanges.
 * They are still nullable here -- a response model has to survive a field
 * Etsy stops sending -- so the requirement is documented, not enforced by the
 * constructor. Validate before sending, not after parsing.
 */
final readonly class UpdateShopReturnPolicyRequest
{
    /**
     * @param int|null $return_deadline The deadline for the Return Policy, measured in days. The value must be one of the following: [7, 14, 21, 30, 45, 60, 90].
     */
    public function __construct(
        public ?bool $accepts_returns = null,
        public ?bool $accepts_exchanges = null,
        public ?int $return_deadline = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            accepts_returns: isset($data['accepts_returns']) ? (bool) $data['accepts_returns'] : null,
            accepts_exchanges: isset($data['accepts_exchanges']) ? (bool) $data['accepts_exchanges'] : null,
            return_deadline: isset($data['return_deadline']) ? (int) $data['return_deadline'] : null,
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
        if ($this->accepts_returns !== null) {
            $data['accepts_returns'] = $this->accepts_returns;
        }
        if ($this->accepts_exchanges !== null) {
            $data['accepts_exchanges'] = $this->accepts_exchanges;
        }
        if ($this->return_deadline !== null) {
            $data['return_deadline'] = $this->return_deadline;
        }

        return $data;
    }
}
