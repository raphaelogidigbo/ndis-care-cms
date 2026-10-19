<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    public function test_sitemap_lists_published_pages_and_services(): void
    {
        $this->seed();

        $response = $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml');

        $response->assertSee(url('/').'<', false);
        $response->assertSee(route('services.index'), false);

        foreach (Page::published()->whereNotIn('slug', ['home', 'thank-you'])->get() as $page) {
            $response->assertSee(route('page.show', $page->slug), false);
        }

        foreach (Service::published()->get() as $service) {
            $response->assertSee(route('page.show', $service->slug), false);
        }
    }

    public function test_sitemap_excludes_thank_you_home_and_unpublished_content(): void
    {
        $this->seed();

        Page::where('slug', 'about-us')->update(['is_published' => false]);
        Service::where('slug', 'transport-assistance')->update(['is_published' => false]);
        Cache::forget('sitemap.xml');

        $response = $this->get('/sitemap.xml')->assertOk();

        $response->assertDontSee(url('/thank-you'), false);
        $response->assertDontSee(url('/home').'<', false);
        $response->assertDontSee(url('/about-us'), false);
        $response->assertDontSee(url('/transport-assistance'), false);
    }

    public function test_every_seeded_page_renders_title_description_and_canonical(): void
    {
        $this->seed();

        // 'home' is intentionally excluded — it 301-redirects to '/'
        // (see LegacyRedirectTest) rather than rendering.
        $slugs = array_merge(
            Page::whereNot('slug', 'home')->pluck('slug')->all(),
            Service::pluck('slug')->all(),
        );

        foreach ($slugs as $slug) {
            $content = $this->get('/'.$slug)->assertOk()->getContent();

            $this->assertMatchesRegularExpression(
                '/<title>[^<]{5,}<\/title>/',
                $content,
                "Slug /{$slug} has an empty <title>",
            );
            $this->assertMatchesRegularExpression(
                '/<meta name="description" content="[^"]{10,}">/',
                $content,
                "Slug /{$slug} has an empty meta description",
            );
            $this->assertMatchesRegularExpression(
                '/<link rel="canonical" href="[^"]+"/',
                $content,
                "Slug /{$slug} has no canonical link",
            );
        }
    }

    public function test_thank_you_page_is_noindexed(): void
    {
        $this->seed();

        $this->get('/thank-you')
            ->assertOk()
            ->assertSee('noindex, nofollow', false);
    }

    public function test_robots_txt_disallows_admin_and_references_sitemap(): void
    {
        // robots.txt is a static public/ file served by the web server —
        // it never reaches Laravel, so the file is asserted directly.
        $content = file_get_contents(public_path('robots.txt'));

        $this->assertStringContainsString('Disallow: /admin/', $content);
        $this->assertStringContainsString('Disallow: /filament/', $content);
        $this->assertStringContainsString('Sitemap: https://example.com/sitemap.xml', $content);
        $this->assertStringNotContainsString('Disallow: /thank-you', $content);
    }

    public function test_json_ld_block_renders_valid_local_business(): void
    {
        $this->seed();

        $content = $this->get('/')->assertOk()->getContent();

        preg_match(
            '/<script type="application\/ld\+json">(.*?)<\/script>/s',
            $content,
            $matches,
        );

        $this->assertNotEmpty($matches[1], 'No JSON-LD block found on the homepage');

        $json = json_decode($matches[1], true);

        $this->assertSame('LocalBusiness', $json['@type']);
        $this->assertSame('Harbourview Care Services', $json['name']);
        $this->assertSame('AU', $json['address']['addressCountry']);
    }

    public function test_og_tags_render_with_fallbacks(): void
    {
        $this->seed();

        $content = $this->get('/')->assertOk()->getContent();

        $this->assertMatchesRegularExpression('/<meta property="og:title" content="[^"]+"/', $content);
        $this->assertMatchesRegularExpression('/<meta property="og:description" content="[^"]{10,}"/', $content);
        $this->assertMatchesRegularExpression('/<meta property="og:image" content="[^"]+"/', $content);
        $this->assertMatchesRegularExpression('/<meta property="og:url" content="[^"]+"/', $content);
    }

    public function test_homepage_uses_home_page_meta(): void
    {
        $this->seed();

        $home = Page::where('slug', 'home')->firstOrFail();
        $home->update(['meta_title' => 'Custom Home Meta']);

        $this->get('/')->assertOk()->assertSee('Custom Home Meta', false);
    }
}
