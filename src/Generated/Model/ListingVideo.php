<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Reference urls and metadata for a video associated with a specific listing.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ListingVideo
{
    /**
     * @param int|null $video_id The unique ID of a video associated with a listing.
     * @param int|null $height The video height dimension in pixels.
     * @param int|null $width The video width dimension in pixels.
     * @param string|null $thumbnail_url The url of the video thumbnail.
     * @param string|null $video_url The url of the video file.
     * @param string|null $video_state The current state of a given video. Value is one of `active`, `inactive`, `deleted` or `flagged`. One of: active, inactive, deleted, flagged.
     */
    public function __construct(
        public ?int $video_id = null,
        public ?int $height = null,
        public ?int $width = null,
        public ?string $thumbnail_url = null,
        public ?string $video_url = null,
        public ?string $video_state = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            video_id: isset($data['video_id']) ? (int) $data['video_id'] : null,
            height: isset($data['height']) ? (int) $data['height'] : null,
            width: isset($data['width']) ? (int) $data['width'] : null,
            thumbnail_url: isset($data['thumbnail_url']) ? (string) $data['thumbnail_url'] : null,
            video_url: isset($data['video_url']) ? (string) $data['video_url'] : null,
            video_state: isset($data['video_state']) ? (string) $data['video_state'] : null,
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
        if ($this->height !== null) {
            $data['height'] = $this->height;
        }
        if ($this->width !== null) {
            $data['width'] = $this->width;
        }
        if ($this->thumbnail_url !== null) {
            $data['thumbnail_url'] = $this->thumbnail_url;
        }
        if ($this->video_url !== null) {
            $data['video_url'] = $this->video_url;
        }
        if ($this->video_state !== null) {
            $data['video_state'] = $this->video_state;
        }

        return $data;
    }
}
