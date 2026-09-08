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
final readonly class PaymentApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Get a Payment from a PaymentAccount Ledger Entry ID, if applicable
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     */
    public function getPaymentAccountLedgerEntryPayments(int $shop_id, ?array $ledger_entry_ids = null): Model\Payments
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/payment-account/ledger-entries/payments', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        if ($ledger_entry_ids !== null) {
            $query['ledger_entry_ids'] = $ledger_entry_ids;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\Payments::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a payment from a specific receipt, identified by `receipt_id`, from a specific shop, identified by `shop_id`
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $receipt_id The numeric ID for the [receipt](/documentation/reference#tag/Shop-Receipt) associated to this transaction.
     */
    public function getShopPaymentByReceiptId(int $shop_id, int $receipt_id): Model\Payments
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/receipts/{receipt_id}/payments', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{receipt_id}' => rawurlencode((string) $receipt_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\Payments::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a list of payments from a shop identified by `shop_id`. You can also filter results using a list of payment IDs.
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param array $payment_ids A comma-separated array of Payment IDs numbers.
     */
    public function getPayments(int $shop_id, ?array $payment_ids = null): Model\Payments
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/payments', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        if ($payment_ids !== null) {
            $query['payment_ids'] = $payment_ids;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\Payments::fromArray($response);
    }
}
