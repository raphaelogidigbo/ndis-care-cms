@extends('layouts.app')

@section('robots', 'noindex, nofollow')
@section('title', ($page->meta_title ?: 'Thank You') . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    <section class="mx-auto w-full max-w-2xl px-4 py-20 text-center sm:px-6 lg:px-8 lg:py-28">
        <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-coral/10">
            <svg class="h-10 w-10 text-coral" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="m5 12.5 4.5 4.5L19 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>

        <h1 class="font-display text-4xl font-semibold tracking-tight sm:text-5xl">Thank you</h1>
        <p class="mt-4 text-lg leading-relaxed text-forest/75">
            We've received your submission and will be in touch soon. If your enquiry is urgent,
            please call us on <a href="tel:0890000000" class="font-semibold text-coral hover:text-coral-dark">(08) 9000 0000</a>.
        </p>

        <div class="mt-8 flex flex-wrap justify-center gap-3">
            <a href="{{ route('home') }}" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                Back to Home
            </a>
            <a href="{{ route('services.index') }}" class="inline-flex items-center rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
                Explore Our Services
            </a>
        </div>
    </section>
@endsection
