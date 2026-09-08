<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Represents a single user of the site
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class User
{
    /**
     * @param int|null $user_id The numeric ID of a user. This number is also a valid shop ID for the user's shop.
     * @param string|null $primary_email An email address string for the user's primary email address. Access to this field is granted on a case by case basis for third-party integrations that require full access
     * @param string|null $first_name The user's first name.
     * @param string|null $last_name The user's last name.
     * @param string|null $image_url_75x75 The user's avatar URL.
     */
    public function __construct(
        public ?int $user_id = null,
        public ?string $primary_email = null,
        public ?string $first_name = null,
        public ?string $last_name = null,
        public ?string $image_url_75x75 = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            user_id: isset($data['user_id']) ? (int) $data['user_id'] : null,
            primary_email: isset($data['primary_email']) ? (string) $data['primary_email'] : null,
            first_name: isset($data['first_name']) ? (string) $data['first_name'] : null,
            last_name: isset($data['last_name']) ? (string) $data['last_name'] : null,
            image_url_75x75: isset($data['image_url_75x75']) ? (string) $data['image_url_75x75'] : null,
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
        if ($this->primary_email !== null) {
            $data['primary_email'] = $this->primary_email;
        }
        if ($this->first_name !== null) {
            $data['first_name'] = $this->first_name;
        }
        if ($this->last_name !== null) {
            $data['last_name'] = $this->last_name;
        }
        if ($this->image_url_75x75 !== null) {
            $data['image_url_75x75'] = $this->image_url_75x75;
        }

        return $data;
    }
}
