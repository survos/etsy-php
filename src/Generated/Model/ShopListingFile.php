<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A file associated with a digital listing.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopListingFile
{
    /**
     * @param int|null $listing_file_id The unique numeric ID of a file associated with a digital listing.
     * @param int|null $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int|null $rank The numeric index of the display order position of this file in the listing, starting at 1.
     * @param string|null $filename The file name string for a file associated with a digital listing.
     * @param string|null $filesize A human-readable format size string for the size of a file.
     * @param int|null $size_bytes A number indicating the size of a file, measured in bytes.
     * @param string|null $filetype A type string indicating a file's MIME type.
     * @param int|null $create_timestamp The unique numeric ID of a file associated with a digital listing.
     * @param int|null $created_timestamp The unique numeric ID of a file associated with a digital listing.
     */
    public function __construct(
        public ?int $listing_file_id = null,
        public ?int $listing_id = null,
        public ?int $rank = null,
        public ?string $filename = null,
        public ?string $filesize = null,
        public ?int $size_bytes = null,
        public ?string $filetype = null,
        public ?int $create_timestamp = null,
        public ?int $created_timestamp = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            listing_file_id: isset($data['listing_file_id']) ? (int) $data['listing_file_id'] : null,
            listing_id: isset($data['listing_id']) ? (int) $data['listing_id'] : null,
            rank: isset($data['rank']) ? (int) $data['rank'] : null,
            filename: isset($data['filename']) ? (string) $data['filename'] : null,
            filesize: isset($data['filesize']) ? (string) $data['filesize'] : null,
            size_bytes: isset($data['size_bytes']) ? (int) $data['size_bytes'] : null,
            filetype: isset($data['filetype']) ? (string) $data['filetype'] : null,
            create_timestamp: isset($data['create_timestamp']) ? (int) $data['create_timestamp'] : null,
            created_timestamp: isset($data['created_timestamp']) ? (int) $data['created_timestamp'] : null,
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
        if ($this->listing_id !== null) {
            $data['listing_id'] = $this->listing_id;
        }
        if ($this->rank !== null) {
            $data['rank'] = $this->rank;
        }
        if ($this->filename !== null) {
            $data['filename'] = $this->filename;
        }
        if ($this->filesize !== null) {
            $data['filesize'] = $this->filesize;
        }
        if ($this->size_bytes !== null) {
            $data['size_bytes'] = $this->size_bytes;
        }
        if ($this->filetype !== null) {
            $data['filetype'] = $this->filetype;
        }
        if ($this->create_timestamp !== null) {
            $data['create_timestamp'] = $this->create_timestamp;
        }
        if ($this->created_timestamp !== null) {
            $data['created_timestamp'] = $this->created_timestamp;
        }

        return $data;
    }
}
