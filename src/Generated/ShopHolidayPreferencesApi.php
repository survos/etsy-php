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
final readonly class ShopHolidayPreferencesApi
{
    public const string BASE_PATH = '';

    public function __construct(
        private EtsyTransportInterface $transport,
    ) {
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Retrieves a list of holidays that are available to a shop to set a preference for. Currently only supported in the US and CA
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     *
     * @return array<string, mixed>
     */
    public function getHolidayPreferences(int $shop_id): array
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/holiday-preferences', [
            '{shop_id}' => rawurlencode((string) $shop_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('GET', $path, $query, null, $headers, 'json');
        return $response;
    }

    /**
     * General ReleaseReport bugThis endpoint is ready for production use. Updates the preference for whether the seller will process orders or not on the holiday. Currently only supported in the US and CA
     *
     * @param int $shop_id The unique positive non-zero numeric ID for an Etsy Shop.
     * @param int $holiday_id The unique id that maps to the holiday a country observes. See the [Fulfillment Tutorial docs](https://developer.etsy.com/documentation/tuto...
     */
    public function updateHolidayPreferences(int $shop_id, int $holiday_id, Model\UpdateHolidayPreferencesRequest $body): Model\ShopHolidayPreference
    {
        $path = strtr(self::BASE_PATH . '/v3/application/shops/{shop_id}/holiday-preferences/{holiday_id}', [
            '{shop_id}' => rawurlencode((string) $shop_id),
            '{holiday_id}' => rawurlencode((string) $holiday_id),
        ]);
        $query = [];
        $headers = [];

        $response = $this->transport->request('PUT', $path, $query, $body->toArray(), $headers, 'form');
        return Model\ShopHolidayPreference::fromArray($response);
    }
}
