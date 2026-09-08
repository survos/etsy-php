<?php

declare(strict_types=1);

/**
 * Re-download Etsy's OpenAPI 3 contract into resources/openapi/.
 *
 *   php tools/refresh-specs.php
 *   php tools/refresh-specs.php --check    # fail if stale, write nothing
 *
 * Vendored rather than fetched at build time, so generation is reproducible.
 *
 * Mercifully simpler than the eBay equivalent: Etsy serves the spec to an
 * ordinary HTTPS client. No Cloudflare TLS fingerprinting, so this uses PHP's
 * own HTTP rather than shelling out to a curl binary with the right TLS stack,
 * and it therefore works on a Linux CI runner too.
 */

const OPENAPI_DIR = __DIR__ . '/../resources/openapi';
const MANIFEST = OPENAPI_DIR . '/manifest.json';

const CONTRACTS = [
    'etsy.openapi' => [
        'https://www.etsy.com/openapi/generated/oas/3.0.0.json',
        'etsy_openapi_v3_oas3.json',
        'The whole Etsy Open API v3: listings, shops, taxonomy, inventory, receipts.',
    ],
];

function fetchContract(string $url): string
{
    $context = stream_context_create(['http' => [
        'method' => 'GET',
        'timeout' => 60,
        'header' => [
            'Accept: application/json',
            // Etsy 403s a bare PHP user agent, but is satisfied by any honest one.
            'User-Agent: survos/etsy-php spec refresher (+https://github.com/survos/etsy-php)',
        ],
    ]]);

    $body = @file_get_contents($url, false, $context);

    if (false === $body) {
        throw new RuntimeException(sprintf('%s: could not fetch. %s', $url, error_get_last()['message'] ?? ''));
    }

    return $body;
}

$check = in_array('--check', $_SERVER['argv'], true);
$manifest = is_file(MANIFEST)
    ? json_decode((string) file_get_contents(MANIFEST), true, 512, JSON_THROW_ON_ERROR)
    : ['contracts' => []];

$next = [];
$stale = [];

foreach (CONTRACTS as $key => [$url, $filename, $why]) {
    try {
        $spec = json_decode(fetchContract($url), true, 512, JSON_THROW_ON_ERROR);
    } catch (Throwable $e) {
        fwrite(STDERR, sprintf("FAIL  %-16s %s\n", $key, $e->getMessage()));

        exit(1);
    }

    if (!str_starts_with((string) ($spec['openapi'] ?? ''), '3.')) {
        fwrite(STDERR, sprintf("FAIL  %-16s not an OpenAPI 3 document\n", $key));

        exit(1);
    }

    // Re-encoded with stable key order, so a refresh diff shows what Etsy changed
    // rather than whitespace churn.
    $normalized = json_encode($spec, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n";
    $digest = hash('sha256', $normalized);
    $previous = $manifest['contracts'][$key] ?? null;
    $changed = ($previous['sha256'] ?? null) !== $digest;

    if ($changed) {
        $stale[] = $key;
    }

    printf(
        "%-6s %-16s %s v%s  (%d paths, %d schemas)\n",
        $check ? ($changed ? 'STALE' : 'ok') : ($changed ? 'UPDATE' : 'same'),
        $key,
        $spec['info']['title'] ?? '?',
        $spec['info']['version'] ?? '?',
        count($spec['paths'] ?? []),
        count($spec['components']['schemas'] ?? []),
    );

    if ($check) {
        $next[$key] = $previous;

        continue;
    }

    file_put_contents(OPENAPI_DIR . '/' . $filename, $normalized);

    $next[$key] = [
        'file' => $filename,
        'url' => $url,
        'title' => $spec['info']['title'] ?? '?',
        'version' => (string) ($spec['info']['version'] ?? '?'),
        'paths' => count($spec['paths'] ?? []),
        'schemas' => count($spec['components']['schemas'] ?? []),
        'sha256' => $digest,
        'why' => $why,
        'fetchedAt' => gmdate('c'),
    ];
}

if (!$check) {
    file_put_contents(
        MANIFEST,
        json_encode(['contracts' => array_filter($next)], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n",
    );
}

if ($check && $stale !== []) {
    fwrite(STDERR, sprintf("\nchanged upstream: %s\nRun: php tools/refresh-specs.php\n", implode(', ', $stale)));

    exit(1);
}
