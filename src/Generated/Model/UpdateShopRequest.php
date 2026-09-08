<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class UpdateShopRequest
{
    /**
     * @param string|null $title A brief heading string for the shop's main page.
     * @param string|null $announcement An announcement string to buyers that displays on the shop's homepage.
     * @param string|null $sale_message A message string sent to users who complete a purchase from this shop.
     * @param string|null $digital_sale_message A message string sent to users who purchase a digital item from this shop.
     * @param string|null $policy_additional The shop's additional policies string (may be blank).
     */
    public function __construct(
        public ?string $title = null,
        public ?string $announcement = null,
        public ?string $sale_message = null,
        public ?string $digital_sale_message = null,
        public ?string $policy_additional = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            title: isset($data['title']) ? (string) $data['title'] : null,
            announcement: isset($data['announcement']) ? (string) $data['announcement'] : null,
            sale_message: isset($data['sale_message']) ? (string) $data['sale_message'] : null,
            digital_sale_message: isset($data['digital_sale_message']) ? (string) $data['digital_sale_message'] : null,
            policy_additional: isset($data['policy_additional']) ? (string) $data['policy_additional'] : null,
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
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }
        if ($this->announcement !== null) {
            $data['announcement'] = $this->announcement;
        }
        if ($this->sale_message !== null) {
            $data['sale_message'] = $this->sale_message;
        }
        if ($this->digital_sale_message !== null) {
            $data['digital_sale_message'] = $this->digital_sale_message;
        }
        if ($this->policy_additional !== null) {
            $data['policy_additional'] = $this->policy_additional;
        }

        return $data;
    }
}
