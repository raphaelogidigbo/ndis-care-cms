@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    {{-- Page hero --}}
    <section class="relative">
        <img src="{{ asset('images/stock-ndis-3.jpg') }}" alt="An NDIS participant meeting with a support coordinator"
             class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
            @include('partials.breadcrumbs', ['dark' => true])
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">NDIS</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                What is the NDIS?
            </h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">
                The National Disability Insurance Scheme (NDIS), established in 2013, aims to support individuals
                under 65 with permanent and significant disabilities — providing funding tailored to your needs
                so you can live the life you desire.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="tel:0890000000" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Call (08) 9000 0000
                </a>
                <a href="{{ route('page.show', 'contact-us') }}" class="inline-flex items-center rounded-full border-2 border-cream px-7 py-3.5 font-semibold text-cream transition-colors hover:bg-cream hover:text-forest">
                    Contact Us
                </a>
            </div>
        </div>
        <p class="font-hand pointer-events-none absolute bottom-6 right-8 hidden rotate-[-3deg] text-3xl text-white drop-shadow-[0_2px_4px_rgba(0,0,0,0.6)] lg:block">
            Your plan. Your life. Your choice.
        </p>
    </section>

    {{-- Three info cards --}}
    <section class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="grid gap-6 lg:grid-cols-3">
            <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-forest/5">
                <h2 class="font-display text-xl font-semibold">What supports will the NDIS fund?</h2>
                <p class="mt-3 text-sm leading-relaxed text-forest/70">
                    NDIS funding can be used for a variety of services, including:
                </p>
                <ul class="mt-5 flex flex-wrap gap-2">
                    @foreach (['Accommodation', 'Employment', 'Outdoor activities', 'Allied health services', 'Daily personal activities', 'Mobility equipment', 'Community access'] as $item)
                        <li class="rounded-full bg-cream-dark/50 px-3.5 py-1.5 text-sm font-medium text-forest">{{ $item }}</li>
                    @endforeach
                    <li class="rounded-full bg-coral/10 px-3.5 py-1.5 text-sm font-semibold text-coral">And more!</li>
                </ul>
            </div>

            <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-forest/5">
                <h2 class="font-display text-xl font-semibold">How can the NDIS support me?</h2>
                <p class="mt-3 text-sm leading-relaxed text-forest/70">
                    The NDIS offers support through various means:
                </p>
                <ul class="mt-5 space-y-3">
                    @foreach ([
                        'Information and connections to community services such as doctors and schools',
                        'Access to government funding if you qualify',
                        'Assistance accessing mainstream services like the health system',
                        'A personalised plan based on your unique needs and goals',
                    ] as $item)
                        <li class="flex items-start gap-3 text-sm leading-relaxed text-forest/80">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-coral/15" aria-hidden="true">
                                <svg class="h-3 w-3 text-coral" viewBox="0 0 14 14" fill="none"><path d="m3 7.5 2.5 2.5L11 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-forest/5">
                <h2 class="font-display text-xl font-semibold">Am I eligible for the NDIS?</h2>
                <p class="mt-3 text-sm leading-relaxed text-forest/70">
                    Eligibility depends on several factors:
                </p>
                <ul class="mt-5 space-y-4">
                    <li class="text-sm leading-relaxed text-forest/80">
                        <strong class="font-semibold text-forest">Age</strong> — between 7 and 65 years old
                    </li>
                    <li class="text-sm leading-relaxed text-forest/80">
                        <strong class="font-semibold text-forest">Residency</strong> — Australian citizen, permanent resident, or Protected Special Category Visa holder
                    </li>
                    <li class="text-sm leading-relaxed text-forest/80">
                        <strong class="font-semibold text-forest">Disability</strong> — a disability resulting from a permanent impairment
                    </li>
                    <li class="text-sm leading-relaxed text-forest/80">
                        <strong class="font-semibold text-forest">Early intervention</strong> — you may qualify for support now if it can reduce future needs
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- Help band --}}
    <section class="bg-forest">
        <div class="mx-auto w-full max-w-3xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
            <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                Need more support and guidance?
            </h2>
            <p class="mt-4 leading-relaxed text-cream/85">
                If you require further assistance in setting up and managing your NDIS plan, we are here to help.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="{{ route('page.show', 'contact-us') }}" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Contact Us
                </a>
                <a href="tel:0890000000" class="inline-flex items-center rounded-full border-2 border-cream px-7 py-3.5 font-semibold text-cream transition-colors hover:bg-cream hover:text-forest">
                    Call (08) 9000 0000
                </a>
            </div>
            <p class="mt-8 border-t border-cream/15 pt-6 text-sm leading-relaxed text-cream/70">
                For more information visit
                <a href="https://www.ndis.gov.au" target="_blank" rel="noopener" class="font-semibold text-coral hover:text-coral-dark">www.ndis.gov.au</a>
                or phone the NDIS on
                <a href="tel:1800800110" class="font-semibold text-coral hover:text-coral-dark">1800 800 110</a>.
            </p>
        </div>
    </section>
@endsection
