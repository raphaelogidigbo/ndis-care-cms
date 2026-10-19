<?php

/**
 * Stage 1 - Content capture for example.com rebuild.
 *
 * Fetches the 21 published pages via the WP REST API, cleans the markup,
 * downloads ONLY whitelisted images (uploads/2026/04 + theme assets
 * referenced by the live site) and writes seed data to
 * database/seeders/data/.
 *
 * Usage: php scripts/capture-wp.php
 */

const BASE = 'https://example.com';
const UPLOADS_WHITELIST = '/wp-content/uploads/2026/04/';

$root = dirname(__DIR__);
$imgDir = $root . '/public/images';
$dataDir = $root . '/database/seeders/data';
@mkdir($imgDir, 0755, true);
@mkdir($dataDir, 0755, true);

function get(string $url): string
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_USERAGENT => 'SiteRebuild/1.0 (content migration)',
    ]);
    $body = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($body === false || $code >= 400) {
        fwrite(STDERR, "FAIL {$code} {$url}\n");
        return '';
    }
    return $body;
}

function getJson(string $url): array
{
    return json_decode(get($url), true) ?: [];
}

/**
 * Clean WP markup: strip comments, data-* / WP attrs, empty junk,
 * rewrite whitelisted image srcs to local /images/ paths.
 * Returns [cleanedHtml, imageUrls[], externalLinks[]]
 */
function cleanHtml(string $html, array &$images, array &$extLinks): string
{
    $images = $extLinks = [];

    $dom = new DOMDocument('1.0', 'UTF-8');
    libxml_use_internal_errors(true);
    $dom->loadHTML('<?xml encoding="UTF-8"><div id="__root">' . $html . '</div>',
        LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    // strip HTML comments (wp-block markers etc.)
    $xpath = new DOMXPath($dom);
    foreach (iterator_to_array($xpath->query('//comment()')) as $c) {
        $c->parentNode->removeChild($c);
    }

    foreach (iterator_to_array($dom->getElementsByTagName('img')) as $img) {
        /** @var DOMElement $img */
        $src = $img->getAttribute('src');
        if ($src !== '') {
            $images[] = $src;
            if (str_contains($src, UPLOADS_WHITELIST)) {
                $img->setAttribute('src', '/images/' . basename($src));
            }
        }
        // drop WP-specific attrs on images
        foreach (['srcset', 'sizes', 'decoding', 'loading', 'class'] as $a) {
            if ($img->hasAttribute($a)) {
                $img->removeAttribute($a);
            }
        }
    }

    foreach (iterator_to_array($dom->getElementsByTagName('a')) as $a) {
        /** @var DOMElement $a */
        $href = $a->getAttribute('href');
        if ($href === '') {
            continue;
        }
        $host = parse_url($href, PHP_URL_HOST);
        if ($host && !str_ends_with($host, 'example.com')) {
            $extLinks[] = $href;
        } elseif ($host) {
            // internal link -> root-relative path so slugs map 1:1
            $a->setAttribute('href', parse_url($href, PHP_URL_PATH) ?: '/');
        }
    }

    // remove injected spam: off-screen positioned elements + casino/spam links
    $spamHost = '/casino|poker|slots?|bet(?!ter)|vegash?ero|spin(?!ning)|gambl|jackpot|roulette/i';
    foreach (iterator_to_array($xpath->query('//*[@style]')) as $el) {
        /** @var DOMElement $el */
        $style = $el->getAttribute('style');
        if (preg_match('/(?:left|top|right)\s*:\s*-\d{3,}px/i', $style)
            || preg_match('/text-indent\s*:\s*-\d{3,}/i', $style)) {
            $el->parentNode->removeChild($el);
        }
    }
    foreach (iterator_to_array($dom->getElementsByTagName('a')) as $a) {
        /** @var DOMElement $a */
        $host = parse_url($a->getAttribute('href'), PHP_URL_HOST) ?? '';
        if ($host !== '' && preg_match($spamHost, $host)) {
            $a->parentNode->removeChild($a);
        }
    }

    // strip script/style/iframes and data-* + aria animation attrs
    foreach (['script', 'style', 'iframe', 'noscript'] as $tag) {
        foreach (iterator_to_array($dom->getElementsByTagName($tag)) as $n) {
            $n->parentNode->removeChild($n);
        }
    }
    foreach (iterator_to_array($dom->getElementsByTagName('*')) as $el) {
        /** @var DOMElement $el */
        foreach (iterator_to_array($el->attributes) as $attr) {
            /** @var DOMAttr $attr */
            if (str_starts_with($attr->name, 'data-') || str_starts_with($attr->name, 'on')) {
                $el->removeAttribute($attr->name);
            }
        }
    }

    $out = $dom->saveHTML($xpath->query('//div[@id="__root"]')->item(0));
    $out = preg_replace('/^<div id="__root">|<\/div>$/', '', $out);
    // collapse whitespace-only paragraphs left by malformed WP markup
    $out = preg_replace('/<p>\s*<\/p>/', '', $out);
    return trim($out);
}

// ---------------------------------------------------------------- pages
echo "Fetching pages...\n";
$pages = getJson(BASE . '/wp-json/wp/v2/pages?per_page=50');
usort($pages, fn($a, $b) => $a['menu_order'] <=> $b['menu_order']);

$allImages = [];
$seed = [];
$warnings = [];

foreach ($pages as $p) {
    $slug = $p['slug'];
    $imgs = $links = [];
    $html = cleanHtml($p['content']['rendered'], $imgs, $links);
    $allImages = array_merge($allImages, $imgs);

    // flag images outside the whitelist window
    foreach ($imgs as $u) {
        if (!str_contains($u, UPLOADS_WHITELIST)) {
            $warnings[] = "non-whitelist image on /{$slug}: {$u}";
        }
    }
    // flag suspicious external links (casino/pharma injection pattern)
    foreach ($links as $l) {
        $warnings[] = "external link on /{$slug}: {$l}";
    }

    $seed[] = [
        'wp_id' => $p['id'],
        'slug' => $slug,
        'title' => html_entity_decode($p['title']['rendered'] ?? '', ENT_QUOTES),
        'menu_order' => $p['menu_order'] ?? 0,
        'meta' => [
            'title' => $p['yoast_head_json']['title'] ?? null,
            'description' => $p['yoast_head_json']['description'] ?? null,
            'canonical' => $p['yoast_head_json']['canonical'] ?? null,
        ],
        'html' => $html,
    ];
    echo "  /{$slug}  (" . strlen($html) . " bytes, " . count($imgs) . " imgs)\n";
}

// ------------------------------------------------- theme images (logo etc.)
echo "Scanning homepage for theme images...\n";
$home = get(BASE . '/');
if ($home !== '') {
    // The home page's real markup lives in the WP theme template, not
    // content.rendered — keep the rendered HTML as a Stage 3 reference.
    file_put_contents($dataDir . '/home-rendered.html', $home);
}
$themeImages = [];
if (preg_match_all('#(?:src|href)=["\'](https?://example\.com/[^"\']+\.(?:png|jpe?g|webp|svg|ico))[^"\']*["\']#i', $home, $m)) {
    foreach ($m[1] as $u) {
        if (str_contains($u, '/wp-content/themes/') || str_contains($u, UPLOADS_WHITELIST)) {
            $themeImages[] = strtok($u, '?');
        }
    }
}
// css background images in theme stylesheet / inline styles
if (preg_match_all('#url\((https?://example\.com/[^)]+\.(?:png|jpe?g|webp))\)#i', $home, $m2)) {
    foreach ($m2[1] as $u) {
        $themeImages[] = strtok($u, '?');
    }
}
$themeImages = array_values(array_unique($themeImages));

// ---------------------------------------------------------------- download
$download = [];
foreach ($allImages as $u) {
    if (str_contains($u, UPLOADS_WHITELIST)) {
        $download[$u] = basename($u);
    }
}
foreach ($themeImages as $u) {
    $download[$u] = basename($u);
}

echo "Downloading " . count($download) . " whitelisted images...\n";
$manifest = [];
foreach ($download as $url => $file) {
    $dest = $imgDir . '/' . $file;
    if (!file_exists($dest)) {
        $bin = get($url);
        if ($bin === '') {
            $warnings[] = "download failed: {$url}";
            continue;
        }
        file_put_contents($dest, $bin);
    }
    $manifest[] = ['source' => $url, 'file' => $file, 'bytes' => filesize($dest)];
    echo "  {$file}\n";
}

file_put_contents($dataDir . '/pages.json', json_encode($seed, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
file_put_contents($dataDir . '/media-manifest.json', json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
file_put_contents($dataDir . '/theme-image-urls.json', json_encode($themeImages, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

echo "\n=== WARNINGS (" . count($warnings) . ") ===\n";
foreach (array_unique($warnings) as $w) {
    echo "  ! {$w}\n";
}
echo "\nDone: " . count($seed) . " pages, " . count($manifest) . " images.\n";
