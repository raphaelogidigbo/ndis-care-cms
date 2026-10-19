@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' | Harbourview Care Services')
@if ($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif

@section('content')
    @include('partials.service-hero')

    {{-- Intro --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-mum-and-daughter.jpg') }}" alt="A participant chatting with their support worker over coffee"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Community Participation</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Build real connections. Gain real confidence.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Community Participation is designed to help you actively engage with the world around you through
                structured, meaningful and goal-oriented activities.
            </p>
            <p class="mt-4 leading-relaxed text-forest/80">
                This is not just about "going out" — it's about developing social confidence, building relationships
                and increasing independence through real-life experiences.
            </p>
        </div>
    </section>

    {{-- Activity categories --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="mx-auto max-w-2xl text-center">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Structured Engagement Options</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Activities for every interest and ability.</h2>
            </div>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['Social & Lifestyle', 'Café visits, social outings, shopping trips, local errands, community events and festivals.'],
                    ['Recreational & Outdoor', 'Park visits, walks and nature outings, sports and fitness activities, group recreational programs.'],
                    ['Learning & Skill-Based', 'Library visits and reading programs, art, music and creative classes, cooking, technology or life skills workshops.'],
                    ['Community Integration', 'Volunteering opportunities, cultural and religious events, local clubs and group meetups.'],
                ] as [$title, $text])
                    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-forest/5">
                        <span class="mb-4 flex h-11 w-11 items-center justify-center rounded-full bg-coral/10" aria-hidden="true">
                            <svg class="h-5 w-5 text-coral" viewBox="0 0 20 20" fill="none"><path d="m4 10.5 4 4L16 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <h3 class="font-display text-lg font-semibold">{{ $title }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-forest/70">{{ $text }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Outcomes --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <div class="order-2 lg:order-1">
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Outcome-Focused Support</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Participation with purpose.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Community participation plays a critical role in improving overall wellbeing. Through consistent
                engagement, participants can:
            </p>
            <ul class="mt-6 space-y-3">
                @foreach ([
                    'Improve communication and interpersonal skills',
                    'Develop confidence in public and social settings',
                    'Build independence in planning and decision-making',
                    'Form lasting relationships and support networks',
                ] as $item)
                    <li class="flex items-start gap-3 text-forest/80">
                        <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-coral/15" aria-hidden="true">
                            <svg class="h-3 w-3 text-coral" viewBox="0 0 14 14" fill="none"><path d="m3 7.5 2.5 2.5L11 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        {{ $item }}
                    </li>
                @endforeach
            </ul>
        </div>
        <img src="{{ asset('images/stock-painting-workshop.jpg') }}" alt="Participants enjoying a creative art workshop together"
             class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
    </section>

    {{-- Supported every step + personalised --}}
    <section class="bg-forest">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Supported every step of the way</h2>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Transport to and from activities',
                        'Assistance during participation',
                        'Encouragement and social facilitation',
                        'Ongoing feedback and adjustment of plans',
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
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Personalised planning</h2>
                <p class="mt-4 leading-relaxed text-cream/80">
                    Every individual has different interests, comfort levels and goals. We carefully select activities,
                    gradually build confidence and adapt support as progress is made — so participation is never
                    overwhelming, always empowering.
                </p>
            </div>
        </div>
    </section>

    {{-- Who it's for --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-housemates-breakfast.jpg') }}" alt="Participants connecting over a shared meal"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Who This Service Is For</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Ideal if you're ready to connect.</h2>
            <ul class="mt-6 space-y-3">
                @foreach ([
                    'Experience social isolation or limited community access',
                    'Want to build confidence in social environments',
                    'Are working towards greater independence',
                    'Need structured support to engage in community life',
                ] as $item)
                    <li class="flex items-start gap-3 text-forest/80">
                        <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-coral/15" aria-hidden="true">
                            <svg class="h-3 w-3 text-coral" viewBox="0 0 14 14" fill="none"><path d="m3 7.5 2.5 2.5L11 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        {{ $item }}
                    </li>
                @endforeach
            </ul>
            <p class="mt-6 rounded-2xl bg-cream-dark/50 p-5 text-sm leading-relaxed text-forest/70">
                <strong class="font-semibold text-forest">Why Harbourview Care Services:</strong> tailored activity planning,
                consistent and supportive staff, a focus on real outcomes — not just attendance — and safe, inclusive,
                respectful environments.
            </p>
        </div>
    </section>

    @include('partials.service-cta')
@endsection
