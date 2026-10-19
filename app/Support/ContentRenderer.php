<?php

namespace App\Support;

use DOMDocument;
use DOMXPath;
use Illuminate\Support\HtmlString;

class ContentRenderer
{
    /**
     * Render seeded page/service HTML, replacing `<!-- form:* -->` slot
     * markers left by the WP content cleaner with the matching form partials.
     */
    public static function render(string $html): HtmlString
    {
        $rendered = preg_replace_callback(
            '/<!-- form:(contact|referral|feedback|careers) -->/',
            fn (array $matches): string => view("forms.{$matches[1]}")->render(),
            $html,
        );

        return new HtmlString($rendered ?? $html);
    }

    /**
     * Extract question/answer pairs from the seeded Bootstrap accordion
     * markup so the FAQ page can render an Alpine-powered accordion.
     *
     * @return array<int, array{question: string, answer: HtmlString}>
     */
    public static function accordionItems(string $html): array
    {
        $dom = new DOMDocument;
        $useInternalErrors = libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8" ?>'.$html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        libxml_use_internal_errors($useInternalErrors);
        $xpath = new DOMXPath($dom);

        $items = [];

        foreach ($xpath->query('//div[contains(@class,"accordion-item")]') as $item) {
            $question = $xpath->query('.//button[contains(@class,"accordion-button")]', $item)->item(0);
            $answer = $xpath->query('.//div[contains(@class,"accordion-body")]', $item)->item(0);

            if ($question === null || $answer === null) {
                continue;
            }

            $answerHtml = '';
            foreach ($answer->childNodes as $child) {
                $answerHtml .= $dom->saveHTML($child);
            }

            $items[] = [
                'question' => trim($question->textContent),
                'answer' => new HtmlString(trim($answerHtml)),
            ];
        }

        return $items;
    }
}
