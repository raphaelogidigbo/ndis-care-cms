<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\SdaListing;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicSiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders(): void
    {
        $this->seed();

        $this->get('/')
            ->assertOk()
            ->assertSee('Harbourview Care Services')
            ->assertSee('0000000000');
    }

    public function test_all_seeded_page_and_service_slugs_resolve(): void
    {
        $this->seed();

        // 'home' 301-redirects to '/' by design (covered in LegacyRedirectTest)
        $slugs = array_merge(
            Page::whereNot('slug', 'home')->pluck('slug')->all(),
            Service::pluck('slug')->all(),
        );

        foreach ($slugs as $slug) {
            $response = $this->get('/'.$slug);
            $this->assertSame(200, $response->status(), "Slug /{$slug} returned {$response->status()}");
        }
    }

    public function test_services_index_lists_all_published_services(): void
    {
        $this->seed();

        $response = $this->get('/services')->assertOk();

        foreach (Service::published()->get() as $service) {
            $response->assertSee($service->title);
        }
    }

    public function test_slug_route_does_not_swallow_admin(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_unknown_slug_returns_404(): void
    {
        $this->seed();

        $this->get('/this-page-does-not-exist')->assertNotFound();
    }

    public function test_footer_contains_trust_information(): void
    {
        $this->seed();

        $this->get('/')
            ->assertOk()
            ->assertSee('ABN 12 345 678 901', false)
            ->assertSee('0000000000')
            ->assertSee('(08) 9000 0000')
            ->assertSee('info@example.com');
    }

    public function test_navigation_links_render_for_all_nav_pages(): void
    {
        $this->seed();

        $response = $this->get('/')->assertOk();

        foreach (Page::menuOrdered()
            ->whereNotIn('slug', ['home', 'thank-you', 'privacy-policy', 'terms-of-use'])
            ->get() as $page) {
            $response->assertSee($page->title);
        }
    }

    public function test_legal_pages_resolve_and_are_linked_in_footer(): void
    {
        $this->seed();

        $this->get('/privacy-policy')
            ->assertOk()
            ->assertSee('Australian Privacy Principles')
            ->assertSee('info@example.com');

        $this->get('/terms-of-use')
            ->assertOk()
            ->assertSee('Terms of Use');

        $this->get('/')
            ->assertOk()
            ->assertSee(route('page.show', 'privacy-policy'), false)
            ->assertSee(route('page.show', 'terms-of-use'), false);
    }

    public function test_legal_pages_are_excluded_from_navigation(): void
    {
        $this->seed();

        $content = $this->get('/')->assertOk()->getContent();

        preg_match_all(
            '/<nav[^>]*aria-label="[^"]*avigation"[^>]*>.*?<\/nav>/s',
            $content,
            $navBlocks,
        );

        $this->assertNotEmpty($navBlocks[0]);

        foreach ($navBlocks[0] as $nav) {
            $this->assertStringNotContainsString('privacy-policy', $nav);
            $this->assertStringNotContainsString('terms-of-use', $nav);
        }
    }

    public function test_faq_renders_alpine_accordion(): void
    {
        $this->seed();

        $this->get('/faq')
            ->assertOk()
            ->assertSee('x-data', false)
            ->assertSee('aria-expanded', false)
            ->assertSee('Do you provide NDIS support services in Melbourne?');
    }

    public function test_bespoke_inner_pages_render_their_sections(): void
    {
        $this->seed();

        $this->get('/about-us')->assertOk()->assertSee('Faith. Compassion. Dignity.');
        $this->get('/why-us')->assertOk()->assertSee('Values-Driven Care');
        $this->get('/referrals')->assertOk()->assertSee('aria-label="Participant referral form"', false);
        $this->get('/contact-us')->assertOk()->assertSee('34 Melbourne Road', false);
        $this->get('/feedback')->assertOk()->assertSee('1800 035 544');
        $this->get('/careers')->assertOk()->assertSee('hr@example.com');
    }

    public function test_forms_link_to_privacy_policy(): void
    {
        $this->seed();

        foreach (['contact-us', 'referrals', 'feedback', 'careers'] as $slug) {
            $this->get('/'.$slug)
                ->assertOk()
                ->assertSee('By submitting this form you agree to our', false)
                ->assertSee(route('page.show', 'privacy-policy'), false);
        }
    }

    public function test_form_page_renders_form_not_marker(): void
    {
        $this->seed();

        $this->get('/contact-us')
            ->assertOk()
            ->assertDontSee('<!-- form:contact -->', false)
            ->assertSee('aria-label="Contact form"', false);
    }

    public function test_page_meta_title_used_when_set(): void
    {
        $this->seed();

        $page = Page::where('slug', 'about-us')->firstOrFail();
        $page->update(['meta_title' => 'All About Harbourview']);

        $this->get('/about-us')->assertOk()->assertSee('All About Harbourview', false);
    }

    public function test_thank_you_page_renders(): void
    {
        $this->seed();

        $this->get('/thank-you')
            ->assertOk()
            ->assertSee('Thank you');
    }

    public function test_unpublished_page_returns_404(): void
    {
        $this->seed();

        Page::where('slug', 'about-us')->update(['is_published' => false]);

        $this->get('/about-us')->assertNotFound();
    }

    public function test_high_intensity_service_page_renders(): void
    {
        $this->seed();

        $this->get('/assist-personal-activities-high')
            ->assertOk()
            ->assertSee('Assist Personal Activities (High Intensity)')
            ->assertSee('PEG', false);
    }

    public function test_sda_page_lists_published_vacancies(): void
    {
        $this->seed();

        $this->get('/specialist-disability-accommodation')
            ->assertOk()
            ->assertSee('Current Vacancies')
            ->assertSee('Melbourne Accessible Villa')
            ->assertSee('Gosnells');
    }

    public function test_sda_page_hides_unpublished_vacancies(): void
    {
        $this->seed();

        SdaListing::where('title', 'Melbourne Accessible Villa')
            ->update(['is_published' => false]);

        $this->get('/specialist-disability-accommodation')
            ->assertOk()
            ->assertDontSee('Melbourne Accessible Villa');
    }
}
