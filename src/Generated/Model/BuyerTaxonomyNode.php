<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A taxonomy node in the buyer taxonomy tree.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class BuyerTaxonomyNode
{
    /**
     * @param int|null $id The unique numeric ID of an Etsy taxonomy node, which is a metadata category for listings organized into the seller taxonomy hierarchy tree. For example, the "shoes" taxonomy node (ID: 1429, level: 1) is higher in the hi...
     * @param int|null $level The integer depth of this taxonomy node in the seller taxonomy tree, with roots at level 0.
     * @param string|null $name The name string for this taxonomy node.
     * @param int|null $parent_id The numeric taxonomy ID of the parent of this node.
     * @param list<BuyerTaxonomyNode>|null $children An array of taxonomy nodes for all the direct children of this taxonomy node in the seller taxonomy tree.
     * @param list<int>|null $full_path_taxonomy_ids An array of `taxonomy_id`s including this node and all of its direct parents in the seller taxonomy tree up to a root node. They are listed in order from root to leaf.
     */
    public function __construct(
        public ?int $id = null,
        public ?int $level = null,
        public ?string $name = null,
        public ?int $parent_id = null,
        public ?array $children = null,
        public ?array $full_path_taxonomy_ids = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: isset($data['id']) ? (int) $data['id'] : null,
            level: isset($data['level']) ? (int) $data['level'] : null,
            name: isset($data['name']) ? (string) $data['name'] : null,
            parent_id: isset($data['parent_id']) ? (int) $data['parent_id'] : null,
            children: isset($data['children']) && is_array($data['children'])
                ? array_values(array_map(static fn (array $i): BuyerTaxonomyNode => BuyerTaxonomyNode::fromArray($i), $data['children']))
                : null,
            full_path_taxonomy_ids: isset($data['full_path_taxonomy_ids']) ? (array) $data['full_path_taxonomy_ids'] : null,
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
        if ($this->id !== null) {
            $data['id'] = $this->id;
        }
        if ($this->level !== null) {
            $data['level'] = $this->level;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->parent_id !== null) {
            $data['parent_id'] = $this->parent_id;
        }
        if ($this->children !== null) {
            $data['children'] = array_map(static fn (BuyerTaxonomyNode $i): array => $i->toArray(), $this->children);
        }
        if ($this->full_path_taxonomy_ids !== null) {
            $data['full_path_taxonomy_ids'] = $this->full_path_taxonomy_ids;
        }

        return $data;
    }
}
