<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;
use Illuminate\Contracts\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('services.index', [
            'services' => Service::published()->ordered()->get(),
            'page' => Page::published()->where('slug', 'services')->first(),
        ]);
    }
}
