@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' | Harbourview Care Services')
@if ($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif

@section('content')
    @include('partials.service-hero')

    {{-- Intro --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-pexels-kindel-8550826.jpg') }}" alt="A participant out for a drive with their support worker"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Transport Assistance</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Moving freely, living fully.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Access to reliable transport is more than just getting from one place to another — it's about
                freedom, independence and staying connected to the world around you.
            </p>
            <p class="mt-4 leading-relaxed text-forest/80">
                Our Transport Assistance ensures you can attend appointments, participate in community activities
                and manage daily responsibilities with ease and confidence.
            </p>
        </div>
    </section>

    {{-- How we support you --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">More Than Just a Ride</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Support throughout your journey.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    Our transport service is designed to support your lifestyle, not just your schedule — we provide
                    assistance throughout your journey so you feel safe, comfortable and supported every step of the way.
                </p>
                <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                    @foreach ([
                        'Travel to medical and healthcare appointments',
                        'Transport to community activities and social events',
                        'Grocery shopping and essential errands',
                        'School, work or day program transport',
                        'Support with entering/exiting vehicles safely',
                        'Accompanied transport when required',
                    ] as $item)
                        <li class="flex items-start gap-2.5 rounded-xl bg-white p-3 text-sm text-forest/80 ring-1 ring-forest/5">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-coral/15" aria-hidden="true">
                                <svg class="h-3 w-3 text-coral" viewBox="0 0 14 14" fill="none"><path d="m3 7.5 2.5 2.5L11 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <img src="{{ asset('images/stock-pexels-16770914.jpg') }}" alt="A seatbelt being fastened for a safe, comfortable journey"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- Independence + peace of mind --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-transport-assist.jpg') }}" alt="A support worker helping a participant into a vehicle"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div class="space-y-6">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Promoting independence through mobility.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    Reliable transport opens the door to greater independence — helping you access your community,
                    attend important appointments and engage in everyday activities, building confidence and
                    reducing reliance on others.
                </p>
            </div>
            <div class="rounded-2xl bg-cream-dark/50 p-6">
                <h3 class="font-display text-lg font-semibold">Peace of mind for families</h3>
                <p class="mt-2 text-sm leading-relaxed text-forest/70">
                    Knowing your loved one has safe, reliable and supported transport means fewer worries. We
                    prioritise punctuality, safety and communication — every journey is smooth and dependable.
                </p>
            </div>
        </div>
    </section>

    {{-- Approach + who it's for --}}
    <section class="bg-forest">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Our approach</h2>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Safety and reliability in every journey',
                        'Respecting individual preferences and schedules',
                        'Friendly, supportive and patient staff',
                        'A comfortable and stress-free experience',
                    ] as $item)
                        <li class="flex items-start gap-3 text-cream/90">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-coral/20" aria-hidden="true">
                                <svg class="h-3 w-3 text-coral" viewBox="0 0 14 14" fill="none"><path d="m3 7.5 2.5 2.5L11 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Who this service is for</h2>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Require support travelling to appointments or activities',
                        'Have mobility challenges or safety concerns',
                        'Want to stay active and connected to their community',
                        'Need reliable and consistent transport assistance',
                    ] as $item)
                        <li class="flex items-start gap-3 text-cream/90">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-coral/20" aria-hidden="true">
                                <svg class="h-3 w-3 text-coral" viewBox="0 0 14 14" fill="none"><path d="m3 7.5 2.5 2.5L11 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    @include('partials.service-cta')
@endsection
