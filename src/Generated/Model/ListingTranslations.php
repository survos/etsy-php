<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Container for all current supported translations of a listing. Note that Etsy periodically adds/removes languages, so this list may change in the future.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ListingTranslations
{
    public function __construct(
        public ?ListingTranslation $de = null,
        public ?ListingTranslation $en_GB = null,
        public ?ListingTranslation $en_IN = null,
        public ?ListingTranslation $en_US = null,
        public ?ListingTranslation $es = null,
        public ?ListingTranslation $fr = null,
        public ?ListingTranslation $it = null,
        public ?ListingTranslation $ja = null,
        public ?ListingTranslation $nl = null,
        public ?ListingTranslation $pl = null,
        public ?ListingTranslation $pt = null,
        public ?ListingTranslation $ru = null,
        public ?ListingTranslation $sv = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            de: isset($data['de']) && is_array($data['de']) ? ListingTranslation::fromArray($data['de']) : null,
            en_GB: isset($data['en-GB']) && is_array($data['en-GB']) ? ListingTranslation::fromArray($data['en-GB']) : null,
            en_IN: isset($data['en-IN']) && is_array($data['en-IN']) ? ListingTranslation::fromArray($data['en-IN']) : null,
            en_US: isset($data['en-US']) && is_array($data['en-US']) ? ListingTranslation::fromArray($data['en-US']) : null,
            es: isset($data['es']) && is_array($data['es']) ? ListingTranslation::fromArray($data['es']) : null,
            fr: isset($data['fr']) && is_array($data['fr']) ? ListingTranslation::fromArray($data['fr']) : null,
            it: isset($data['it']) && is_array($data['it']) ? ListingTranslation::fromArray($data['it']) : null,
            ja: isset($data['ja']) && is_array($data['ja']) ? ListingTranslation::fromArray($data['ja']) : null,
            nl: isset($data['nl']) && is_array($data['nl']) ? ListingTranslation::fromArray($data['nl']) : null,
            pl: isset($data['pl']) && is_array($data['pl']) ? ListingTranslation::fromArray($data['pl']) : null,
            pt: isset($data['pt']) && is_array($data['pt']) ? ListingTranslation::fromArray($data['pt']) : null,
            ru: isset($data['ru']) && is_array($data['ru']) ? ListingTranslation::fromArray($data['ru']) : null,
            sv: isset($data['sv']) && is_array($data['sv']) ? ListingTranslation::fromArray($data['sv']) : null,
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
        if ($this->de !== null) {
            $data['de'] = $this->de->toArray();
        }
        if ($this->en_GB !== null) {
            $data['en-GB'] = $this->en_GB->toArray();
        }
        if ($this->en_IN !== null) {
            $data['en-IN'] = $this->en_IN->toArray();
        }
        if ($this->en_US !== null) {
            $data['en-US'] = $this->en_US->toArray();
        }
        if ($this->es !== null) {
            $data['es'] = $this->es->toArray();
        }
        if ($this->fr !== null) {
            $data['fr'] = $this->fr->toArray();
        }
        if ($this->it !== null) {
            $data['it'] = $this->it->toArray();
        }
        if ($this->ja !== null) {
            $data['ja'] = $this->ja->toArray();
        }
        if ($this->nl !== null) {
            $data['nl'] = $this->nl->toArray();
        }
        if ($this->pl !== null) {
            $data['pl'] = $this->pl->toArray();
        }
        if ($this->pt !== null) {
            $data['pt'] = $this->pt->toArray();
        }
        if ($this->ru !== null) {
            $data['ru'] = $this->ru->toArray();
        }
        if ($this->sv !== null) {
            $data['sv'] = $this->sv->toArray();
        }

        return $data;
    }
}
