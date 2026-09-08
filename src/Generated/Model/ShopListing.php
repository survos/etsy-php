<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A listing from a shop, which contains a product quantity, title, description, price, etc.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class ShopListing
{
    /**
     * @param int|null $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int|null $user_id The numeric ID for the [user](/documentation/reference#tag/User) posting the listing.
     * @param int|null $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param string|null $title The listing's title string. When creating or updating a listing, valid title strings contain only letters, numbers, punctuation marks, mathematical symbols, whitespace characters, ™, ©, and ®. (regex: /[^\p{L}\p{Nd}\p{P}...
     * @param string|null $description A description string of the product for sale in the listing.
     * @param string|null $rich_description The seller-authored HTML rich-text description of the product when the listing uses rich text; null for plain-text listings. The plain-text `description` field is always populated. This value is HTML and consumers MUST s...
     * @param string|null $state When _updating_ a listing, this value can be either `active` or `inactive`. Note: Setting a `draft` listing to `active` will also publish the listing on etsy.com and requires that the listing have an image set. Setting a... One of: active, inactive, sold_out, draft, expired.
     * @param int|null $creation_timestamp The listing's creation time, in epoch seconds.
     * @param int|null $created_timestamp The listing's creation time, in epoch seconds.
     * @param int|null $ending_timestamp The listing's expiration time, in epoch seconds.
     * @param int|null $original_creation_timestamp The listing's creation time, in epoch seconds.
     * @param int|null $last_modified_timestamp The time of the last update to the listing, in epoch seconds.
     * @param int|null $updated_timestamp The time of the last update to the listing, in epoch seconds.
     * @param int|null $state_timestamp The date and time of the last state change of this listing.
     * @param int|null $quantity The positive non-zero number of products available for purchase in the listing. Note: The listing quantity is the sum of available offering quantities. You can request the quantities for individual offerings from the Lis...
     * @param int|null $shop_section_id The numeric ID of a section in a specific Etsy shop.
     * @param int|null $featured_rank The positive non-zero numeric position in the featured listings of the shop, with rank 1 listings appearing in the left-most position in featured listing on a shop's home page.
     * @param string|null $url The full URL to the listing's page on Etsy.
     * @param int|null $num_favorers The number of users who marked this Listing a favorite.
     * @param bool|null $non_taxable When true, applicable [shop](/documentation/reference#tag/Shop) tax rates do not apply to this listing at checkout.
     * @param bool|null $is_taxable When true, applicable [shop](/documentation/reference#tag/Shop) tax rates apply to this listing at checkout.
     * @param bool|null $is_customizable When true, a buyer may contact the seller for a customized order. The default value is true when a shop accepts custom orders. Does not apply to shops that do not accept custom orders.
     * @param bool|null $is_personalizable When true, this listing is personalizable. The default value is false.
     * @param string|null $listing_type An enumerated type string that indicates whether the listing is physical or a digital download. One of: physical, download, both.
     * @param list<string>|null $tags A comma-separated list of tag strings for the listing. When creating or updating a listing, valid tag strings contain only letters, numbers, whitespace characters, -, ', ™, ©, and ®. (regex: /[^\p{L}\p{Nd}\p{Zs}\-'™©®]/u...
     * @param list<string>|null $materials A list of material strings for materials used in the product. Valid materials strings contain only letters, numbers, and whitespace characters. (regex: /[^\p{L}\p{Nd}\p{Zs}]/u) Default value is null.
     * @param int|null $shipping_profile_id The numeric ID of the [shipping profile](/documentation/reference#operation/getShopShippingProfile) associated with the listing. Required when listing type is `physical`.
     * @param int|null $return_policy_id The numeric ID of the [Return Policy](/documentation/reference#operation/getShopReturnPolicies).
     * @param int|null $processing_min The minimum number of days required to process this listing. Default value is null.
     * @param int|null $processing_max The maximum number of days required to process this listing. Default value is null.
     * @param string|null $who_made An enumerated string indicating who made the product. Helps buyers locate the listing under the Handmade heading. Requires 'is_supply' and 'when_made'. One of: i_did, someone_else, collective.
     * @param string|null $when_made An enumerated string for the era in which the maker made the product in this listing. Helps buyers locate the listing under the Vintage heading. Requires 'is_supply' and 'who_made'. One of: made_to_order, 2020_2026, 2010_2019, 2007_2009, before_2007, 2000_2006, 1990s, 1980s, 1970s, 1960s, 1950s, 1940s, 1930s, 1920s, 1910s, 1900s, 1800s, 1700s, before_1700.
     * @param bool|null $is_supply When true, tags the listing as a supply product, else indicates that it's a finished product. Helps buyers locate the listing under the Supplies heading. Requires 'who_made' and 'when_made'.
     * @param float|null $item_weight The numeric weight of the product measured in units set in 'item_weight_unit'. Default value is null. If set, the value must be greater than 0.
     * @param string|null $item_weight_unit A string defining the units used to measure the weight of the product. Default value is null. One of: oz, lb, g, kg.
     * @param float|null $item_length The numeric length of the product measured in units set in 'item_dimensions_unit'. Default value is null. If set, the value must be greater than 0.
     * @param float|null $item_width The numeric width of the product measured in units set in 'item_dimensions_unit'. Default value is null. If set, the value must be greater than 0.
     * @param float|null $item_height The numeric length of the product measured in units set in 'item_dimensions_unit'. Default value is null. If set, the value must be greater than 0.
     * @param string|null $item_dimensions_unit A string defining the units used to measure the dimensions of the product. Default value is null. One of: in, ft, mm, cm, m, yd, inches.
     * @param bool|null $is_private When true, this is a private listing intended for a specific buyer and hidden from shop view.
     * @param list<string>|null $style An array of style strings for this listing, each of which is free-form text string such as "Formal", or "Steampunk". When creating or updating a listing, the listing may have up to two styles. Valid style strings contain...
     * @param string|null $file_data A string describing the files attached to a digital listing.
     * @param bool|null $has_variations When true, the listing has variations.
     * @param bool|null $should_auto_renew When true, renews a listing for four months upon expiration.
     * @param string|null $language The IETF language tag for the default language of the listing. Ex: `de`, `en`, `es`, `fr`, `it`, `ja`, `nl`, `pl`, `pt`, `ru`.
     * @param Money|null $price The positive non-zero price of the product. (Sold product listings are private) Note: The price is the minimum possible price. The [`getListingInventory`](/documentation/reference/#operation/getListingInventory) method r...
     * @param Money|null $converted_price The listing price converted to the currency requested via the currency parameter. Only present when the currency parameter is provided. Null if the conversion rate is unavailable.
     * @param int|null $taxonomy_id The numerical taxonomy ID of the listing. See [SellerTaxonomy](/documentation/reference#tag/SellerTaxonomy) and [BuyerTaxonomy](/documentation/reference#tag/BuyerTaxonomy) for more information.
     * @param int|null $readiness_state_id The numeric ID of the [processing profile](/documentation/reference#operation/getShopReadinessStateDefinition) associated with the listing. Returned only when the listing is `active` and of type `physical`, and the endpo...
     * @param string|null $suggested_title A title string suggested by Etsy. Only available for a user's own listings, when allow_suggested_title param is present, and when a shop's language setting is English. Not all listings will have suggestions.
     */
    public function __construct(
        public ?int $listing_id = null,
        public ?int $user_id = null,
        public ?int $shop_id = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?string $rich_description = null,
        public ?string $state = null,
        public ?int $creation_timestamp = null,
        public ?int $created_timestamp = null,
        public ?int $ending_timestamp = null,
        public ?int $original_creation_timestamp = null,
        public ?int $last_modified_timestamp = null,
        public ?int $updated_timestamp = null,
        public ?int $state_timestamp = null,
        public ?int $quantity = null,
        public ?int $shop_section_id = null,
        public ?int $featured_rank = null,
        public ?string $url = null,
        public ?int $num_favorers = null,
        public ?bool $non_taxable = null,
        public ?bool $is_taxable = null,
        public ?bool $is_customizable = null,
        public ?bool $is_personalizable = null,
        public ?string $listing_type = null,
        public ?array $tags = null,
        public ?array $materials = null,
        public ?int $shipping_profile_id = null,
        public ?int $return_policy_id = null,
        public ?int $processing_min = null,
        public ?int $processing_max = null,
        public ?string $who_made = null,
        public ?string $when_made = null,
        public ?bool $is_supply = null,
        public ?float $item_weight = null,
        public ?string $item_weight_unit = null,
        public ?float $item_length = null,
        public ?float $item_width = null,
        public ?float $item_height = null,
        public ?string $item_dimensions_unit = null,
        public ?bool $is_private = null,
        public ?array $style = null,
        public ?string $file_data = null,
        public ?bool $has_variations = null,
        public ?bool $should_auto_renew = null,
        public ?string $language = null,
        public ?Money $price = null,
        public ?Money $converted_price = null,
        public ?int $taxonomy_id = null,
        public ?int $readiness_state_id = null,
        public ?string $suggested_title = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            listing_id: isset($data['listing_id']) ? (int) $data['listing_id'] : null,
            user_id: isset($data['user_id']) ? (int) $data['user_id'] : null,
            shop_id: isset($data['shop_id']) ? (int) $data['shop_id'] : null,
            title: isset($data['title']) ? (string) $data['title'] : null,
            description: isset($data['description']) ? (string) $data['description'] : null,
            rich_description: isset($data['rich_description']) ? (string) $data['rich_description'] : null,
            state: isset($data['state']) ? (string) $data['state'] : null,
            creation_timestamp: isset($data['creation_timestamp']) ? (int) $data['creation_timestamp'] : null,
            created_timestamp: isset($data['created_timestamp']) ? (int) $data['created_timestamp'] : null,
            ending_timestamp: isset($data['ending_timestamp']) ? (int) $data['ending_timestamp'] : null,
            original_creation_timestamp: isset($data['original_creation_timestamp']) ? (int) $data['original_creation_timestamp'] : null,
            last_modified_timestamp: isset($data['last_modified_timestamp']) ? (int) $data['last_modified_timestamp'] : null,
            updated_timestamp: isset($data['updated_timestamp']) ? (int) $data['updated_timestamp'] : null,
            state_timestamp: isset($data['state_timestamp']) ? (int) $data['state_timestamp'] : null,
            quantity: isset($data['quantity']) ? (int) $data['quantity'] : null,
            shop_section_id: isset($data['shop_section_id']) ? (int) $data['shop_section_id'] : null,
            featured_rank: isset($data['featured_rank']) ? (int) $data['featured_rank'] : null,
            url: isset($data['url']) ? (string) $data['url'] : null,
            num_favorers: isset($data['num_favorers']) ? (int) $data['num_favorers'] : null,
            non_taxable: isset($data['non_taxable']) ? (bool) $data['non_taxable'] : null,
            is_taxable: isset($data['is_taxable']) ? (bool) $data['is_taxable'] : null,
            is_customizable: isset($data['is_customizable']) ? (bool) $data['is_customizable'] : null,
            is_personalizable: isset($data['is_personalizable']) ? (bool) $data['is_personalizable'] : null,
            listing_type: isset($data['listing_type']) ? (string) $data['listing_type'] : null,
            tags: isset($data['tags']) ? (array) $data['tags'] : null,
            materials: isset($data['materials']) ? (array) $data['materials'] : null,
            shipping_profile_id: isset($data['shipping_profile_id']) ? (int) $data['shipping_profile_id'] : null,
            return_policy_id: isset($data['return_policy_id']) ? (int) $data['return_policy_id'] : null,
            processing_min: isset($data['processing_min']) ? (int) $data['processing_min'] : null,
            processing_max: isset($data['processing_max']) ? (int) $data['processing_max'] : null,
            who_made: isset($data['who_made']) ? (string) $data['who_made'] : null,
            when_made: isset($data['when_made']) ? (string) $data['when_made'] : null,
            is_supply: isset($data['is_supply']) ? (bool) $data['is_supply'] : null,
            item_weight: isset($data['item_weight']) ? (float) $data['item_weight'] : null,
            item_weight_unit: isset($data['item_weight_unit']) ? (string) $data['item_weight_unit'] : null,
            item_length: isset($data['item_length']) ? (float) $data['item_length'] : null,
            item_width: isset($data['item_width']) ? (float) $data['item_width'] : null,
            item_height: isset($data['item_height']) ? (float) $data['item_height'] : null,
            item_dimensions_unit: isset($data['item_dimensions_unit']) ? (string) $data['item_dimensions_unit'] : null,
            is_private: isset($data['is_private']) ? (bool) $data['is_private'] : null,
            style: isset($data['style']) ? (array) $data['style'] : null,
            file_data: isset($data['file_data']) ? (string) $data['file_data'] : null,
            has_variations: isset($data['has_variations']) ? (bool) $data['has_variations'] : null,
            should_auto_renew: isset($data['should_auto_renew']) ? (bool) $data['should_auto_renew'] : null,
            language: isset($data['language']) ? (string) $data['language'] : null,
            price: isset($data['price']) && is_array($data['price']) ? Money::fromArray($data['price']) : null,
            converted_price: isset($data['converted_price']) && is_array($data['converted_price']) ? Money::fromArray($data['converted_price']) : null,
            taxonomy_id: isset($data['taxonomy_id']) ? (int) $data['taxonomy_id'] : null,
            readiness_state_id: isset($data['readiness_state_id']) ? (int) $data['readiness_state_id'] : null,
            suggested_title: isset($data['suggested_title']) ? (string) $data['suggested_title'] : null,
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
        if ($this->listing_id !== null) {
            $data['listing_id'] = $this->listing_id;
        }
        if ($this->user_id !== null) {
            $data['user_id'] = $this->user_id;
        }
        if ($this->shop_id !== null) {
            $data['shop_id'] = $this->shop_id;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->rich_description !== null) {
            $data['rich_description'] = $this->rich_description;
        }
        if ($this->state !== null) {
            $data['state'] = $this->state;
        }
        if ($this->creation_timestamp !== null) {
            $data['creation_timestamp'] = $this->creation_timestamp;
        }
        if ($this->created_timestamp !== null) {
            $data['created_timestamp'] = $this->created_timestamp;
        }
        if ($this->ending_timestamp !== null) {
            $data['ending_timestamp'] = $this->ending_timestamp;
        }
        if ($this->original_creation_timestamp !== null) {
            $data['original_creation_timestamp'] = $this->original_creation_timestamp;
        }
        if ($this->last_modified_timestamp !== null) {
            $data['last_modified_timestamp'] = $this->last_modified_timestamp;
        }
        if ($this->updated_timestamp !== null) {
            $data['updated_timestamp'] = $this->updated_timestamp;
        }
        if ($this->state_timestamp !== null) {
            $data['state_timestamp'] = $this->state_timestamp;
        }
        if ($this->quantity !== null) {
            $data['quantity'] = $this->quantity;
        }
        if ($this->shop_section_id !== null) {
            $data['shop_section_id'] = $this->shop_section_id;
        }
        if ($this->featured_rank !== null) {
            $data['featured_rank'] = $this->featured_rank;
        }
        if ($this->url !== null) {
            $data['url'] = $this->url;
        }
        if ($this->num_favorers !== null) {
            $data['num_favorers'] = $this->num_favorers;
        }
        if ($this->non_taxable !== null) {
            $data['non_taxable'] = $this->non_taxable;
        }
        if ($this->is_taxable !== null) {
            $data['is_taxable'] = $this->is_taxable;
        }
        if ($this->is_customizable !== null) {
            $data['is_customizable'] = $this->is_customizable;
        }
        if ($this->is_personalizable !== null) {
            $data['is_personalizable'] = $this->is_personalizable;
        }
        if ($this->listing_type !== null) {
            $data['listing_type'] = $this->listing_type;
        }
        if ($this->tags !== null) {
            $data['tags'] = $this->tags;
        }
        if ($this->materials !== null) {
            $data['materials'] = $this->materials;
        }
        if ($this->shipping_profile_id !== null) {
            $data['shipping_profile_id'] = $this->shipping_profile_id;
        }
        if ($this->return_policy_id !== null) {
            $data['return_policy_id'] = $this->return_policy_id;
        }
        if ($this->processing_min !== null) {
            $data['processing_min'] = $this->processing_min;
        }
        if ($this->processing_max !== null) {
            $data['processing_max'] = $this->processing_max;
        }
        if ($this->who_made !== null) {
            $data['who_made'] = $this->who_made;
        }
        if ($this->when_made !== null) {
            $data['when_made'] = $this->when_made;
        }
        if ($this->is_supply !== null) {
            $data['is_supply'] = $this->is_supply;
        }
        if ($this->item_weight !== null) {
            $data['item_weight'] = $this->item_weight;
        }
        if ($this->item_weight_unit !== null) {
            $data['item_weight_unit'] = $this->item_weight_unit;
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
        if ($this->item_dimensions_unit !== null) {
            $data['item_dimensions_unit'] = $this->item_dimensions_unit;
        }
        if ($this->is_private !== null) {
            $data['is_private'] = $this->is_private;
        }
        if ($this->style !== null) {
            $data['style'] = $this->style;
        }
        if ($this->file_data !== null) {
            $data['file_data'] = $this->file_data;
        }
        if ($this->has_variations !== null) {
            $data['has_variations'] = $this->has_variations;
        }
        if ($this->should_auto_renew !== null) {
            $data['should_auto_renew'] = $this->should_auto_renew;
        }
        if ($this->language !== null) {
            $data['language'] = $this->language;
        }
        if ($this->price !== null) {
            $data['price'] = $this->price->toArray();
        }
        if ($this->converted_price !== null) {
            $data['converted_price'] = $this->converted_price->toArray();
        }
        if ($this->taxonomy_id !== null) {
            $data['taxonomy_id'] = $this->taxonomy_id;
        }
        if ($this->readiness_state_id !== null) {
            $data['readiness_state_id'] = $this->readiness_state_id;
        }
        if ($this->suggested_title !== null) {
            $data['suggested_title'] = $this->suggested_title;
        }

        return $data;
    }
}
