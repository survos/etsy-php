<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class UploadListingVideoRequest
{
    /**
     * @param int|null $video_id The unique ID of a video associated with a listing.
     * @param string|null $video A video file to upload.
     * @param string|null $name The file name string for the video to upload.
     */
    public function __construct(
        public ?int $video_id = null,
        public ?string $video = null,
        public ?string $name = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            video_id: isset($data['video_id']) ? (int) $data['video_id'] : null,
            video: isset($data['video']) ? (string) $data['video'] : null,
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
        if ($this->video_id !== null) {
            $data['video_id'] = $this->video_id;
        }
        if ($this->video !== null) {
            $data['video'] = $this->video;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }

        return $data;
    }
}
