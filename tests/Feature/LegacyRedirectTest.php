<?php

namespace Tests\Feature;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class LegacyRedirectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Send a request through the real HTTP kernel. `$this->get()` cannot be
     * used for trailing-slash URLs because `prepareUrlForRequest()` trims
     * the slash before the request ever reaches middleware.
     */
    private function kernelGet(string $uri): Response
    {
        // Pass the raw URI — url() would trim the trailing slash before
        // the request is even created.
        return $this->app->make(Kernel::class)->handle(
            Request::create($uri, 'GET'),
        );
    }

    public function test_trailing_slash_redirects_to_canonical_slug(): void
    {
        $this->seed();

        $response = $this->kernelGet('/about-us/');
        $this->assertSame(301, $response->getStatusCode());
        $this->assertSame(url('/about-us'), $response->headers->get('Location'));

        $response = $this->kernelGet('/household-tasks-support/');
        $this->assertSame(301, $response->getStatusCode());
        $this->assertSame(url('/household-tasks-support'), $response->headers->get('Location'));
    }

    public function test_home_slug_redirects_to_root(): void
    {
        $this->seed();

        $this->get('/home')->assertRedirect('/');
    }

    public function test_index_php_prefix_redirects(): void
    {
        $this->get('/index.php')->assertRedirect('/');
        $this->get('/index.php/about-us')->assertRedirect('/about-us');
    }

    public function test_whitelisted_wp_upload_redirects_to_local_image(): void
    {
        $this->get('/wp-content/uploads/2026/04/logo.png')
            ->assertRedirect('/images/logo.png');
    }

    public function test_non_whitelisted_wp_upload_returns_404(): void
    {
        $this->get('/wp-content/uploads/2026/04/casino-banner.jpg')
            ->assertNotFound();
    }

    public function test_wp_machinery_paths_return_404(): void
    {
        foreach (['/feed/', '/feed', '/comments/feed/', '/xmlrpc.php', '/wp-login.php', '/wp-admin/', '/wp-json/wp/v2/pages', '/wp-includes/js/jquery.js'] as $path) {
            $response = $this->get($path);
            $this->assertSame(404, $response->status(), "Path {$path} returned {$response->status()}");
        }
    }

    public function test_upload_path_outside_whitelist_window_still_redirects_when_file_exists(): void
    {
        $this->get('/wp-content/uploads/2025/01/logo.png')
            ->assertRedirect('/images/logo.png');
    }

    public function test_redirect_preserves_query_string(): void
    {
        $this->seed();

        $response = $this->kernelGet('/about-us/?utm_source=test');

        $this->assertSame(301, $response->getStatusCode());
        $this->assertSame(
            url('/about-us').'?utm_source=test',
            $response->headers->get('Location'),
        );
    }
}
