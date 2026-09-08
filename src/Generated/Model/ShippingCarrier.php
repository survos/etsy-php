<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A supported shipping carrier, which is used to calculate an Estimated Delivery Date.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShippingCarrier
{
    /**
     * @param int|null $shipping_carrier_id The numeric ID of this shipping carrier.
     * @param string|null $name The name of this shipping carrier.
     * @param list<ShippingCarrierMailClass>|null $domestic_classes Set of domestic mail classes of this shipping carrier.
     * @param list<ShippingCarrierMailClass>|null $international_classes Set of international mail classes of this shipping carrier.
     */
    public function __construct(
        public ?int $shipping_carrier_id = null,
        public ?string $name = null,
        public ?array $domestic_classes = null,
        public ?array $international_classes = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            shipping_carrier_id: isset($data['shipping_carrier_id']) ? (int) $data['shipping_carrier_id'] : null,
            name: isset($data['name']) ? (string) $data['name'] : null,
            domestic_classes: isset($data['domestic_classes']) && is_array($data['domestic_classes'])
                ? array_values(array_map(static fn (array $i): ShippingCarrierMailClass => ShippingCarrierMailClass::fromArray($i), $data['domestic_classes']))
                : null,
            international_classes: isset($data['international_classes']) && is_array($data['international_classes'])
                ? array_values(array_map(static fn (array $i): ShippingCarrierMailClass => ShippingCarrierMailClass::fromArray($i), $data['international_classes']))
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
        if ($this->shipping_carrier_id !== null) {
            $data['shipping_carrier_id'] = $this->shipping_carrier_id;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->domestic_classes !== null) {
            $data['domestic_classes'] = array_map(static fn (ShippingCarrierMailClass $i): array => $i->toArray(), $this->domestic_classes);
        }
        if ($this->international_classes !== null) {
            $data['international_classes'] = array_map(static fn (ShippingCarrierMailClass $i): array => $i->toArray(), $this->international_classes);
        }

        return $data;
    }
}
