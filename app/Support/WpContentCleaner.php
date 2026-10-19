<?php

namespace App\Support;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;

class WpContentCleaner
{
    /**
     * Compromised/absent uploads rewritten to whitelisted images on disk.
     *
     * @var array<string, string>
     */
    private const IMAGE_SUBSTITUTIONS = [
        'serv-img40.jpg' => 'about-us-4.png',
    ];

    /**
     * Clean captured WordPress HTML for storage in content_html.
     *
     * Replaces dead CF7 form markup with <!-- form:{marker} --> slot comments
     * and removes or rewrites <img> tags pointing at files that are not in
     * public/images (the compromised uploads never crossed over).
     */
    public function clean(string $html, ?string $formMarker = null): string
    {
        if (trim($html) === '') {
            return '';
        }

        $document = new DOMDocument('1.0', 'UTF-8');

        $previousErrors = libxml_use_internal_errors(true);
        $document->loadHTML('<?xml encoding="utf-8"?><div id="wp-root">'.$html.'</div>');
        libxml_clear_errors();
        libxml_use_internal_errors($previousErrors);

        $root = $document->getElementById('wp-root');

        if (! $root instanceof DOMElement) {
            return $html;
        }

        $xpath = new DOMXPath($document);

        foreach ($this->nodes($xpath, '//*[contains(concat(" ", normalize-space(@class), " "), " wpcf7 ")]') as $formDiv) {
            $marker = $formMarker !== null
                ? $document->createComment(' form:'.$formMarker.' ')
                : $document->createComment(' form removed ');

            $formDiv->parentNode?->replaceChild($marker, $formDiv);
        }

        // Trailing CTA sections are replaced by the templates' own CTA bands.
        foreach ($this->nodes($xpath, '//*[contains(concat(" ", normalize-space(@class), " "), " inner_cta_sec ")]') as $ctaSection) {
            $ctaSection->parentNode?->removeChild($ctaSection);
        }

        // Legacy Call/Email button rows — every page renders its own hero CTAs.
        foreach ($this->nodes($xpath, '//ul[contains(concat(" ", normalize-space(@class), " "), " d-flex ")]') as $buttonRow) {
            $buttonRow->parentNode?->removeChild($buttonRow);
        }

        // Headings are already bold — unwrap <strong>/<b> inside them to
        // avoid partial-word bolding artifacts like "Practical Support".
        foreach ($this->nodes($xpath, '//h1//strong | //h2//strong | //h3//strong | //h4//strong | //h5//strong | //h6//strong | //h1//b | //h2//b | //h3//b | //h4//b | //h5//b | //h6//b') as $strong) {
            while ($strong->firstChild !== null) {
                $strong->parentNode?->insertBefore($strong->firstChild, $strong);
            }
            $strong->parentNode?->removeChild($strong);
        }

        foreach ($this->nodes($xpath, '//img[starts-with(@src, "/images/")]') as $img) {
            $file = basename($img->getAttribute('src'));

            if (file_exists(public_path('images/'.$file))) {
                continue;
            }

            if (isset(self::IMAGE_SUBSTITUTIONS[$file])) {
                $img->setAttribute('src', '/images/'.self::IMAGE_SUBSTITUTIONS[$file]);

                continue;
            }

            $container = $xpath->query(
                'ancestor-or-self::*[contains(concat(" ", normalize-space(@class), " "), " inner_img_sec ") or contains(concat(" ", normalize-space(@class), " "), " serv_img ")][1]',
                $img
            )->item(0);

            $target = $container instanceof DOMNode ? $container : $img;
            $target->parentNode?->removeChild($target);
        }

        $cleaned = '';
        foreach ($root->childNodes as $child) {
            $cleaned .= $document->saveHTML($child);
        }

        return $cleaned;
    }

    /**
     * First content image filename referenced in the (already cleaned) HTML,
     * skipping chrome assets like icons and logos.
     */
    public function firstContentImage(string $html): ?string
    {
        preg_match_all('/src="\/images\/([^"]+)"/', $html, $matches);

        if (empty($matches[1])) {
            return null;
        }

        foreach ($matches[1] as $file) {
            if (preg_match('/icon|logo|flag|favicon/i', $file) === 0) {
                return $file;
            }
        }

        return null;
    }

    /**
     * Text of the first paragraph in the (already cleaned) HTML.
     */
    public function firstParagraphText(string $html): ?string
    {
        if (preg_match('/<p[^>]*>(.*?)<\/p>/s', $html, $matches) !== 1) {
            return null;
        }

        $text = trim(html_entity_decode(strip_tags($matches[1])));

        return $text === '' ? null : $text;
    }

    /**
     * @return array<int, DOMElement>
     */
    private function nodes(DOMXPath $xpath, string $expression): array
    {
        $result = $xpath->query($expression);

        if ($result === false) {
            return [];
        }

        $nodes = [];

        foreach ($result as $node) {
            if ($node instanceof DOMElement) {
                $nodes[] = $node;
            }
        }

        return $nodes;
    }
}
