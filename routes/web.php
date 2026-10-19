<?php

use App\Http\Controllers\Forms\CareersSubmissionController;
use App\Http\Controllers\Forms\ContactSubmissionController;
use App\Http\Controllers\Forms\FeedbackSubmissionController;
use App\Http\Controllers\Forms\ReferralSubmissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('/', HomeController::class)->name('home');

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::middleware([ProtectAgainstSpam::class, 'throttle:5,1'])->group(function (): void {
    Route::post('/contact-us', ContactSubmissionController::class)->name('contact.store');
    Route::post('/referrals', ReferralSubmissionController::class)->name('referrals.store');
    Route::post('/feedback', FeedbackSubmissionController::class)->name('feedback.store');
    Route::post('/careers', CareersSubmissionController::class)->name('careers.store');
});

Route::get('/{slug}', [PageController::class, 'show'])
    ->where('slug', '(?!admin$|filament$)[a-z0-9]+(?:-[a-z0-9]+)*')
    ->name('page.show');
