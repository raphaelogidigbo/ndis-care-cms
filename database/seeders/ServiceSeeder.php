<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Support\WpContentCleaner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Service slugs in Services-dropdown order.
     *
     * @var array<int, string>
     */
    private const SLUGS = [
        'household-tasks-support',
        'community-participation',
        'community-nursing-care',
        'group-activities',
        'life-skills-development',
        'innovative-community-participation',
        'personal-activities-support',
        'shared-living-support',
        'transport-assistance',
    ];

    /**
     * Card/hero images per service slug, from the vetted public/images whitelist.
     * Overrides the first-content-image fallback; editable in Filament.
     *
     * @var array<string, string>
     */
    private const CARD_IMAGES = [
        'household-tasks-support' => 'serv-img01.jpg',
        'community-participation' => 'stock-participant-group.jpg',
        'community-nursing-care' => 'Community-Nursing-Care-5.png',
        'group-activities' => 'serv-img30.jpg',
        'life-skills-development' => 'gallery-img02.jpg',
        'innovative-community-participation' => 'Personal-Activities-Support-ndis-6.png',
        'personal-activities-support' => 'stock-hair-treatment.jpg',
        'shared-living-support' => 'stock-housemates-breakfast.jpg',
        'transport-assistance' => 'gallery-img03.jpg',
    ];

    /**
     * Whitelisted card icons, reused across the nine services. Editable in Filament.
     *
     * @var array<string, string>
     */
    private const ICONS = [
        'household-tasks-support' => '/images/serv-icon01.png',
        'community-participation' => '/images/serv-icon02.png',
        'community-nursing-care' => '/images/serv-icon03.png',
        'group-activities' => '/images/serv-icon04.png',
        'life-skills-development' => '/images/serv-icon05.png',
        'innovative-community-participation' => '/images/serv-icon06.png',
        'personal-activities-support' => '/images/serv-icon07.png',
        'shared-living-support' => '/images/serv-icon08.png',
        'transport-assistance' => '/images/serv-icon01.png',
    ];

    public function run(): void
    {
        $cleaner = new WpContentCleaner;
        $entries = collect($this->entries())->keyBy('slug');

        foreach (self::SLUGS as $index => $slug) {
            $entry = $entries->get($slug);

            if ($entry === null) {
                continue;
            }

            $html = $cleaner->clean($entry['html']);

            Service::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $entry['title'],
                    'excerpt' => Str::limit($cleaner->firstParagraphText($html), 180),
                    'card_image' => self::CARD_IMAGES[$slug] ?? $cleaner->firstContentImage($html),
                    'icon' => self::ICONS[$slug] ?? null,
                    'content_html' => $html,
                    'meta_title' => $entry['meta']['title'] ?? null,
                    'meta_description' => $entry['meta']['description'] ?? null,
                    'sort_order' => $index + 1,
                    'is_published' => true,
                ],
            );
        }
    }

    /**
     * @return array<int, array{slug: string, title: string, html: string, meta: array<string, string|null>}>
     */
    private function entries(): array
    {
        return json_decode(
            file_get_contents(database_path('seeders/data/pages.json')),
            true,
            flags: JSON_THROW_ON_ERROR,
        );
    }
}
