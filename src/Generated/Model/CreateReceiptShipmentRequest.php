<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class CreateReceiptShipmentRequest
{
    /**
     * @param string|null $tracking_code The tracking code for this receipt.
     * @param string|null $carrier_name The carrier name for this receipt.
     * @param bool|null $send_bcc If true, the shipping notification will be sent to the seller as well
     * @param string|null $note_to_buyer Message to include in notification to the buyer.
     * @param string|null $mail_class The service level of postal or carrier service selected for the shipment (e.g., First-Class, Priority, Ground, Express).
     * @param float|null $weight The total weight of the package.
     * @param string|null $weight_units Unit of measurement used for package weight (oz, grams, etc.).
     * @param float|null $length Longest side of the package.
     * @param float|null $width Second longest side of the package.
     * @param float|null $height Third longest side of the package.
     * @param string|null $dimension_units Unit of measurement used for package dimensions (in, cm...).
     * @param float|null $shipping_label_cost The purchase price the seller paid for the shipping label.
     * @param string|null $shipping_label_currency The currency in which the shipping label was purchased.
     * @param string|null $revenue_eligibility A flag indicating if the shipment is tied to a revenue share agreement between Etsy and the vendor.
     * @param string|null $ship_from_country Where the package ships from.
     * @param string|null $ship_to_country Package destination.
     * @param string|null $incoterm The specific incoterm (e.g., DDU, DDP) designated for the shipment.
     * @param list<array<string, mixed>>|null $customs_data Contains custom data like country of origin, declared value and HS code.
     * @param float|null $duty_amount The estimated or actual amount of import duties and taxes assessed by customs for the shipment.
     * @param string|null $duty_currency The currency in which the duty was paid.
     * @param string|null $ship_date The date package was shipped.
     */
    public function __construct(
        public ?string $tracking_code = null,
        public ?string $carrier_name = null,
        public ?bool $send_bcc = null,
        public ?string $note_to_buyer = null,
        public ?string $mail_class = null,
        public ?float $weight = null,
        public ?string $weight_units = null,
        public ?float $length = null,
        public ?float $width = null,
        public ?float $height = null,
        public ?string $dimension_units = null,
        public ?float $shipping_label_cost = null,
        public ?string $shipping_label_currency = null,
        public ?string $revenue_eligibility = null,
        public ?string $ship_from_country = null,
        public ?string $ship_to_country = null,
        public ?string $incoterm = null,
        public ?array $customs_data = null,
        public ?float $duty_amount = null,
        public ?string $duty_currency = null,
        public ?string $ship_date = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            tracking_code: isset($data['tracking_code']) ? (string) $data['tracking_code'] : null,
            carrier_name: isset($data['carrier_name']) ? (string) $data['carrier_name'] : null,
            send_bcc: isset($data['send_bcc']) ? (bool) $data['send_bcc'] : null,
            note_to_buyer: isset($data['note_to_buyer']) ? (string) $data['note_to_buyer'] : null,
            mail_class: isset($data['mail_class']) ? (string) $data['mail_class'] : null,
            weight: isset($data['weight']) ? (float) $data['weight'] : null,
            weight_units: isset($data['weight_units']) ? (string) $data['weight_units'] : null,
            length: isset($data['length']) ? (float) $data['length'] : null,
            width: isset($data['width']) ? (float) $data['width'] : null,
            height: isset($data['height']) ? (float) $data['height'] : null,
            dimension_units: isset($data['dimension_units']) ? (string) $data['dimension_units'] : null,
            shipping_label_cost: isset($data['shipping_label_cost']) ? (float) $data['shipping_label_cost'] : null,
            shipping_label_currency: isset($data['shipping_label_currency']) ? (string) $data['shipping_label_currency'] : null,
            revenue_eligibility: isset($data['revenue_eligibility']) ? (string) $data['revenue_eligibility'] : null,
            ship_from_country: isset($data['ship_from_country']) ? (string) $data['ship_from_country'] : null,
            ship_to_country: isset($data['ship_to_country']) ? (string) $data['ship_to_country'] : null,
            incoterm: isset($data['incoterm']) ? (string) $data['incoterm'] : null,
            customs_data: isset($data['customs_data']) ? (array) $data['customs_data'] : null,
            duty_amount: isset($data['duty_amount']) ? (float) $data['duty_amount'] : null,
            duty_currency: isset($data['duty_currency']) ? (string) $data['duty_currency'] : null,
            ship_date: isset($data['ship_date']) ? (string) $data['ship_date'] : null,
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
        if ($this->tracking_code !== null) {
            $data['tracking_code'] = $this->tracking_code;
        }
        if ($this->carrier_name !== null) {
            $data['carrier_name'] = $this->carrier_name;
        }
        if ($this->send_bcc !== null) {
            $data['send_bcc'] = $this->send_bcc;
        }
        if ($this->note_to_buyer !== null) {
            $data['note_to_buyer'] = $this->note_to_buyer;
        }
        if ($this->mail_class !== null) {
            $data['mail_class'] = $this->mail_class;
        }
        if ($this->weight !== null) {
            $data['weight'] = $this->weight;
        }
        if ($this->weight_units !== null) {
            $data['weight_units'] = $this->weight_units;
        }
        if ($this->length !== null) {
            $data['length'] = $this->length;
        }
        if ($this->width !== null) {
            $data['width'] = $this->width;
        }
        if ($this->height !== null) {
            $data['height'] = $this->height;
        }
        if ($this->dimension_units !== null) {
            $data['dimension_units'] = $this->dimension_units;
        }
        if ($this->shipping_label_cost !== null) {
            $data['shipping_label_cost'] = $this->shipping_label_cost;
        }
        if ($this->shipping_label_currency !== null) {
            $data['shipping_label_currency'] = $this->shipping_label_currency;
        }
        if ($this->revenue_eligibility !== null) {
            $data['revenue_eligibility'] = $this->revenue_eligibility;
        }
        if ($this->ship_from_country !== null) {
            $data['ship_from_country'] = $this->ship_from_country;
        }
        if ($this->ship_to_country !== null) {
            $data['ship_to_country'] = $this->ship_to_country;
        }
        if ($this->incoterm !== null) {
            $data['incoterm'] = $this->incoterm;
        }
        if ($this->customs_data !== null) {
            $data['customs_data'] = $this->customs_data;
        }
        if ($this->duty_amount !== null) {
            $data['duty_amount'] = $this->duty_amount;
        }
        if ($this->duty_currency !== null) {
            $data['duty_currency'] = $this->duty_currency;
        }
        if ($this->ship_date !== null) {
            $data['ship_date'] = $this->ship_date;
        }

        return $data;
    }
}
