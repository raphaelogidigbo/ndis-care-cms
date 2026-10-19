@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' | Harbourview Care Services')
@if ($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif

@section('content')
    @include('partials.service-hero')

    {{-- Intro --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-pexels-rdne-6647053.jpg') }}" alt="A support worker helping with laundry and household tasks"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Household Tasks Support</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">A comfortable home, a calmer life.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                A clean, safe and well-maintained home plays a vital role in overall wellbeing. Our Household Tasks
                support is designed to reduce daily stress and create a living environment where you can feel
                comfortable, secure and in control.
            </p>
            <p class="mt-4 leading-relaxed text-forest/80">
                Managing a household can become challenging at times — and that's where the right support can make
                all the difference.
            </p>
        </div>
    </section>

    {{-- What support includes --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Practical Support That Fits Your Life</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Everyday help, tailored to your routine.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    Assistance with everyday domestic activities, tailored to your needs, preferences and routines.
                </p>
                <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                    @foreach ([
                        'General cleaning (vacuuming, mopping, dusting)',
                        'Laundry and ironing',
                        'Dishwashing and kitchen cleaning',
                        'Changing bed linen',
                        'Organising living spaces',
                        'Grocery shopping and basic meal preparation',
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
            <img src="{{ asset('images/stock-chef-down-syndrome.jpg') }}" alt="A participant cooking in the kitchen with support"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- Independence + peace of mind --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-cooking-senior.jpg') }}" alt="A participant preparing a meal at home with a support worker"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div class="space-y-6">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Supporting independence, not replacing it.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    We believe household support should empower, not take over. Our staff encourage participation
                    wherever possible — building confidence in managing daily tasks while providing the right level
                    of assistance when needed.
                </p>
            </div>
            <div class="rounded-2xl bg-cream-dark/50 p-6">
                <h3 class="font-display text-lg font-semibold">Peace of mind for participants and families</h3>
                <p class="mt-2 text-sm leading-relaxed text-forest/70">
                    Participants benefit from a clean, safe and organised environment, while families gain confidence
                    knowing their loved one is well supported — so everyone can focus on wellbeing, connection and
                    quality of life.
                </p>
            </div>
        </div>
    </section>

    {{-- Who it's for + approach --}}
    <section class="bg-forest">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Who this service is for</h2>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Need support managing household responsibilities',
                        'Want to maintain a clean and safe living environment',
                        'Experience physical, cognitive or mobility challenges',
                        'Prefer consistent and reliable assistance at home',
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
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Our approach</h2>
                <p class="mt-4 leading-relaxed text-cream/80">
                    We deliver Household Tasks support with care, respect and attention to detail — taking the time
                    to understand your routine and preferences so support feels comfortable and personalised.
                </p>
                <p class="mt-4 leading-relaxed text-cream/80">
                    Our goal is to create not just a clean home, but a positive and supportive living environment.
                </p>
            </div>
        </div>
    </section>

    @include('partials.service-cta')
@endsection
