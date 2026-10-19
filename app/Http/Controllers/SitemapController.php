<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Symfony\Component\HttpFoundation\Response;

class SitemapController extends Controller
{
    /**
     * Slugs that must never appear in the sitemap: 'home' is a duplicate
     * of '/' and 'thank-you' is a noindexed form completion target.
     *
     * @var array<int, string>
     */
    private const EXCLUDED_SLUGS = ['home', 'thank-you'];

    public function __invoke(Request $request): Response
    {
        $sitemap = Cache::remember('sitemap.xml', now()->addHour(), function (): string {
            $sitemap = Sitemap::create()
                ->add(Url::create(route('home')))
                ->add(Url::create(route('services.index')));

            Page::published()
                ->whereNotIn('slug', self::EXCLUDED_SLUGS)
                ->get()
                ->each(function (Page $page) use ($sitemap): void {
                    $sitemap->add(
                        Url::create(route('page.show', $page->slug))
                            ->setLastModificationDate($page->updated_at)
                    );
                });

            Service::published()
                ->get()
                ->each(function (Service $service) use ($sitemap): void {
                    $sitemap->add(
                        Url::create(route('page.show', $service->slug))
                            ->setLastModificationDate($service->updated_at)
                    );
                });

            return $sitemap->render();
        });

        return response($sitemap, 200, ['Content-Type' => 'application/xml']);
    }
}
