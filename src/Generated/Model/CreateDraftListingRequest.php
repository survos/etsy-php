<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 *
 * Etsy declares these REQUIRED when creating or updating: quantity, title, description, price, who_made, when_made, taxonomy_id.
 * They are still nullable here -- a response model has to survive a field
 * Etsy stops sending -- so the requirement is documented, not enforced by the
 * constructor. Validate before sending, not after parsing.
 */
final readonly class CreateDraftListingRequest
{
    /**
     * @param int|null $quantity The positive non-zero number of products available for purchase in the listing. Note: The listing quantity is the sum of available offering quantities. You can request the quantities for individual offerings from the Lis...
     * @param string|null $title The listing's title string. When creating or updating a listing, valid title strings contain only letters, numbers, punctuation marks, mathematical symbols, whitespace characters, ™, ©, and ®. (regex: /[^\p{L}\p{Nd}\p{P}...
     * @param string|null $description A description string of the product for sale in the listing.
     * @param float|null $price The positive non-zero price of the product. (Sold product listings are private) Note: The price is the minimum possible price. The [`getListingInventory`](/documentation/reference/#operation/getListingInventory) method r...
     * @param string|null $who_made An enumerated string indicating who made the product. Helps buyers locate the listing under the Handmade heading. Requires 'is_supply' and 'when_made'. One of: i_did, someone_else, collective.
     * @param string|null $when_made An enumerated string for the era in which the maker made the product in this listing. Helps buyers locate the listing under the Vintage heading. Requires 'is_supply' and 'who_made'. One of: made_to_order, 2020_2026, 2010_2019, 2007_2009, before_2007, 2000_2006, 1990s, 1980s, 1970s, 1960s, 1950s, 1940s, 1930s, 1920s, 1910s, 1900s, 1800s, 1700s, before_1700.
     * @param int|null $taxonomy_id The numerical taxonomy ID of the listing. See [SellerTaxonomy](/documentation/reference#tag/SellerTaxonomy) and [BuyerTaxonomy](/documentation/reference#tag/BuyerTaxonomy) for more information.
     * @param int|null $shipping_profile_id The numeric ID of the [shipping profile](/documentation/reference#operation/getShopShippingProfile) associated with the listing. Required when listing type is `physical`.
     * @param int|null $return_policy_id The numeric ID of the [Return Policy](/documentation/reference#operation/getShopReturnPolicies).
     * @param list<string>|null $materials A list of material strings for materials used in the product. Valid materials strings contain only letters, numbers, and whitespace characters. (regex: /[^\p{L}\p{Nd}\p{Zs}]/u) Default value is null.
     * @param int|null $shop_section_id The numeric ID of the [shop section](/documentation/reference#tag/Shop-Section) for this listing. Default value is null.
     * @param int|null $processing_min The minimum number of days required to process this listing. Default value is null.
     * @param int|null $processing_max The maximum number of days required to process this listing. Default value is null.
     * @param int|null $readiness_state_id The numeric ID of the [processing profile](/documentation/reference#operation/getShopReadinessStateDefinition) associated with the listing. Returned only when the listing is `active` and of type `physical`, and the endpo...
     * @param list<string>|null $tags A comma-separated list of tag strings for the listing. When creating or updating a listing, valid tag strings contain only letters, numbers, whitespace characters, -, ', ™, ©, and ®. (regex: /[^\p{L}\p{Nd}\p{Zs}\-'™©®]/u...
     * @param list<string>|null $styles An array of style strings for this listing, each of which is free-form text string such as "Formal", or "Steampunk". When creating or updating a listing, the listing may have up to two styles. Valid style strings contain...
     * @param float|null $item_weight The numeric weight of the product measured in units set in 'item_weight_unit'. Default value is null. If set, the value must be greater than 0.
     * @param float|null $item_length The numeric length of the product measured in units set in 'item_dimensions_unit'. Default value is null. If set, the value must be greater than 0.
     * @param float|null $item_width The numeric width of the product measured in units set in 'item_dimensions_unit'. Default value is null. If set, the value must be greater than 0.
     * @param float|null $item_height The numeric height of the product measured in units set in 'item_dimensions_unit'. Default value is null. If set, the value must be greater than 0.
     * @param string|null $item_weight_unit A string defining the units used to measure the weight of the product. Default value is null. One of: oz, lb, g, kg.
     * @param string|null $item_dimensions_unit A string defining the units used to measure the dimensions of the product. Default value is null. One of: in, ft, mm, cm, m, yd, inches.
     * @param list<int>|null $production_partner_ids An array of unique IDs of production partner ids.
     * @param list<int>|null $image_ids An array of numeric image IDs of the images in a listing, which can include up to 20 images.
     * @param bool|null $is_supply When true, tags the listing as a supply product, else indicates that it's a finished product. Helps buyers locate the listing under the Supplies heading. Requires 'who_made' and 'when_made'.
     * @param bool|null $is_customizable When true, a buyer may contact the seller for a customized order. The default value is true when a shop accepts custom orders. Does not apply to shops that do not accept custom orders.
     * @param bool|null $should_auto_renew When true, renews a listing for four months upon expiration.
     * @param bool|null $is_taxable When true, applicable [shop](/documentation/reference#tag/Shop) tax rates apply to this listing at checkout.
     * @param string|null $type An enumerated type string that indicates whether the listing is physical or a digital download. One of: physical, download, both.
     */
    public function __construct(
        public ?int $quantity = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?float $price = null,
        public ?string $who_made = null,
        public ?string $when_made = null,
        public ?int $taxonomy_id = null,
        public ?int $shipping_profile_id = null,
        public ?int $return_policy_id = null,
        public ?array $materials = null,
        public ?int $shop_section_id = null,
        public ?int $processing_min = null,
        public ?int $processing_max = null,
        public ?int $readiness_state_id = null,
        public ?array $tags = null,
        public ?array $styles = null,
        public ?float $item_weight = null,
        public ?float $item_length = null,
        public ?float $item_width = null,
        public ?float $item_height = null,
        public ?string $item_weight_unit = null,
        public ?string $item_dimensions_unit = null,
        public ?array $production_partner_ids = null,
        public ?array $image_ids = null,
        public ?bool $is_supply = null,
        public ?bool $is_customizable = null,
        public ?bool $should_auto_renew = null,
        public ?bool $is_taxable = null,
        public ?string $type = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            quantity: isset($data['quantity']) ? (int) $data['quantity'] : null,
            title: isset($data['title']) ? (string) $data['title'] : null,
            description: isset($data['description']) ? (string) $data['description'] : null,
            price: isset($data['price']) ? (float) $data['price'] : null,
            who_made: isset($data['who_made']) ? (string) $data['who_made'] : null,
            when_made: isset($data['when_made']) ? (string) $data['when_made'] : null,
            taxonomy_id: isset($data['taxonomy_id']) ? (int) $data['taxonomy_id'] : null,
            shipping_profile_id: isset($data['shipping_profile_id']) ? (int) $data['shipping_profile_id'] : null,
            return_policy_id: isset($data['return_policy_id']) ? (int) $data['return_policy_id'] : null,
            materials: isset($data['materials']) ? (array) $data['materials'] : null,
            shop_section_id: isset($data['shop_section_id']) ? (int) $data['shop_section_id'] : null,
            processing_min: isset($data['processing_min']) ? (int) $data['processing_min'] : null,
            processing_max: isset($data['processing_max']) ? (int) $data['processing_max'] : null,
            readiness_state_id: isset($data['readiness_state_id']) ? (int) $data['readiness_state_id'] : null,
            tags: isset($data['tags']) ? (array) $data['tags'] : null,
            styles: isset($data['styles']) ? (array) $data['styles'] : null,
            item_weight: isset($data['item_weight']) ? (float) $data['item_weight'] : null,
            item_length: isset($data['item_length']) ? (float) $data['item_length'] : null,
            item_width: isset($data['item_width']) ? (float) $data['item_width'] : null,
            item_height: isset($data['item_height']) ? (float) $data['item_height'] : null,
            item_weight_unit: isset($data['item_weight_unit']) ? (string) $data['item_weight_unit'] : null,
            item_dimensions_unit: isset($data['item_dimensions_unit']) ? (string) $data['item_dimensions_unit'] : null,
            production_partner_ids: isset($data['production_partner_ids']) ? (array) $data['production_partner_ids'] : null,
            image_ids: isset($data['image_ids']) ? (array) $data['image_ids'] : null,
            is_supply: isset($data['is_supply']) ? (bool) $data['is_supply'] : null,
            is_customizable: isset($data['is_customizable']) ? (bool) $data['is_customizable'] : null,
            should_auto_renew: isset($data['should_auto_renew']) ? (bool) $data['should_auto_renew'] : null,
            is_taxable: isset($data['is_taxable']) ? (bool) $data['is_taxable'] : null,
            type: isset($data['type']) ? (string) $data['type'] : null,
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
        if ($this->quantity !== null) {
            $data['quantity'] = $this->quantity;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->price !== null) {
            $data['price'] = $this->price;
        }
        if ($this->who_made !== null) {
            $data['who_made'] = $this->who_made;
        }
        if ($this->when_made !== null) {
            $data['when_made'] = $this->when_made;
        }
        if ($this->taxonomy_id !== null) {
            $data['taxonomy_id'] = $this->taxonomy_id;
        }
        if ($this->shipping_profile_id !== null) {
            $data['shipping_profile_id'] = $this->shipping_profile_id;
        }
        if ($this->return_policy_id !== null) {
            $data['return_policy_id'] = $this->return_policy_id;
        }
        if ($this->materials !== null) {
            $data['materials'] = $this->materials;
        }
        if ($this->shop_section_id !== null) {
            $data['shop_section_id'] = $this->shop_section_id;
        }
        if ($this->processing_min !== null) {
            $data['processing_min'] = $this->processing_min;
        }
        if ($this->processing_max !== null) {
            $data['processing_max'] = $this->processing_max;
        }
        if ($this->readiness_state_id !== null) {
            $data['readiness_state_id'] = $this->readiness_state_id;
        }
        if ($this->tags !== null) {
            $data['tags'] = $this->tags;
        }
        if ($this->styles !== null) {
            $data['styles'] = $this->styles;
        }
        if ($this->item_weight !== null) {
            $data['item_weight'] = $this->item_weight;
        }
        if ($this->item_length !== null) {
            $data['item_length'] = $this->item_length;
        }
        if ($this->item_width !== null) {
            $data['item_width'] = $this->item_width;
        }
        if ($this->item_height !== null) {
            $data['item_height'] = $this->item_height;
        }
        if ($this->item_weight_unit !== null) {
            $data['item_weight_unit'] = $this->item_weight_unit;
        }
        if ($this->item_dimensions_unit !== null) {
            $data['item_dimensions_unit'] = $this->item_dimensions_unit;
        }
        if ($this->production_partner_ids !== null) {
            $data['production_partner_ids'] = $this->production_partner_ids;
        }
        if ($this->image_ids !== null) {
            $data['image_ids'] = $this->image_ids;
        }
        if ($this->is_supply !== null) {
            $data['is_supply'] = $this->is_supply;
        }
        if ($this->is_customizable !== null) {
            $data['is_customizable'] = $this->is_customizable;
        }
        if ($this->should_auto_renew !== null) {
            $data['should_auto_renew'] = $this->should_auto_renew;
        }
        if ($this->is_taxable !== null) {
            $data['is_taxable'] = $this->is_taxable;
        }
        if ($this->type !== null) {
            $data['type'] = $this->type;
        }

        return $data;
    }
}
