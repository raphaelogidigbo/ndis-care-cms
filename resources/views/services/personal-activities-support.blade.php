@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' | Harbourview Care Services')
@if ($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif

@section('content')
    @include('partials.service-hero')

    {{-- Intro --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-hair-treatment.jpg') }}" alt="A participant enjoying personal grooming support at the salon"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Personal Activities Support</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Support with daily living, delivered with dignity.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Everyday tasks can sometimes feel overwhelming — but with the right support, they become
                opportunities to build confidence, independence and control over your life.
            </p>
            <p class="mt-4 leading-relaxed text-forest/80">
                Personal Activities support assists with daily living tasks while empowering you to do as much
                as you can independently — we work alongside you, not just for you.
            </p>
        </div>
    </section>

    {{-- How we support you --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">How We Support You</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Tailored to your lifestyle and comfort.</h2>
                <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                    @foreach ([
                        'Personal hygiene — showering, grooming and dressing',
                        'Mobility support and safe transfers',
                        'Meal preparation and assistance with eating',
                        'Medication reminders',
                        'Daily routine support (morning and evening care)',
                    ] as $item)
                        <li class="flex items-start gap-2.5 rounded-xl bg-white p-3 text-sm text-forest/80 ring-1 ring-forest/5">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-coral/15" aria-hidden="true">
                                <svg class="h-3 w-3 text-coral" viewBox="0 0 14 14" fill="none"><path d="m3 7.5 2.5 2.5L11 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
                <p class="mt-5 text-sm leading-relaxed text-forest/70">
                    Support is always delivered in a way that feels respectful, comfortable and empowering.
                </p>
            </div>
            <img src="{{ asset('images/stock-help-elderly.jpg') }}" alt="A support worker helping a participant move safely at home"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- More than assistance + approach --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/Personal-Activities-Support-ndis-1.png') }}" alt="A participant with a walking frame building confidence with their support worker"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div class="space-y-6">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">More than just assistance.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    What makes our Personal Activities support different is our focus on growth — we don't just help
                    you complete tasks, we support you in developing the confidence and skills to manage them more
                    independently over time. Every interaction is an opportunity to build self-esteem and autonomy.
                </p>
            </div>
            <div class="rounded-2xl bg-cream-dark/50 p-6">
                <h3 class="font-display text-lg font-semibold">Our approach</h3>
                <ul class="mt-3 space-y-2 text-sm leading-relaxed text-forest/70">
                    <li>Your preferences and routines come first</li>
                    <li>You are involved in every decision about your care</li>
                    <li>Support is delivered with dignity, respect and patience</li>
                </ul>
            </div>
        </div>
    </section>

    {{-- Who it's for --}}
    <section class="bg-forest">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Who this service is for</h2>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Need support with daily living tasks',
                        'Want to maintain or increase independence',
                        'Require assistance due to disability, illness or mobility challenges',
                        'Prefer respectful, one-on-one support at home or in the community',
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
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Why choose Harbourview</h2>
                <p class="mt-4 leading-relaxed text-cream/80">
                    With Harbourview Care Services, you receive more than assistance — you receive care that truly
                    understands you.
                </p>
                <p class="mt-4 leading-relaxed text-cream/80">
                    We combine consistency, compassion and professionalism so every individual feels supported,
                    respected and empowered in their daily life — building genuine relationships in a safe,
                    supportive environment.
                </p>
            </div>
        </div>
    </section>

    @include('partials.service-cta')
@endsection
