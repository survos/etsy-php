<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents a description of a shop production partner.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopProductionPartner
{
    /**
     * @param int|null $production_partner_id The numeric ID of a production partner.
     * @param string|null $partner_name The name or title of the production partner.
     * @param string|null $location A string representing the production partner location.
     */
    public function __construct(
        public ?int $production_partner_id = null,
        public ?string $partner_name = null,
        public ?string $location = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            production_partner_id: isset($data['production_partner_id']) ? (int) $data['production_partner_id'] : null,
            partner_name: isset($data['partner_name']) ? (string) $data['partner_name'] : null,
            location: isset($data['location']) ? (string) $data['location'] : null,
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
        if ($this->production_partner_id !== null) {
            $data['production_partner_id'] = $this->production_partner_id;
        }
        if ($this->partner_name !== null) {
            $data['partner_name'] = $this->partner_name;
        }
        if ($this->location !== null) {
            $data['location'] = $this->location;
        }

        return $data;
    }
}
