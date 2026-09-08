<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents a single user of the site
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class SelfModel
{
    /**
     * @param int|null $user_id The numeric ID of a user. This number is also a valid shop ID for the user's shop.
     * @param int|null $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function __construct(
        public ?int $user_id = null,
        public ?int $shop_id = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            user_id: isset($data['user_id']) ? (int) $data['user_id'] : null,
            shop_id: isset($data['shop_id']) ? (int) $data['shop_id'] : null,
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
        if ($this->user_id !== null) {
            $data['user_id'] = $this->user_id;
        }
        if ($this->shop_id !== null) {
            $data['shop_id'] = $this->shop_id;
        }

        return $data;
    }
}
