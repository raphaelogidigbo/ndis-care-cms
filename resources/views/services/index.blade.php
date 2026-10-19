@extends('layouts.app')

@section('title', ($page?->meta_title ?: 'Our Services') . ' | Harbourview Care Services')
@if ($page?->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    {{-- Page hero --}}
    <section class="relative">
        <img src="{{ asset('images/stock-painting-workshop.jpg') }}" alt="Participants enjoying a group activity session"
             class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
            <nav aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-2 text-sm text-cream/70">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                    <li aria-hidden="true">/</li>
                    <li class="font-medium text-cream" aria-current="page">{{ $page?->title ?? 'Our Services' }}</li>
                </ol>
            </nav>
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Our Services</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                {{ $page?->title ?? 'Our Services' }}
            </h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">
                NDIS supports designed around your goals — at home, in the community, and everywhere in between.
            </p>
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

    <section class="mx-auto w-full max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($services as $service)
                <a href="{{ route('page.show', $service->slug) }}" class="group flex flex-col overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-forest/5 transition-shadow hover:shadow-lg">
                    @if ($service->card_image)
                        <img src="{{ asset('images/'.$service->card_image) }}" alt="{{ $service->title }}"
                             class="aspect-[16/10] w-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy">
                    @endif
                    <div class="flex flex-1 flex-col p-6">
                        <h2 class="font-display text-xl font-semibold">{{ $service->title }}</h2>
                        @if ($service->excerpt)
                            <p class="mt-2 flex-1 text-sm leading-relaxed text-forest/70">{{ $service->excerpt }}</p>
                        @endif
                        <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-coral">
                            Learn more
                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h9.5M9 4.5 12.5 8 9 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
