<?php

declare(strict_types=1);

namespace Survos\Etsy\Generated;

use Survos\Etsy\Http\EtsyTransportInterface;
use Survos\Etsy\Generated\Model;

/**
 * Etsy Open API v3.
 *
 * Generated from eBay's OpenAPI contract. Do not edit.
 * Authentication, sandbox selection and error mapping live behind the transport.
 */
final readonly class ShopReceiptApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a receipt, identified by a receipt id, from an Etsy shop. **NOTE** Access to ShopReceipt's first_line, second_line, city, state, zip, country_iso and formatted_address is contingent...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $receipt_id The numeric ID for the [receipt](/documentation/reference#tag/Shop-Receipt) associated to this transaction.
     * @param bool|null $legacy This parameter needed to enable new parameters and response values related to processing profiles.
     */
    public function getShopReceipt(int $shop_id, int $receipt_id, ?bool $legacy = null): Model\ShopReceipt
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/receipts/{receipt_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{receipt_id}' => rawurlencode((string) $receipt_id),
        ]);
        $query = [];
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopReceipt::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Updates the status of a receipt, identified by a receipt id, from an Etsy shop. **NOTE** Access to ShopReceipt's first_line, second_line, city, state, zip, country_iso and formatted_address is...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $receipt_id The numeric ID for the [receipt](/documentation/reference#tag/Shop-Receipt) associated to this transaction.
     * @param bool|null $legacy This parameter needed to enable new parameters and response values related to processing profiles.
     */
    public function updateShopReceipt(int $shop_id, int $receipt_id, Model\UpdateShopReceiptRequest $body, ?bool $legacy = null): Model\ShopReceipt
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/receipts/{receipt_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{receipt_id}' => rawurlencode((string) $receipt_id),
        ]);
        $query = [];
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('PUT', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopReceipt::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Requests the Shop Receipts from a specific Shop, unfiltered or filtered by receipt id range or offset, date, paid, and/or shipped purchases. **NOTE** Access to ShopReceipt's first_line, second...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int|null $min_created The earliest unix timestamp for when a record was created.
     * @param int|null $max_created The latest unix timestamp for when a record was created.
     * @param int|null $min_last_modified The earliest unix timestamp for when a record last changed.
     * @param int|null $max_last_modified The latest unix timestamp for when a record last changed.
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     * @param string|null $sort_on The value to sort a search result of listings on.
     * @param string|null $sort_order The ascending(up) or descending(down) order to sort receipts by.
     * @param bool|null $was_paid When `true`, returns receipts where the seller has received payment for the receipt. When `false`, returns receipts where payment has not be...
     * @param bool|null $was_shipped When `true`, returns receipts where the seller shipped the product(s) in this receipt. When `false`, returns receipts where shipment has not...
     * @param bool|null $was_delivered When `true`, returns receipts that have been marked as delivered. When `false`, returns receipts where shipment has not been marked as deliv...
     * @param bool|null $was_canceled When `true`, the endpoint will only return the canceled receipts. When `false`, the endpoint will only return non-canceled receipts.
     * @param bool|null $legacy This parameter needed to enable new parameters and response values related to processing profiles.
     */
    public function getShopReceipts(int $shop_id, ?int $min_created = null, ?int $max_created = null, ?int $min_last_modified = null, ?int $max_last_modified = null, ?int $limit = null, ?int $offset = null, ?string $sort_on = null, ?string $sort_order = null, ?bool $was_paid = null, ?bool $was_shipped = null, ?bool $was_delivered = null, ?bool $was_canceled = null, ?bool $legacy = null): Model\ShopReceipts
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/receipts', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        if ($min_created !== null) {
            $query['min_created'] = $min_created;
        }
        if ($max_created !== null) {
            $query['max_created'] = $max_created;
        }
        if ($min_last_modified !== null) {
            $query['min_last_modified'] = $min_last_modified;
        }
        if ($max_last_modified !== null) {
            $query['max_last_modified'] = $max_last_modified;
        }
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        if ($sort_on !== null) {
            $query['sort_on'] = $sort_on;
        }
        if ($sort_order !== null) {
            $query['sort_order'] = $sort_order;
        }
        if ($was_paid !== null) {
            $query['was_paid'] = $was_paid;
        }
        if ($was_shipped !== null) {
            $query['was_shipped'] = $was_shipped;
        }
        if ($was_delivered !== null) {
            $query['was_delivered'] = $was_delivered;
        }
        if ($was_canceled !== null) {
            $query['was_canceled'] = $was_canceled;
        }
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopReceipts::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Submits tracking information for a Shop Receipt, which creates a Shop Receipt Shipment entry for the given receipt_id. Each time you successfully submit tracking info, Etsy sends a notificatio...
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $receipt_id The receipt to submit tracking for.
     * @param bool|null $legacy This parameter needed to enable new parameters and response values related to processing profiles.
     */
    public function createReceiptShipment(int $shop_id, int $receipt_id, Model\CreateReceiptShipmentRequest $body, ?bool $legacy = null): Model\ShopReceipt
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/receipts/{receipt_id}/tracking', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{receipt_id}' => rawurlencode((string) $receipt_id),
        ]);
        $query = [];
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('POST', $path, $query, $body->toArray(), $headers, 'json');
        return Model\ShopReceipt::fromArray($response);
    }
}
