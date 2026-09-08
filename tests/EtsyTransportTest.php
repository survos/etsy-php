<?php

declare(strict_types=1);

namespace Survos\Etsy\Tests;

use PHPUnit\Framework\TestCase;
use Survos\Etsy\Auth\EtsyCredentials;
use Survos\Etsy\Auth\EtsyToken;
use Survos\Etsy\Auth\OAuthService;
use Survos\Etsy\Auth\StaticAccessTokenProvider;
use Survos\Etsy\Exception\EtsyAuthenticationException;
use Survos\Etsy\Generated\Model\CreateDraftListingRequest;
use Survos\Etsy\Generated\ShopListingApi;
use Survos\Etsy\Http\EtsyTransport;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

final class EtsyTransportTest extends TestCase
{
    private function credentials(): EtsyCredentials
    {
        return new EtsyCredentials('keystring-abc', 'shared-secret', 'https://example.org/etsy/callback');
    }

    public function testEveryRequestCarriesTheApiKeyAlongsideTheBearerToken(): void
    {
        $seen = ['headers' => [], 'url' => '', 'body' => ''];
        $client = new MockHttpClient(function (string $m, string $url, array $o) use (&$seen): MockResponse {
            $seen = ['headers' => $o['headers'], 'url' => $url, 'body' => $o['body'] ?? ''];

            return new MockResponse('{"listing_id":123}');
        });

        $api = new ShopListingApi(new EtsyTransport(
            $client,
            $this->credentials(),
            new StaticAccessTokenProvider('12345678.tok', 12345678),
        ));

        $api->createDraftListing(999, new CreateDraftListingRequest(
            quantity: 1,
            title: 'Lot of 5 Vintage Animal Postcards',
            description: 'Five themed postcards.',
            price: 12.0,
            who_made: 'someone_else',
            when_made: 'before_2006',
            taxonomy_id: 1,
        ));

        $headers = array_change_key_case(array_column(array_map(
            static fn (string $h): array => explode(': ', $h, 2),
            $seen['headers'],
        ), 1, 0));

        // The x-api-key is NOT optional once authenticated -- omitting it 403s
        // exactly like a bad token, which is a confusing afternoon. It also has to
        // be the COMPOSITE "keystring:shared_secret", not the keystring alone:
        // sending just the keystring 403s with "Shared secret is required in
        // x-api-key header".
        self::assertSame('keystring-abc:shared-secret', $headers['x-api-key']);
        self::assertSame('Bearer 12345678.tok', $headers['authorization']);
        self::assertSame('https://openapi.etsy.com/v3/application/shops/999/listings', $seen['url']);
    }

    public function testWriteBodiesAreFormEncodedNotJson(): void
    {
        $seen = '';
        $client = new MockHttpClient(function (string $m, string $u, array $o) use (&$seen): MockResponse {
            $seen = (string) $o['body'];

            return new MockResponse('{"listing_id":123}');
        });

        (new ShopListingApi(new EtsyTransport($client, $this->credentials(), new StaticAccessTokenProvider('t'))))
            ->createDraftListing(999, new CreateDraftListingRequest(
                quantity: 1,
                title: 'Postcards',
                description: 'Five.',
                price: 12.5,
                who_made: 'someone_else',
                when_made: 'before_2006',
                taxonomy_id: 1,
            ));

        // Etsy takes application/x-www-form-urlencoded here, not JSON.
        self::assertStringNotContainsString('{"quantity"', $seen);
        self::assertStringContainsString('quantity=1', $seen);
        self::assertStringContainsString('who_made=someone_else', $seen);
        self::assertStringContainsString('price=12.5', $seen);
    }

    public function testScalarListsAreCommaSeparatedNotJson(): void
    {
        $seen = '';
        $client = new MockHttpClient(function (string $m, string $u, array $o) use (&$seen): MockResponse {
            $seen = (string) $o['body'];

            return new MockResponse('{"listing_id":123}');
        });

        (new ShopListingApi(new EtsyTransport($client, $this->credentials(), new StaticAccessTokenProvider('t'))))
            ->createDraftListing(999, new CreateDraftListingRequest(
                quantity: 1,
                title: 'Postcards',
                description: 'Five.',
                price: 12.5,
                who_made: 'someone_else',
                when_made: 'before_2006',
                taxonomy_id: 1,
                tags: ['Miami', 'Florida', 'United States'],
            ));

        // JSON-encoding a tag list is rejected as
        // {"path":"/tags","type":"invalid_characters"} -- the brackets and quotes
        // ARE the invalid characters, so the error blames the tags for what is
        // really an encoding bug. Etsy wants them comma-separated.
        self::assertStringNotContainsString('%5B', $seen, 'tags were JSON-encoded');
        self::assertStringNotContainsString('%22', $seen, 'tags were JSON-encoded');
        self::assertStringContainsString('tags=Miami%2CFlorida%2CUnited+States', $seen);
    }

    public function testAnonymousCallsStillSendTheApiKey(): void
    {
        $seen = [];
        $client = new MockHttpClient(function (string $m, string $u, array $o) use (&$seen): MockResponse {
            $seen = $o['headers'];

            return new MockResponse('{}');
        });

        // No token provider: taxonomy and other app-only endpoints need just the key.
        (new EtsyTransport($client, $this->credentials()))->request('GET', '/v3/application/seller-taxonomy/nodes');

        $joined = implode("\n", $seen);
        self::assertStringContainsString('x-api-key: keystring-abc', $joined);
        self::assertStringNotContainsStringIgnoringCase('authorization:', $joined);
    }

    public function testAuthFailuresGetTheirOwnType(): void
    {
        $client = new MockHttpClient([new MockResponse('{"error":"invalid_token"}', ['http_code' => 401])]);

        $this->expectException(EtsyAuthenticationException::class);
        (new EtsyTransport($client, $this->credentials()))->request('GET', '/v3/application/users/me');
    }
}
