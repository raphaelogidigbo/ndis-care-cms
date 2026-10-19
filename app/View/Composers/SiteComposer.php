<?php

namespace App\View\Composers;

use App\Models\Page;
use App\Models\Service;
use Illuminate\Contracts\View\View;

class SiteComposer
{
    /**
     * Provide nav items to the public layout on every public page.
     */
    public function compose(View $view): void
    {
        $view->with([
            'navPages' => Page::published()->menuOrdered()
                ->whereNotIn('slug', ['home', 'thank-you', 'privacy-policy', 'terms-of-use'])
                ->get(),
            'navServices' => Service::published()->ordered()->get(),
        ]);
    }
}
