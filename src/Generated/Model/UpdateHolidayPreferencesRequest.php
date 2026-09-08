<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 *
 * Etsy declares these REQUIRED when creating or updating: is_working.
 * They are still nullable here -- a response model has to survive a field
 * Etsy stops sending -- so the requirement is documented, not enforced by the
 * constructor. Validate before sending, not after parsing.
 */
final readonly class UpdateHolidayPreferencesRequest
{
    /**
     * @param bool|null $is_working A boolean value for whether the shop will process orders on a particular holiday.
     */
    public function __construct(
        public ?bool $is_working = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            is_working: isset($data['is_working']) ? (bool) $data['is_working'] : null,
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
        if ($this->is_working !== null) {
            $data['is_working'] = $this->is_working;
        }

        return $data;
    }
}
