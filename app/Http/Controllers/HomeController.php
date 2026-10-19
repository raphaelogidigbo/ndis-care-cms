<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Six services featured on the homepage, in developer-brief order.
     *
     * @var array<int, string>
     */
    private const FEATURED = [
        'personal-activities-support',
        'community-participation',
        'community-nursing-care',
        'life-skills-development',
        'household-tasks-support',
        'shared-living-support',
    ];

    /**
     * Brief-approved card copy, keyed by service slug.
     *
     * @var array<string, array{title: string, excerpt: string}>
     */
    private const FEATURED_COPY = [
        'personal-activities-support' => [
            'title' => 'Personal Activities',
            'excerpt' => 'Respectful assistance with personal care and everyday routines while supporting dignity, choice and independence.',
        ],
        'community-participation' => [
            'title' => 'Community Participation',
            'excerpt' => 'Support to get out, connect with others, attend activities and participate in the community with confidence.',
        ],
        'community-nursing-care' => [
            'title' => 'Community Nursing',
            'excerpt' => 'Professional nursing support delivered according to individual health needs and care requirements.',
        ],
        'life-skills-development' => [
            'title' => 'Life Skills Development',
            'excerpt' => 'Practical support to develop everyday skills such as cooking, planning, communication and greater independence.',
        ],
        'household-tasks-support' => [
            'title' => 'Household Tasks',
            'excerpt' => 'Practical assistance to help participants maintain a safe, comfortable and organised home environment.',
        ],
        'shared-living-support' => [
            'title' => 'Shared Living Support',
            'excerpt' => 'Individualised support with daily routines, household responsibilities and greater independence at home.',
        ],
    ];

    public function __invoke(): View
    {
        return view('home', [
            'services' => Service::published()->whereIn('slug', self::FEATURED)->get()
                ->sortBy(fn (Service $service): int => array_search($service->slug, self::FEATURED)),
            'featuredCopy' => self::FEATURED_COPY,
            'testimonials' => Testimonial::published()->latest()->limit(6)->get(),
            'page' => Page::published()->where('slug', 'home')->first(),
        ]);
    }
}
