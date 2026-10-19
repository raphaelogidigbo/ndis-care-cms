<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function show(string $slug): View
    {
        $page = Page::published()->where('slug', $slug)->first();

        if ($page !== null) {
            $view = view()->exists("pages.$slug") ? "pages.$slug" : 'pages.show';

            return view($view, [
                'page' => $page,
                ...$this->extraViewData($slug),
            ]);
        }

        $service = Service::published()->where('slug', $slug)->firstOrFail();

        $view = view()->exists("services.$slug") ? "services.$slug" : 'services.show';

        return view($view, ['service' => $service]);
    }

    /**
     * Extra data for bespoke page views that need database-backed content.
     *
     * @return array<string, mixed>
     */
    private function extraViewData(string $slug): array
    {
        return match ($slug) {
            'careers' => ['jobListings' => JobListing::open()->get()],
            default => [],
        };
    }
}
