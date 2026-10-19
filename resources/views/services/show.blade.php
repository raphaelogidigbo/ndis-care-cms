@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' | Harbourview Care Services')
@if ($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif

@section('content')
    {{-- Service hero --}}
    <section class="relative">
        @if ($service->card_image)
            <img src="{{ asset('images/'.$service->card_image) }}" alt="{{ $service->title }}"
                 class="absolute inset-0 h-full w-full object-cover">
        @endif
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
            <nav aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-2 text-sm text-cream/70">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                    <li aria-hidden="true">/</li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-white">Services</a></li>
                    <li aria-hidden="true">/</li>
                    <li class="font-medium text-cream" aria-current="page">{{ $service->title }}</li>
                </ol>
            </nav>
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Our Services</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                {{ $service->title }}
            </h1>
            @if ($service->excerpt)
                <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">{{ $service->excerpt }}</p>
            @endif
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('page.show', 'referrals') }}" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Make a Referral
                </a>
                <a href="tel:0890000000" class="inline-flex items-center rounded-full border-2 border-cream px-7 py-3.5 font-semibold text-cream transition-colors hover:bg-cream hover:text-forest">
                    Call (08) 9000 0000
                </a>
            </div>
        </div>
    </section>

    <article class="mx-auto w-full max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="site-content">
            {{ \App\Support\ContentRenderer::render($service->content_html) }}
        </div>
    </article>

    <section class="mx-auto w-full max-w-7xl px-4 pb-16 sm:px-6 lg:px-8">
        <div class="rounded-[2rem] bg-sand px-6 py-10 text-center sm:px-12">
            <h2 class="font-display text-2xl font-semibold tracking-tight sm:text-3xl">Interested in this support?</h2>
            <p class="mx-auto mt-2 max-w-lg text-forest/75">Make a referral online or call our team to talk it through.</p>
            <div class="mt-6 flex flex-wrap justify-center gap-3">
                <a href="{{ route('page.show', 'referrals') }}" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Make a Referral
                </a>
                <a href="tel:0890000000" class="inline-flex items-center rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
                    Call (08) 9000 0000
                </a>
            </div>
        </div>
    </section>
@endsection
