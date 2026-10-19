<?php
// One-off: strip injected content from home-rendered.html reference file.
$f = dirname(__DIR__) . '/database/seeders/data/home-rendered.html';
$html = file_get_contents($f);

// 1. injected hidden spam block (style + remote-home-content div + rhc-item)
$html = preg_replace(
    '~<style>#remote-home-content-header_hidden.*?</div>\s*</div>~s',
    '',
    $html
);

// 2. norediam malware loader + dns-prefetch
$html = preg_replace('~<script[^>]*norediam\.com[^>]*></script>\s*~i', '', $html);
$html = preg_replace('~<link[^>]*norediam\.com[^>]*/>\s*~i', '', $html);

// 3. disable-devtool CDN script + inline anti-debug keydown blocker
$html = preg_replace('~<script[^>]*disable-devtool[^>]*></script>\s*~i', '', $html);
$html = preg_replace('~<script>\s*document\.onkeydown.*?</script>\s*~s', '', $html);

// 4. GoDaddy tccl tracker + LiteSpeed cache comment
$html = preg_replace('~<script>[^<]*_trf[qd].*?</script><script[^>]*tccl[^>]*></script>~s', '', $html);
$html = preg_replace('~<!--\s*Page supported by LiteSpeed Cache[^>]*-->\s*~', '', $html);

file_put_contents($f, $html);

// verify
$bad = ['norediam', 'katalogtestosteron', 'remote-home-content', 'rhc-item',
        'disable-devtool', '_trfq', 'tccl', 'wsimg', 'document.onkeydown'];
foreach ($bad as $b) {
    if (stripos($html, $b) !== false) {
        echo "STILL PRESENT: {$b}\n";
    }
}
echo 'sanitized: ' . substr_count($html, "\n") . " lines\n";
