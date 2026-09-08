<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents several UserAddress records.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class UserAddresses
{
    /**
     * @param int|null $count The number of UserAddress records being returned.
     * @param list<UserAddress>|null $results An array of UserAddress resources.
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
                ? array_values(array_map(static fn (array $i): UserAddress => UserAddress::fromArray($i), $data['results']))
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
            $data['results'] = array_map(static fn (UserAddress $i): array => $i->toArray(), $this->results);
        }

        return $data;
    }
}
