<?php

declare(strict_types=1);

/**
 * Generate typed PHP from the vendored Etsy OpenAPI contract.
 *
 *   php tools/generate.php
 *   php tools/generate.php --check
 *
 * Everything under src/Generated is disposable -- never hand-edit it.
 *
 * A sibling of lib/ebay-php's generator, but NOT a copy: Etsy's contract differs
 * in four ways that each change the output.
 *
 *  1. Etsy DECLARES `required`, where eBay declared none anywhere. Required
 *     properties are still emitted nullable (a response model must survive a
 *     field Etsy stops sending) but they are listed in the class docblock, so a
 *     caller building a request knows what is not optional.
 *
 *  2. Etsy uses `oneOf` with a single entry where a plain `$ref` would do --
 *     56 properties, all of the form {description, nullable, oneOf:[{$ref}]}.
 *     Unwrapped here; left alone they would generate as `string`.
 *
 *  3. Etsy declares enums (19 properties). The allowed values go in the docblock
 *     rather than becoming PHP enums: they are per-property rather than named
 *     schemas, so generating a type per property would produce 19 single-use
 *     enums with no shared identity.
 *
 *  4. Request bodies are `application/x-www-form-urlencoded` with INLINE schemas,
 *     not `application/json` with a $ref. Those become generated
 *     `<OperationId>Request` models, and the transport form-encodes them.
 *
 * If a third provider arrives, extract the shared 90% rather than copying again.
 */

const ROOT = __DIR__ . '/..';
const MANIFEST = ROOT . '/resources/openapi/manifest.json';
const OUT = ROOT . '/src/Generated';
const NS = 'Survos\\Etsy\\Generated';

/**
 * Known errors in the provider's own contract, corrected at generation time.
 * Empty for Etsy so far -- unlike eBay, nothing in this spec has been observed
 * declaring a type the API does not accept. Kept as the seam for when it is.
 */
const SPEC_OVERRIDES = [];

const RESERVED = [
    'abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch', 'class', 'clone',
    'const', 'continue', 'declare', 'default', 'do', 'echo', 'else', 'elseif', 'empty',
    'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile', 'enum', 'extends',
    'final', 'finally', 'fn', 'for', 'foreach', 'function', 'global', 'goto', 'if', 'implements',
    'include', 'instanceof', 'insteadof', 'interface', 'isset', 'list', 'match', 'namespace',
    'new', 'or', 'print', 'private', 'protected', 'public', 'readonly', 'require', 'return',
    'static', 'switch', 'throw', 'trait', 'try', 'unset', 'use', 'var', 'while', 'xor', 'yield',
];

/** Turn eBay's HTML-laden descriptions into one readable docblock line. */
function prose(?string $html, int $max = 220): string
{
    if ($html === null || trim($html) === '') {
        return '';
    }

    $text = preg_replace('/<br\s*\/?>/i', ' ', $html) ?? $html;
    $text = strip_tags($text);
    $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $text = trim((string) preg_replace('/\s+/u', ' ', $text));
    // A literal */ inside a docblock closes it early and breaks the file.
    $text = str_replace('*/', '*\\/', $text);

    if (mb_strlen($text) > $max) {
        $text = rtrim(mb_substr($text, 0, $max)) . '...';
    }

    return $text;
}

/**
 * Reserved as CLASS names, which is a different list from reserved variable names.
 * Etsy really does ship a schema called `Self`, and `class Self` is a parse error.
 */
const RESERVED_CLASS_NAMES = [
    'self', 'parent', 'static', 'int', 'float', 'bool', 'string', 'true', 'false',
    'null', 'void', 'iterable', 'object', 'mixed', 'never', 'callable', 'array',
    'enum', 'readonly',
];

function classNameFor(string $schemaName): string
{
    $name = ucfirst(preg_replace('/[^A-Za-z0-9]/', '', $schemaName) ?? $schemaName);

    if (in_array(strtolower($name), RESERVED_CLASS_NAMES, true)) {
        $name .= 'Model';
    }

    return $name;
}

function propertyNameFor(string $name): string
{
    $php = preg_replace('/[^A-Za-z0-9_]/', '_', $name) ?? $name;
    $php = lcfirst($php);

    if (in_array(strtolower($php), RESERVED, true) || preg_match('/^\d/', $php)) {
        $php = '_' . $php;
    }

    return $php;
}

function refToClass(string $ref): string
{
    return classNameFor(substr($ref, (int) strrpos($ref, '/') + 1));
}

/**
 * @param array<string, mixed> $schema
 *
 * @return array{php: string, doc: string, model: ?string, listOf: ?string}
 */
function resolveType(array $schema): array
{
    // Etsy writes {description, nullable, oneOf:[{$ref}]} where a plain $ref would
    // do -- 56 properties. Unwrapped, or they generate as `string`.
    if (isset($schema['oneOf']) && is_array($schema['oneOf']) && 1 === count($schema['oneOf'])) {
        $inner = $schema['oneOf'][0];
        if (is_array($inner)) {
            return resolveType($inner);
        }
    }

    if (isset($schema['$ref'])) {
        $class = refToClass($schema['$ref']);

        return ['php' => $class, 'doc' => $class, 'model' => $class, 'listOf' => null];
    }

    $type = $schema['type'] ?? 'string';

    if ($type === 'array') {
        $items = $schema['items'] ?? ['type' => 'string'];
        $inner = resolveType($items);

        return [
            'php' => 'array',
            'doc' => 'list<' . $inner['doc'] . '>',
            'model' => null,
            'listOf' => $inner['model'],
        ];
    }

    $php = match ($type) {
        'integer' => 'int',
        'number' => 'float',
        'boolean' => 'bool',
        'object' => 'array',
        default => 'string',
    };

    $doc = $php;
    if ($php === 'array') {
        $additional = $schema['additionalProperties'] ?? null;
        $doc = is_array($additional)
            ? 'array<string, ' . resolveType($additional)['doc'] . '>'
            : 'array<string, mixed>';
    }

    return ['php' => $php, 'doc' => $doc, 'model' => null, 'listOf' => null];
}

/**
 * @param array<string, mixed> $schema
 */
function renderModel(string $namespace, string $class, array $schema, string $sourceTitle): string
{
    $properties = $schema['properties'] ?? [];

    $uses = [];
    $params = [];
    $toArray = [];
    $fromArray = [];

    foreach ($properties as $wireName => $property) {
        $php = propertyNameFor((string) $wireName);
        $type = resolveType($property);
        $description = prose($property['description'] ?? null);
        if (isset($property['enum']) && is_array($property['enum'])) {
            $allowed = implode(', ', array_map(static fn (mixed $v): string => (string) $v, $property['enum']));
            $description = trim($description . ' One of: ' . $allowed . '.');
        }

        $docType = $type['doc'];
        $paramDoc = '';
        if ($type['php'] === 'array' || $description !== '') {
            $paramDoc = sprintf(
                '     * @param %s $%s%s',
                $type['php'] === 'array' ? $docType . '|null' : $docType . '|null',
                $php,
                $description !== '' ? ' ' . $description : '',
            );
        }

        $params[] = ['php' => $php, 'type' => $type, 'doc' => $paramDoc];

        // toArray: omit nulls. eBay rejects some explicit nulls outright and
        // treats others as "clear this field", so sending them is never harmless.
        if ($type['listOf'] !== null) {
            $toArray[] = sprintf(
                "        if (\$this->%s !== null) {\n"
                . "            \$data['%s'] = array_map(static fn (%s \$i): array => \$i->toArray(), \$this->%s);\n"
                . '        }',
                $php,
                $wireName,
                $type['listOf'],
                $php,
            );
            $fromArray[] = sprintf(
                "            %s: isset(\$data['%s']) && is_array(\$data['%s'])\n"
                . "                ? array_values(array_map(static fn (array \$i): %s => %s::fromArray(\$i), \$data['%s']))\n"
                . '                : null,',
                $php,
                $wireName,
                $wireName,
                $type['listOf'],
                $type['listOf'],
                $wireName,
            );
        } elseif ($type['model'] !== null) {
            $toArray[] = sprintf(
                "        if (\$this->%s !== null) {\n            \$data['%s'] = \$this->%s->toArray();\n        }",
                $php,
                $wireName,
                $php,
            );
            $fromArray[] = sprintf(
                "            %s: isset(\$data['%s']) && is_array(\$data['%s']) ? %s::fromArray(\$data['%s']) : null,",
                $php,
                $wireName,
                $wireName,
                $type['model'],
                $wireName,
            );
        } else {
            $toArray[] = sprintf(
                "        if (\$this->%s !== null) {\n            \$data['%s'] = \$this->%s;\n        }",
                $php,
                $wireName,
                $php,
            );
            $cast = match ($type['php']) {
                'int' => '(int) $data[\'%s\']',
                'float' => '(float) $data[\'%s\']',
                'bool' => '(bool) $data[\'%s\']',
                'array' => '(array) $data[\'%s\']',
                default => '(string) $data[\'%s\']',
            };
            $fromArray[] = sprintf(
                "            %s: isset(\$data['%s']) ? %s : null,",
                $php,
                $wireName,
                sprintf($cast, $wireName),
            );
        }
    }

    $docLines = array_values(array_filter(array_map(static fn (array $p): string => $p['doc'], $params)));
    $classDoc = prose($schema['description'] ?? null, 400);

    /** @var list<string> $requiredNames */
    $requiredNames = array_values(array_filter(
        (array) ($schema['required'] ?? []),
        static fn (mixed $r): bool => is_string($r),
    ));

    $header = "<?php\n\ndeclare(strict_types=1);\n\nnamespace {$namespace};\n\n";
    $header .= "/**\n";
    if ($classDoc !== '') {
        $header .= ' * ' . $classDoc . "\n *\n";
    }
    $header .= " * Generated from the {$sourceTitle} OpenAPI contract. Do not edit.\n";
    if ($requiredNames !== []) {
        $header .= " *\n * Etsy declares these REQUIRED when creating or updating: "
            . implode(', ', $requiredNames) . ".\n";
        $header .= " * They are still nullable here -- a response model has to survive a field\n";
        $header .= " * Etsy stops sending -- so the requirement is documented, not enforced by the\n";
        $header .= " * constructor. Validate before sending, not after parsing.\n";
    }
    $header .= " */\n";

    $body = "final readonly class {$class}\n{\n";
    if ($docLines !== []) {
        $body .= "    /**\n" . implode("\n", $docLines) . "\n     */\n";
    }
    $body .= "    public function __construct(\n";
    foreach ($params as $p) {
        $body .= sprintf("        public ?%s \$%s = null,\n", $p['type']['php'], $p['php']);
    }
    $body .= "    ) {\n    }\n\n";

    $body .= "    /** @param array<string, mixed> \$data */\n";
    $body .= "    public static function fromArray(array \$data): self\n    {\n";
    $body .= $fromArray === []
        ? "        return new self();\n"
        : "        return new self(\n" . implode("\n", $fromArray) . "\n        );\n";
    $body .= "    }\n\n";

    $body .= "    /**\n     * Null properties are omitted: eBay rejects some explicit nulls and reads\n"
        . "     * others as \"clear this field\", so emitting them is never harmless.\n     *\n"
        . "     * @return array<string, mixed>\n     */\n";
    $body .= "    public function toArray(): array\n    {\n        \$data = [];\n";
    $body .= $toArray === [] ? '' : implode("\n", $toArray) . "\n";
    $body .= "\n        return \$data;\n    }\n}\n";

    return $header . $body;
}

/**
 * @param array<string, mixed> $spec
 */
/**
 * @param array<string, array<string, mixed>> $extraModels collects INLINE request-body
 *        schemas so the caller can generate a model for each. Etsy sends
 *        form-urlencoded bodies with the schema written inline rather than as a
 *        $ref, so there is no component to point at.
 */
function renderApi(string $namespace, string $class, array $spec, string $basePath, string $sourceTitle, array &$extraModels = []): string
{
    $methods = [];

    foreach ($spec['paths'] ?? [] as $path => $operations) {
        foreach ($operations as $verb => $operation) {
            if (!is_array($operation) || !isset($operation['operationId'])) {
                continue;
            }

            $name = lcfirst((string) $operation['operationId']);
            $signature = [];
            $pathParams = [];
            $queryParams = [];
            $headerParams = [];
            $docs = [];

            foreach ($operation['parameters'] ?? [] as $parameter) {
                $in = $parameter['in'] ?? 'query';
                $wire = (string) $parameter['name'];

                // Content-Type and Accept are the transport's business, not the caller's.
                if ($in === 'header' && in_array(strtolower($wire), ['content-type', 'accept', 'content-language', 'accept-language'], true)) {
                    continue;
                }

                $php = propertyNameFor($wire);
                $type = resolveType($parameter['schema'] ?? ['type' => 'string']);
                $required = (bool) ($parameter['required'] ?? false);
                $description = prose($parameter['description'] ?? null, 140);

                $signature[] = [
                    'php' => $php,
                    'type' => $type['php'],
                    'required' => $required && $in === 'path',
                ];
                if ($description !== '') {
                    $docs[] = sprintf('     * @param %s $%s %s', $type['php'] . ($required ? '' : '|null'), $php, $description);
                }

                match ($in) {
                    'path' => $pathParams[$wire] = $php,
                    'header' => $headerParams[$wire] = $php,
                    default => $queryParams[$wire] = $php,
                };
            }

            // Etsy uses form-urlencoded far more than JSON, and multipart for uploads.
            // The encoding travels to the transport, which cannot infer it.
            $bodyClass = null;
            $bodyEncoding = 'json';
            foreach (['application/json', 'application/x-www-form-urlencoded', 'multipart/form-data'] as $contentType) {
                $bodySchema = $operation['requestBody']['content'][$contentType]['schema'] ?? null;
                if (!is_array($bodySchema)) {
                    continue;
                }

                $bodyEncoding = 'application/json' === $contentType ? 'json' : 'form';

                if (isset($bodySchema['$ref'])) {
                    $bodyClass = 'Model\\' . refToClass($bodySchema['$ref']);
                } else {
                    // Inline schema: mint a model named after the operation.
                    $generated = classNameFor((string) $operation['operationId']) . 'Request';
                    $extraModels[$generated] = $bodySchema;
                    $bodyClass = 'Model\\' . $generated;
                }

                break;
            }

            $responseRef = null;
            foreach (['200', '201', '202'] as $code) {
                $responseRef = $operation['responses'][$code]['content']['application/json']['schema']['$ref'] ?? null;
                if ($responseRef !== null) {
                    break;
                }
            }
            $responseClass = $responseRef !== null ? 'Model\\' . refToClass($responseRef) : null;

            // Required path params first, then the body, then optional bits.
            usort($signature, static fn (array $a, array $b): int => ($b['required'] ? 1 : 0) <=> ($a['required'] ? 1 : 0));

            $args = [];
            foreach ($signature as $p) {
                $args[] = $p['required']
                    ? sprintf('%s $%s', $p['type'], $p['php'])
                    : sprintf('?%s $%s = null', $p['type'], $p['php']);
            }
            if ($bodyClass !== null) {
                array_splice($args, count(array_filter($signature, static fn (array $p): bool => $p['required'])), 0, [sprintf('%s $body', $bodyClass)]);
            }

            $pathExpr = 'self::BASE_PATH . ' . var_export($path, true);
            $replacements = [];
            foreach ($pathParams as $wire => $php) {
                $replacements[] = sprintf("'{%s}' => rawurlencode((string) \$%s)", $wire, $php);
            }
            $pathLine = $replacements === []
                ? sprintf('        $path = %s;', $pathExpr)
                : sprintf("        \$path = strtr(%s, [\n            %s,\n        ]);", $pathExpr, implode(",\n            ", $replacements));

            $queryLine = '        $query = [];';
            foreach ($queryParams as $wire => $php) {
                $queryLine .= sprintf(
                    "\n        if (\$%s !== null) {\n            \$query['%s'] = \$%s;\n        }",
                    $php,
                    $wire,
                    $php,
                );
            }

            $headerLine = '        $headers = [];';
            foreach ($headerParams as $wire => $php) {
                $headerLine .= sprintf(
                    "\n        if (\$%s !== null) {\n            \$headers['%s'] = (string) \$%s;\n        }",
                    $php,
                    $wire,
                    $php,
                );
            }

            $returnType = $responseClass ?? 'array';
            $docBlock = '';
            $description = prose($operation['description'] ?? $operation['summary'] ?? null, 260);
            if ($description !== '' || $docs !== []) {
                $docBlock = "    /**\n";
                if ($description !== '') {
                    $docBlock .= '     * ' . $description . "\n";
                    if ($docs !== []) {
                        $docBlock .= "     *\n";
                    }
                }
                if ($docs !== []) {
                    $docBlock .= implode("\n", $docs) . "\n";
                }
                if ($responseClass === null) {
                    $docBlock .= "     *\n     * @return array<string, mixed>\n";
                }
                $docBlock .= "     */\n";
            } elseif ($responseClass === null) {
                $docBlock = "    /** @return array<string, mixed> */\n";
            }

            $call = sprintf(
                "        \$response = \$this->transport->request(%s, \$path, \$query, %s, \$headers, %s);",
                var_export(strtoupper($verb), true),
                $bodyClass !== null ? '$body->toArray()' : 'null',
                var_export($bodyEncoding, true),
            );

            $return = $responseClass !== null
                ? sprintf("\n        return %s::fromArray(\$response);", $responseClass)
                : "\n        return \$response;";

            $methods[] = $docBlock
                . sprintf("    public function %s(%s): %s\n    {\n", $name, implode(', ', $args), $returnType)
                . $pathLine . "\n" . $queryLine . "\n" . $headerLine . "\n\n" . $call . $return . "\n    }";
        }
    }

    $header = "<?php\n\ndeclare(strict_types=1);\n\nnamespace {$namespace};\n\n"
        . "use Survos\\Etsy\\Http\\EtsyTransportInterface;\n\n"
        . "/**\n * {$sourceTitle}.\n *\n"
        . " * Generated from eBay's OpenAPI contract. Do not edit.\n"
        . " * Authentication, sandbox selection and error mapping live behind the transport.\n */\n";

    $body = "final readonly class {$class}\n{\n"
        . sprintf("    public const string BASE_PATH = '%s';\n\n", $basePath)
        . "    public function __construct(\n        private EtsyTransportInterface \$transport,\n    ) {\n    }\n\n"
        . implode("\n\n", $methods)
        . "\n}\n";

    return $header . $body;
}

// ---------------------------------------------------------------------------

$check = in_array('--check', $_SERVER['argv'], true);
$manifest = json_decode((string) file_get_contents(MANIFEST), true, 512, JSON_THROW_ON_ERROR);
$target = $check ? sys_get_temp_dir() . '/ebay-generated-' . bin2hex(random_bytes(4)) : OUT;

if (!$check && is_dir(OUT)) {
    $it = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator(OUT, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST,
    );
    foreach ($it as $file) {
        $file->isDir() ? rmdir($file->getPathname()) : unlink($file->getPathname());
    }
}

$totalModels = 0;
$totalOps = 0;

foreach ($manifest['contracts'] as $key => $meta) {
    $spec = json_decode(
        (string) file_get_contents(ROOT . '/resources/openapi/' . $meta['file']),
        true,
        512,
        JSON_THROW_ON_ERROR,
    );

    // NOT $target -- that is the output directory, and shadowing it here silently
    // redirects every generated file to a relative path that does not exist.
    foreach (SPEC_OVERRIDES[$key] ?? [] as $overrideTarget => $replacement) {
        [$schemaName, $propertyName] = explode('.', $overrideTarget, 2);
        if (!isset($spec['components']['schemas'][$schemaName]['properties'][$propertyName])) {
            fwrite(STDERR, sprintf(
                "WARNING  override %s.%s no longer matches the contract -- eBay may have fixed it; "
                . "verify and remove from SPEC_OVERRIDES.\n",
                $key,
                $overrideTarget,
            ));

            continue;
        }

        $existing = $spec['components']['schemas'][$schemaName]['properties'][$propertyName];
        $spec['components']['schemas'][$schemaName]['properties'][$propertyName]
            = $replacement + ['description' => $existing['description'] ?? null];
        printf("  override %s.%s: %s -> %s\n", $key, $overrideTarget, $existing['type'] ?? '?', $replacement['type']);
    }

    // Etsy is ONE spec with 105 operations, so the eBay category/call split does not
    // apply. Group by the spec's own tags instead -- 27 of them, and they are the
    // same groupings Etsy's documentation uses, so ShopListingApi::createDraftListing
    // sits where a reader of their docs would look for it.
    $namespace = NS;
    $dir = $target;
    @mkdir($dir . '/Model', 0o775, true);

    $title = (string) $meta['title'];

    foreach ($spec['components']['schemas'] ?? [] as $schemaName => $schema) {
        $class = classNameFor((string) $schemaName);
        file_put_contents(
            $dir . '/Model/' . $class . '.php',
            renderModel($namespace . '\\Model', $class, $schema, $title),
        );
        ++$totalModels;
    }

    $byTag = [];
    foreach ($spec['paths'] ?? [] as $path => $operations) {
        foreach ($operations as $verb => $operation) {
            if (!is_array($operation) || !isset($operation['operationId'])) {
                continue;
            }
            $tag = (string) (($operation['tags'] ?? ['Other'])[0] ?? 'Other');
            $byTag[$tag]['paths'][$path][$verb] = $operation;
        }
    }
    ksort($byTag);

    $basePath = '';
    $ops = 0;

    foreach ($byTag as $tag => $subset) {
        $apiClass = classNameFor($tag) . 'Api';
        $extraModels = [];
        $source = renderApi($namespace, $apiClass, $subset, $basePath, $title, $extraModels);
        $source = str_replace(
            "use Survos\\Etsy\\Http\\EtsyTransportInterface;",
            "use Survos\\Etsy\\Http\\EtsyTransportInterface;\nuse {$namespace}\\Model;",
            $source,
        );
        file_put_contents($dir . '/' . $apiClass . '.php', $source);

        foreach ($extraModels as $extraClass => $extraSchema) {
            file_put_contents(
                $dir . '/Model/' . $extraClass . '.php',
                renderModel($namespace . '\\Model', $extraClass, $extraSchema, $title),
            );
            ++$totalModels;
        }

        foreach ($subset['paths'] as $operations) {
            $ops += count($operations);
        }

        printf("  %-30s %2d operations\n", $apiClass, array_sum(array_map('count', $subset['paths'])));
    }

    $totalOps += $ops;

    printf("%-20s %d API classes\n", $key, count($byTag));

}

printf("\n%d models, %d operations -> %s\n", $totalModels, $totalOps, $check ? $target : 'src/Generated');
