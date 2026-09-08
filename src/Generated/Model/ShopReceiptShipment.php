<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * The record of one shipment event for a ShopReceipt. A receipt may have many ShopReceiptShipment records.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopReceiptShipment
{
    /**
     * @param int|null $receipt_shipping_id The unique numeric ID of a Shop Receipt Shipment record.
     * @param int|null $shipment_notification_timestamp The time at which Etsy notified the buyer of the shipment event, in epoch seconds.
     * @param string|null $carrier_name The name string for the carrier/company responsible for delivering the shipment.
     * @param string|null $tracking_code The tracking code string provided by the carrier/company for the shipment.
     */
    public function __construct(
        public ?int $receipt_shipping_id = null,
        public ?int $shipment_notification_timestamp = null,
        public ?string $carrier_name = null,
        public ?string $tracking_code = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            receipt_shipping_id: isset($data['receipt_shipping_id']) ? (int) $data['receipt_shipping_id'] : null,
            shipment_notification_timestamp: isset($data['shipment_notification_timestamp']) ? (int) $data['shipment_notification_timestamp'] : null,
            carrier_name: isset($data['carrier_name']) ? (string) $data['carrier_name'] : null,
            tracking_code: isset($data['tracking_code']) ? (string) $data['tracking_code'] : null,
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
        if ($this->receipt_shipping_id !== null) {
            $data['receipt_shipping_id'] = $this->receipt_shipping_id;
        }
        if ($this->shipment_notification_timestamp !== null) {
            $data['shipment_notification_timestamp'] = $this->shipment_notification_timestamp;
        }
        if ($this->carrier_name !== null) {
            $data['carrier_name'] = $this->carrier_name;
        }
        if ($this->tracking_code !== null) {
            $data['tracking_code'] = $this->tracking_code;
        }

        return $data;
    }
}
