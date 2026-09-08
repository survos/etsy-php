<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A shipping carrier's mail class, which is used to calculate an Estimated Delivery Date.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShippingCarrierMailClass
{
    /**
     * @param string|null $mail_class_key The unique identifier of this mail class.
     * @param string|null $name The name of this mail class.
     */
    public function __construct(
        public ?string $mail_class_key = null,
        public ?string $name = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            mail_class_key: isset($data['mail_class_key']) ? (string) $data['mail_class_key'] : null,
            name: isset($data['name']) ? (string) $data['name'] : null,
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
        if ($this->mail_class_key !== null) {
            $data['mail_class_key'] = $this->mail_class_key;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }

        return $data;
    }
}
