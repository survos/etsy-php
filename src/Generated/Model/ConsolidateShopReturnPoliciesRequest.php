<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 *
 * Etsy declares these REQUIRED when creating or updating: source_return_policy_id, destination_return_policy_id.
 * They are still nullable here -- a response model has to survive a field
 * Etsy stops sending -- so the requirement is documented, not enforced by the
 * constructor. Validate before sending, not after parsing.
 */
final readonly class ConsolidateShopReturnPoliciesRequest
{
    /**
     * @param int|null $source_return_policy_id The numeric ID of the [Return Policy](/documentation/reference#operation/getShopReturnPolicies).
     * @param int|null $destination_return_policy_id The numeric ID of the [Return Policy](/documentation/reference#operation/getShopReturnPolicies).
     */
    public function __construct(
        public ?int $source_return_policy_id = null,
        public ?int $destination_return_policy_id = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            source_return_policy_id: isset($data['source_return_policy_id']) ? (int) $data['source_return_policy_id'] : null,
            destination_return_policy_id: isset($data['destination_return_policy_id']) ? (int) $data['destination_return_policy_id'] : null,
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
        if ($this->source_return_policy_id !== null) {
            $data['source_return_policy_id'] = $this->source_return_policy_id;
        }
        if ($this->destination_return_policy_id !== null) {
            $data['destination_return_policy_id'] = $this->destination_return_policy_id;
        }

        return $data;
    }
}
