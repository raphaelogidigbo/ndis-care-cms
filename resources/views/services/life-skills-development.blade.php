@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' | Harbourview Care Services')
@if ($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif

@section('content')
    @include('partials.service-hero')

    {{-- Intro --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-recovery-coach.jpg') }}" alt="A participant learning to cook with their support worker"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Life Skills Development</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Building confidence for everyday living.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Life Skills Development focuses on equipping you with the practical skills needed to live more
                independently, confidently and successfully — developing essential abilities that improve daily
                living, decision-making and overall quality of life.
            </p>
            <p class="mt-4 leading-relaxed text-forest/80">
                This goes beyond basic support — it's about teaching, guiding and empowering you to take greater
                control of your life over time.
            </p>
        </div>
    </section>

    {{-- Skill areas --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Practical Skills That Make a Difference</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Skills for real life.</h2>
                <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                    @foreach ([
                        'Cooking and meal preparation',
                        'Budgeting and money management',
                        'Personal organisation and time management',
                        'Communication and social interaction skills',
                        'Using public transport and navigating the community',
                        'Basic household management',
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
                    Each skill is developed at a pace that suits you — ensuring comfort, confidence and steady progress.
                </p>
            </div>
            <img src="{{ asset('images/stock-down-syndrome-girl.jpg') }}" alt="A participant building everyday skills on her laptop"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- Learn by doing + long-term --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-budgeting.jpg') }}" alt="A participant working through budgeting skills with a support worker"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div class="space-y-6">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Learning through real-life experience.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    We believe the best way to learn is by doing. Whether it's preparing a meal, managing a weekly
                    budget or planning a daily routine — you gain confidence by actively engaging in tasks, then
                    apply those skills independently in everyday life.
                </p>
            </div>
            <div class="rounded-2xl bg-cream-dark/50 p-6">
                <h3 class="font-display text-lg font-semibold">Long-term independence and growth</h3>
                <p class="mt-2 text-sm leading-relaxed text-forest/70">
                    Life skills are the foundation of independence. Over time, developing these abilities leads to
                    greater independence, reduced reliance on others and improved overall wellbeing.
                </p>
            </div>
        </div>
    </section>

    {{-- Goal-oriented + who it's for --}}
    <section class="bg-forest">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Personalised &amp; goal-oriented</h2>
                <p class="mt-4 leading-relaxed text-cream/80">
                    Every individual has different goals, abilities and starting points. We work closely with you to:
                </p>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Identify areas for development',
                        'Set realistic and achievable goals',
                        'Create structured learning plans',
                        'Monitor progress and adjust support as needed',
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
                        'Want to become more independent in daily life',
                        'Need support developing practical life skills',
                        'Are transitioning to more independent living',
                        'Require guidance to build confidence and capability',
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

    {{-- Why Harbourview --}}
    <section class="mx-auto w-full max-w-3xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
        <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Why Harbourview Care Services</p>
        <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Empowerment, not dependency.</h2>
        <p class="mt-4 leading-relaxed text-forest/80">
            Structured and practical learning methods, supportive and patient staff, real-life skill application,
            and consistent encouragement and guidance — every step leads to meaningful, measurable outcomes.
        </p>
    </section>

    @include('partials.service-cta')
@endsection
