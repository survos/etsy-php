<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class UploadListingFileRequest
{
    /**
     * @param int|null $listing_file_id The unique numeric ID of a file associated with a digital listing.
     * @param string|null $file A binary file to upload.
     * @param string|null $name The file name string of a file to upload
     * @param int|null $rank The positive non-zero numeric position in the images displayed in a listing, with rank 1 images appearing in the left-most position in a listing.
     */
    public function __construct(
        public ?int $listing_file_id = null,
        public ?string $file = null,
        public ?string $name = null,
        public ?int $rank = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            listing_file_id: isset($data['listing_file_id']) ? (int) $data['listing_file_id'] : null,
            file: isset($data['file']) ? (string) $data['file'] : null,
            name: isset($data['name']) ? (string) $data['name'] : null,
            rank: isset($data['rank']) ? (int) $data['rank'] : null,
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
        if ($this->listing_file_id !== null) {
            $data['listing_file_id'] = $this->listing_file_id;
        }
        if ($this->file !== null) {
            $data['file'] = $this->file;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->rank !== null) {
            $data['rank'] = $this->rank;
        }

        return $data;
    }
}
