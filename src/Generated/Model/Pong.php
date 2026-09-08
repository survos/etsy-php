<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A confirmation that the current application has access to the Open API
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class Pong
{
    /**
     * @param int|null $application_id The authenticated application's ID
     */
    public function __construct(
        public ?int $application_id = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            application_id: isset($data['application_id']) ? (int) $data['application_id'] : null,
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
        if ($this->application_id !== null) {
            $data['application_id'] = $this->application_id;
        }

        return $data;
    }
}
