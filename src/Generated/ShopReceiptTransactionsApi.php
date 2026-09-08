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
final readonly class ShopReceiptTransactionsApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the list of transactions associated with a listing.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $listing_id The numeric ID for the [listing](/documentation/reference#tag/ShopListing) associated to this transaction.
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     * @param bool|null $legacy This parameter needed to enable new parameters and response values related to processing profiles.
     */
    public function getShopReceiptTransactionsByListing(int $shop_id, int $listing_id, ?int $limit = null, ?int $offset = null, ?bool $legacy = null): Model\ShopReceiptTransactions
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/listings/{listing_id}/transactions', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{listing_id}' => rawurlencode((string) $listing_id),
        ]);
        $query = [];
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopReceiptTransactions::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the list of transactions associated with a specific receipt.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $receipt_id The numeric ID for the [receipt](/documentation/reference#tag/Shop-Receipt) associated to this transaction.
     * @param bool|null $legacy This parameter needed to enable new parameters and response values related to processing profiles.
     */
    public function getShopReceiptTransactionsByReceipt(int $shop_id, int $receipt_id, ?bool $legacy = null): Model\ShopReceiptTransactions
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/receipts/{receipt_id}/transactions', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{receipt_id}' => rawurlencode((string) $receipt_id),
        ]);
        $query = [];
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopReceiptTransactions::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a transaction by transaction ID.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $transaction_id The unique numeric ID for a transaction.
     */
    public function getShopReceiptTransaction(int $shop_id, int $transaction_id): Model\ShopReceiptTransaction
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/transactions/{transaction_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{transaction_id}' => rawurlencode((string) $transaction_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopReceiptTransaction::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves the list of transactions associated with a shop.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     * @param bool|null $legacy This parameter needed to enable new parameters and response values related to processing profiles.
     */
    public function getShopReceiptTransactionsByShop(int $shop_id, ?int $limit = null, ?int $offset = null, ?bool $legacy = null): Model\ShopReceiptTransactions
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/transactions', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        if ($legacy !== null) {
            $query['legacy'] = $legacy;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\ShopReceiptTransactions::fromArray($response);
    }
}
