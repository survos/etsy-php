<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated\Model;

/**
 * A shop created by an Etsy user.
 *
 * Generated from the Etsy Open API v3 OpenAPI contract. Do not edit.
 */
final readonly class Shop
{
    /**
     * @param int|null $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int|null $user_id The numeric user ID of the [user](/documentation/reference#tag/User) who owns this shop.
     * @param string|null $shop_name The shop's name string.
     * @param int|null $create_date The date and time this shop was created, in epoch seconds.
     * @param int|null $created_timestamp The date and time this shop was created, in epoch seconds.
     * @param string|null $title A brief heading string for the shop's main page.
     * @param string|null $announcement An announcement string to buyers that displays on the shop's homepage.
     * @param string|null $currency_code The ISO (alphabetic) code for the shop's currency. The shop displays all prices in this currency by default.
     * @param bool|null $is_vacation When true, this shop is not accepting purchases.
     * @param string|null $vacation_message The shop's message string displayed when `is_vacation` is true.
     * @param string|null $sale_message A message string sent to users who complete a purchase from this shop.
     * @param string|null $digital_sale_message A message string sent to users who purchase a digital item from this shop.
     * @param int|null $update_date The date and time of the last update to the shop, in epoch seconds.
     * @param int|null $updated_timestamp The date and time of the last update to the shop, in epoch seconds.
     * @param int|null $listing_active_count The number of active listings in the shop.
     * @param int|null $digital_listing_count The number of digital listings in the shop.
     * @param string|null $login_name The shop owner's login name string.
     * @param bool|null $accepts_custom_requests When true, the shop accepts customization requests.
     * @param string|null $policy_welcome The shop's policy welcome string (may be blank).
     * @param string|null $policy_payment The shop's payment policy string (may be blank).
     * @param string|null $policy_shipping The shop's shipping policy string (may be blank).
     * @param string|null $policy_refunds The shop's refund policy string (may be blank).
     * @param string|null $policy_additional The shop's additional policies string (may be blank).
     * @param string|null $policy_seller_info The shop's seller information string (may be blank).
     * @param int|null $policy_update_date The date and time of the last update to the shop's policies, in epoch seconds.
     * @param bool|null $policy_has_private_receipt_info When true, EU receipts display private info.
     * @param bool|null $has_unstructured_policies When true, the shop displays additional unstructured policy fields.
     * @param string|null $policy_privacy The shop's privacy policy string (may be blank).
     * @param string|null $vacation_autoreply The shop's automatic reply string displayed in new conversations when `is_vacation` is true.
     * @param string|null $url The URL string for this shop.
     * @param string|null $image_url_760x100 The URL string for this shop's banner image.
     * @param int|null $num_favorers The number of users who marked this shop a favorite.
     * @param list<string>|null $languages A list of language strings for the shop's enrolled languages where the default shop language is the first element in the array.
     * @param string|null $icon_url_fullxfull The URL string for this shop's icon image.
     * @param bool|null $is_using_structured_policies When true, the shop accepted using structured policies.
     * @param bool|null $has_onboarded_structured_policies When true, the shop accepted OR declined after viewing structured policies onboarding.
     * @param bool|null $include_dispute_form_link When true, this shop's policies include a link to an EU online dispute form.
     * @param bool|null $is_direct_checkout_onboarded (**DEPRECATED: Replaced by _is_etsy_payments_onboarded_.) When true, the shop has onboarded onto Etsy Payments.
     * @param bool|null $is_etsy_payments_onboarded When true, the shop has onboarded onto Etsy Payments.
     * @param bool|null $is_calculated_eligible When true, the shop is eligible for calculated shipping profiles. (Only available in the US and Canada)
     * @param bool|null $is_opted_in_to_buyer_promise When true, the shop opted in to buyer promise.
     * @param bool|null $is_shop_us_based When true, the shop is based in the US.
     * @param int|null $transaction_sold_count The total number of sales ([transactions](/documentation/reference#tag/Shop-Receipt-Transactions)) for this shop.
     * @param string|null $shipping_from_country_iso The country ISO the shop is shipping from.
     * @param string|null $shop_location_country_iso The country ISO where the shop is located.
     * @param int|null $review_count Number of reviews of shop listings in the past year.
     * @param float|null $review_average Average rating based on reviews of shop listings in the past year.
     */
    public function __construct(
        public ?int $shop_id = null,
        public ?int $user_id = null,
        public ?string $shop_name = null,
        public ?int $create_date = null,
        public ?int $created_timestamp = null,
        public ?string $title = null,
        public ?string $announcement = null,
        public ?string $currency_code = null,
        public ?bool $is_vacation = null,
        public ?string $vacation_message = null,
        public ?string $sale_message = null,
        public ?string $digital_sale_message = null,
        public ?int $update_date = null,
        public ?int $updated_timestamp = null,
        public ?int $listing_active_count = null,
        public ?int $digital_listing_count = null,
        public ?string $login_name = null,
        public ?bool $accepts_custom_requests = null,
        public ?string $policy_welcome = null,
        public ?string $policy_payment = null,
        public ?string $policy_shipping = null,
        public ?string $policy_refunds = null,
        public ?string $policy_additional = null,
        public ?string $policy_seller_info = null,
        public ?int $policy_update_date = null,
        public ?bool $policy_has_private_receipt_info = null,
        public ?bool $has_unstructured_policies = null,
        public ?string $policy_privacy = null,
        public ?string $vacation_autoreply = null,
        public ?string $url = null,
        public ?string $image_url_760x100 = null,
        public ?int $num_favorers = null,
        public ?array $languages = null,
        public ?string $icon_url_fullxfull = null,
        public ?bool $is_using_structured_policies = null,
        public ?bool $has_onboarded_structured_policies = null,
        public ?bool $include_dispute_form_link = null,
        public ?bool $is_direct_checkout_onboarded = null,
        public ?bool $is_etsy_payments_onboarded = null,
        public ?bool $is_calculated_eligible = null,
        public ?bool $is_opted_in_to_buyer_promise = null,
        public ?bool $is_shop_us_based = null,
        public ?int $transaction_sold_count = null,
        public ?string $shipping_from_country_iso = null,
        public ?string $shop_location_country_iso = null,
        public ?int $review_count = null,
        public ?float $review_average = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            shop_id: isset($data['shop_id']) ? (int) $data['shop_id'] : null,
            user_id: isset($data['user_id']) ? (int) $data['user_id'] : null,
            shop_name: isset($data['shop_name']) ? (string) $data['shop_name'] : null,
            create_date: isset($data['create_date']) ? (int) $data['create_date'] : null,
            created_timestamp: isset($data['created_timestamp']) ? (int) $data['created_timestamp'] : null,
            title: isset($data['title']) ? (string) $data['title'] : null,
            announcement: isset($data['announcement']) ? (string) $data['announcement'] : null,
            currency_code: isset($data['currency_code']) ? (string) $data['currency_code'] : null,
            is_vacation: isset($data['is_vacation']) ? (bool) $data['is_vacation'] : null,
            vacation_message: isset($data['vacation_message']) ? (string) $data['vacation_message'] : null,
            sale_message: isset($data['sale_message']) ? (string) $data['sale_message'] : null,
            digital_sale_message: isset($data['digital_sale_message']) ? (string) $data['digital_sale_message'] : null,
            update_date: isset($data['update_date']) ? (int) $data['update_date'] : null,
            updated_timestamp: isset($data['updated_timestamp']) ? (int) $data['updated_timestamp'] : null,
            listing_active_count: isset($data['listing_active_count']) ? (int) $data['listing_active_count'] : null,
            digital_listing_count: isset($data['digital_listing_count']) ? (int) $data['digital_listing_count'] : null,
            login_name: isset($data['login_name']) ? (string) $data['login_name'] : null,
            accepts_custom_requests: isset($data['accepts_custom_requests']) ? (bool) $data['accepts_custom_requests'] : null,
            policy_welcome: isset($data['policy_welcome']) ? (string) $data['policy_welcome'] : null,
            policy_payment: isset($data['policy_payment']) ? (string) $data['policy_payment'] : null,
            policy_shipping: isset($data['policy_shipping']) ? (string) $data['policy_shipping'] : null,
            policy_refunds: isset($data['policy_refunds']) ? (string) $data['policy_refunds'] : null,
            policy_additional: isset($data['policy_additional']) ? (string) $data['policy_additional'] : null,
            policy_seller_info: isset($data['policy_seller_info']) ? (string) $data['policy_seller_info'] : null,
            policy_update_date: isset($data['policy_update_date']) ? (int) $data['policy_update_date'] : null,
            policy_has_private_receipt_info: isset($data['policy_has_private_receipt_info']) ? (bool) $data['policy_has_private_receipt_info'] : null,
            has_unstructured_policies: isset($data['has_unstructured_policies']) ? (bool) $data['has_unstructured_policies'] : null,
            policy_privacy: isset($data['policy_privacy']) ? (string) $data['policy_privacy'] : null,
            vacation_autoreply: isset($data['vacation_autoreply']) ? (string) $data['vacation_autoreply'] : null,
            url: isset($data['url']) ? (string) $data['url'] : null,
            image_url_760x100: isset($data['image_url_760x100']) ? (string) $data['image_url_760x100'] : null,
            num_favorers: isset($data['num_favorers']) ? (int) $data['num_favorers'] : null,
            languages: isset($data['languages']) ? (array) $data['languages'] : null,
            icon_url_fullxfull: isset($data['icon_url_fullxfull']) ? (string) $data['icon_url_fullxfull'] : null,
            is_using_structured_policies: isset($data['is_using_structured_policies']) ? (bool) $data['is_using_structured_policies'] : null,
            has_onboarded_structured_policies: isset($data['has_onboarded_structured_policies']) ? (bool) $data['has_onboarded_structured_policies'] : null,
            include_dispute_form_link: isset($data['include_dispute_form_link']) ? (bool) $data['include_dispute_form_link'] : null,
            is_direct_checkout_onboarded: isset($data['is_direct_checkout_onboarded']) ? (bool) $data['is_direct_checkout_onboarded'] : null,
            is_etsy_payments_onboarded: isset($data['is_etsy_payments_onboarded']) ? (bool) $data['is_etsy_payments_onboarded'] : null,
            is_calculated_eligible: isset($data['is_calculated_eligible']) ? (bool) $data['is_calculated_eligible'] : null,
            is_opted_in_to_buyer_promise: isset($data['is_opted_in_to_buyer_promise']) ? (bool) $data['is_opted_in_to_buyer_promise'] : null,
            is_shop_us_based: isset($data['is_shop_us_based']) ? (bool) $data['is_shop_us_based'] : null,
            transaction_sold_count: isset($data['transaction_sold_count']) ? (int) $data['transaction_sold_count'] : null,
            shipping_from_country_iso: isset($data['shipping_from_country_iso']) ? (string) $data['shipping_from_country_iso'] : null,
            shop_location_country_iso: isset($data['shop_location_country_iso']) ? (string) $data['shop_location_country_iso'] : null,
            review_count: isset($data['review_count']) ? (int) $data['review_count'] : null,
            review_average: isset($data['review_average']) ? (float) $data['review_average'] : null,
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
        if ($this->shop_id !== null) {
            $data['shop_id'] = $this->shop_id;
        }
        if ($this->user_id !== null) {
            $data['user_id'] = $this->user_id;
        }
        if ($this->shop_name !== null) {
            $data['shop_name'] = $this->shop_name;
        }
        if ($this->create_date !== null) {
            $data['create_date'] = $this->create_date;
        }
        if ($this->created_timestamp !== null) {
            $data['created_timestamp'] = $this->created_timestamp;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }
        if ($this->announcement !== null) {
            $data['announcement'] = $this->announcement;
        }
        if ($this->currency_code !== null) {
            $data['currency_code'] = $this->currency_code;
        }
        if ($this->is_vacation !== null) {
            $data['is_vacation'] = $this->is_vacation;
        }
        if ($this->vacation_message !== null) {
            $data['vacation_message'] = $this->vacation_message;
        }
        if ($this->sale_message !== null) {
            $data['sale_message'] = $this->sale_message;
        }
        if ($this->digital_sale_message !== null) {
            $data['digital_sale_message'] = $this->digital_sale_message;
        }
        if ($this->update_date !== null) {
            $data['update_date'] = $this->update_date;
        }
        if ($this->updated_timestamp !== null) {
            $data['updated_timestamp'] = $this->updated_timestamp;
        }
        if ($this->listing_active_count !== null) {
            $data['listing_active_count'] = $this->listing_active_count;
        }
        if ($this->digital_listing_count !== null) {
            $data['digital_listing_count'] = $this->digital_listing_count;
        }
        if ($this->login_name !== null) {
            $data['login_name'] = $this->login_name;
        }
        if ($this->accepts_custom_requests !== null) {
            $data['accepts_custom_requests'] = $this->accepts_custom_requests;
        }
        if ($this->policy_welcome !== null) {
            $data['policy_welcome'] = $this->policy_welcome;
        }
        if ($this->policy_payment !== null) {
            $data['policy_payment'] = $this->policy_payment;
        }
        if ($this->policy_shipping !== null) {
            $data['policy_shipping'] = $this->policy_shipping;
        }
        if ($this->policy_refunds !== null) {
            $data['policy_refunds'] = $this->policy_refunds;
        }
        if ($this->policy_additional !== null) {
            $data['policy_additional'] = $this->policy_additional;
        }
        if ($this->policy_seller_info !== null) {
            $data['policy_seller_info'] = $this->policy_seller_info;
        }
        if ($this->policy_update_date !== null) {
            $data['policy_update_date'] = $this->policy_update_date;
        }
        if ($this->policy_has_private_receipt_info !== null) {
            $data['policy_has_private_receipt_info'] = $this->policy_has_private_receipt_info;
        }
        if ($this->has_unstructured_policies !== null) {
            $data['has_unstructured_policies'] = $this->has_unstructured_policies;
        }
        if ($this->policy_privacy !== null) {
            $data['policy_privacy'] = $this->policy_privacy;
        }
        if ($this->vacation_autoreply !== null) {
            $data['vacation_autoreply'] = $this->vacation_autoreply;
        }
        if ($this->url !== null) {
            $data['url'] = $this->url;
        }
        if ($this->image_url_760x100 !== null) {
            $data['image_url_760x100'] = $this->image_url_760x100;
        }
        if ($this->num_favorers !== null) {
            $data['num_favorers'] = $this->num_favorers;
        }
        if ($this->languages !== null) {
            $data['languages'] = $this->languages;
        }
        if ($this->icon_url_fullxfull !== null) {
            $data['icon_url_fullxfull'] = $this->icon_url_fullxfull;
        }
        if ($this->is_using_structured_policies !== null) {
            $data['is_using_structured_policies'] = $this->is_using_structured_policies;
        }
        if ($this->has_onboarded_structured_policies !== null) {
            $data['has_onboarded_structured_policies'] = $this->has_onboarded_structured_policies;
        }
        if ($this->include_dispute_form_link !== null) {
            $data['include_dispute_form_link'] = $this->include_dispute_form_link;
        }
        if ($this->is_direct_checkout_onboarded !== null) {
            $data['is_direct_checkout_onboarded'] = $this->is_direct_checkout_onboarded;
        }
        if ($this->is_etsy_payments_onboarded !== null) {
            $data['is_etsy_payments_onboarded'] = $this->is_etsy_payments_onboarded;
        }
        if ($this->is_calculated_eligible !== null) {
            $data['is_calculated_eligible'] = $this->is_calculated_eligible;
        }
        if ($this->is_opted_in_to_buyer_promise !== null) {
            $data['is_opted_in_to_buyer_promise'] = $this->is_opted_in_to_buyer_promise;
        }
        if ($this->is_shop_us_based !== null) {
            $data['is_shop_us_based'] = $this->is_shop_us_based;
        }
        if ($this->transaction_sold_count !== null) {
            $data['transaction_sold_count'] = $this->transaction_sold_count;
        }
        if ($this->shipping_from_country_iso !== null) {
            $data['shipping_from_country_iso'] = $this->shipping_from_country_iso;
        }
        if ($this->shop_location_country_iso !== null) {
            $data['shop_location_country_iso'] = $this->shop_location_country_iso;
        }
        if ($this->review_count !== null) {
            $data['review_count'] = $this->review_count;
        }
        if ($this->review_average !== null) {
            $data['review_average'] = $this->review_average;
        }

        return $data;
    }
}
