<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\SdaListing;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeding_creates_all_pages_and_services(): void
    {
        $this->seed();

        $this->assertSame(14, Page::count());
        $this->assertSame(11, Service::count());
        $this->assertSame(4, SdaListing::count());
    }

    public function test_seeded_content_has_no_cf7_markup(): void
    {
        $this->seed();

        $tables = [Page::query(), Service::query()];

        foreach ($tables as $query) {
            $this->assertSame(0, $query->where('content_html', 'like', '%wpcf7%')->count());
            $this->assertSame(0, $query->where('content_html', 'like', '%_wpcf7%')->count());
        }
    }

    public function test_form_pages_have_slot_markers(): void
    {
        $this->seed();

        $expected = [
            'contact-us' => '<!-- form:contact -->',
            'referrals' => '<!-- form:referral -->',
            'feedback' => '<!-- form:feedback -->',
            'careers' => '<!-- form:careers -->',
        ];

        foreach ($expected as $slug => $marker) {
            $this->assertStringContainsString(
                $marker,
                Page::where('slug', $slug)->value('content_html'),
                "Missing {$marker} on {$slug}",
            );
        }
    }

    public function test_compromised_image_is_substituted_on_careers_page(): void
    {
        $this->seed();

        $html = Page::where('slug', 'careers')->value('content_html');

        $this->assertStringContainsString('/images/about-us-4.png', $html);
        $this->assertStringNotContainsString('serv-img40', $html);
    }

    public function test_service_content_has_no_embedded_cta_or_button_rows(): void
    {
        $this->seed();

        foreach (Service::pluck('content_html') as $html) {
            $this->assertStringNotContainsString('inner_cta_sec', $html);
            $this->assertStringNotContainsString('d-flex', $html);
        }
    }

    public function test_all_seeded_images_exist_on_disk(): void
    {
        $this->seed();

        $missing = [];

        foreach (array_merge(
            Page::pluck('content_html')->all(),
            Service::pluck('content_html')->all(),
        ) as $html) {
            preg_match_all('/src="\/images\/([^"]+)"/', $html, $matches);

            foreach ($matches[1] as $file) {
                if (! file_exists(public_path('images/'.$file))) {
                    $missing[] = $file;
                }
            }
        }

        $this->assertSame([], $missing, 'Referenced images missing from public/images');
    }

    public function test_every_service_has_card_image_and_excerpt(): void
    {
        $this->seed();

        $this->assertSame(0, Service::whereNull('card_image')->count());
        $this->assertSame(0, Service::whereNull('excerpt')->orWhere('excerpt', '')->count());
    }

    public function test_pages_are_seeded_in_nav_order(): void
    {
        $this->seed();

        $this->assertSame(
            ['home', 'about-us', 'services', 'why-us', 'referrals', 'ndis', 'resources', 'faq', 'careers', 'feedback', 'contact-us', 'thank-you', 'privacy-policy', 'terms-of-use'],
            Page::orderBy('menu_order')->pluck('slug')->all(),
        );
    }
}
