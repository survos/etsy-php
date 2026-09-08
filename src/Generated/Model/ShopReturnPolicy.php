<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents a listing-level return policy.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopReturnPolicy
{
    /**
     * @param int|null $return_policy_id The numeric ID of the [Return Policy](/documentation/reference#operation/getShopReturnPolicies).
     * @param int|null $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param bool|null $accepts_returns return_policy_accepts_returns
     * @param bool|null $accepts_exchanges return_policy_accepts_exchanges
     * @param int|null $return_deadline The deadline for the Return Policy, measured in days. The value must be one of the following: [7, 14, 21, 30, 45, 60, 90].
     */
    public function __construct(
        public ?int $return_policy_id = null,
        public ?int $shop_id = null,
        public ?bool $accepts_returns = null,
        public ?bool $accepts_exchanges = null,
        public ?int $return_deadline = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            return_policy_id: isset($data['return_policy_id']) ? (int) $data['return_policy_id'] : null,
            shop_id: isset($data['shop_id']) ? (int) $data['shop_id'] : null,
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
        if ($this->return_policy_id !== null) {
            $data['return_policy_id'] = $this->return_policy_id;
        }
        if ($this->shop_id !== null) {
            $data['shop_id'] = $this->shop_id;
        }
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
