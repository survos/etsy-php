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
final readonly class LedgerEntryApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Get a single Shop Payment Account Ledger's Entry
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $ledger_entry_id The unique ID of the shop owner ledger entry.
     */
    public function getShopPaymentAccountLedgerEntry(int $shop_id, int $ledger_entry_id): Model\PaymentAccountLedgerEntry
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/payment-account/ledger-entries/{ledger_entry_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{ledger_entry_id}' => rawurlencode((string) $ledger_entry_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\PaymentAccountLedgerEntry::fromArray($response);
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Get a Shop Payment Account Ledger's Entries
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $min_created The earliest unix timestamp for when a record was created.
     * @param int $max_created The latest unix timestamp for when a record was created.
     * @param int|null $limit The maximum number of results to return.
     * @param int|null $offset The number of records to skip before selecting the first result.
     */
    public function getShopPaymentAccountLedgerEntries(int $shop_id, ?int $min_created = null, ?int $max_created = null, ?int $limit = null, ?int $offset = null): Model\PaymentAccountLedgerEntries
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/payment-account/ledger-entries', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        if ($min_created !== null) {
            $query['min_created'] = $min_created;
        }
        if ($max_created !== null) {
            $query['max_created'] = $max_created;
        }
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return Model\PaymentAccountLedgerEntries::fromArray($response);
    }
}
