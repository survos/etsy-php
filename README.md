# survos/etsy-php

An Etsy Open API v3 client for PHP, generated from **Etsy's own OpenAPI 3 contract**.

Framework-agnostic — it depends on `symfony/http-client-contracts`, an *interface*
package, so bring any implementation.

```bash
composer require survos/etsy-php symfony/http-client
```

| | |
|---|---|
| Contract | 76 paths, 81 schemas, fetched with plain HTTP (no Cloudflare fight, unlike eBay) |
| Generated | 110 models, 105 operations, **27 API classes** split by the spec's own tags |
| Auth | OAuth 2.0 **with mandatory PKCE**, 1-hour access / 90-day refresh |

```php
$api = new Survos\Etsy\Generated\ShopListingApi($transport);

$listing = $api->createDraftListing($shopId, new Model\CreateDraftListingRequest(
    quantity: 1, title: 'Lot of 5 Vintage Animal Postcards',
    description: 'Five themed postcards, 1930s–1950s.',
    price: 12.00, who_made: 'someone_else', when_made: 'before_2006',
    taxonomy_id: $taxonomyId,
));
```

## Four things Etsy does differently

**`x-api-key` on every request.** It identifies the *app*; the bearer token
identifies the *seller*. A perfectly valid OAuth token still 403s without it — and
the error looks exactly like a bad token. `EtsyTransport` always sends it.

**Write bodies are form-urlencoded**, not JSON, and the schemas are written *inline*
rather than as `$ref`s. The generator mints a `<OperationId>Request` model for each
and records the encoding, because the transport cannot infer it. Nested values
(tags, materials, inventory) are JSON-encoded *inside* the form body.

**PKCE is mandatory.** Etsy rejects an authorization request with no
`code_challenge` and the exchange with no matching `code_verifier`. The verifier
generated at consent time has to survive to the callback — keep it in the session.

**Access tokens are prefixed with the seller's user id** (`12345678.abcdef…`).
That's the only place the id is handed to you, so `EtsyToken` parses it out rather
than making you call `/users/me`.

Etsy does **not** rotate refresh tokens, so a refresh response omitting one means
keep the one you have. (The opposite of Mercado Libre — see `survos/mercadolibre-php`.)

## There is no sandbox

Etsy removed it. You test against a real shop, and [their API testing
policy](https://www.etsy.com/legal/policy/api-testing-policy/169130941112) sets the
rules:

- turn on **Developer Mode** for the shop
- **create listings in draft state where possible** — no listing fee, nothing to
  deactivate afterwards
- price test listings **under $1**
- deactivate them when finished
- **you owe any fees incurred**, testing or not
- if a buyer accidentally buys one, cancel it — failing to is grounds for suspension

`createDraftListing` is therefore not just convenient, it is what the policy asks
for. Drafts are the safety margin that a sandbox would otherwise provide.

## Regenerating

```bash
composer refresh-specs   # re-download; read the diff before committing
composer generate        # contract -> src/Generated
```

The spec is vendored so generation is reproducible and CI never depends on Etsy
being reachable. Unlike eBay, an ordinary HTTP client can fetch it, so the refresh
works on a Linux runner too.

## Tests

```bash
composer install && vendor/bin/phpunit && vendor/bin/phpstan analyse
```
