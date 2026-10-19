@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' | Harbourview Care Services')
@if ($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif

@section('content')
    @include('partials.service-hero')

    {{-- Intro --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-horse-therapy.jpg') }}" alt="A participant taking part in equine therapy"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Innovative Community Participation</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Unlock new possibilities through creative engagement.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Designed for individuals who want to go beyond traditional activities and explore new,
                skill-building, capacity-focused opportunities.
            </p>
            <p class="mt-4 leading-relaxed text-forest/80">
                We help participants develop independence, confidence and social capability through structured,
                forward-thinking programs — focused on long-term development, not just attendance.
            </p>
        </div>
    </section>

    {{-- A different approach + programs --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="mx-auto max-w-2xl text-center">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">A Different Approach to Participation</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Doing things with purpose.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    We design experiences that challenge, support and develop — every activity aligned with personal
                    goals and future outcomes. Participants aren't just involved; they're learning, growing and
                    preparing for the next stage of their journey.
                </p>
            </div>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['Skill development programs', 'Communication, problem-solving and decision-making'],
                    ['Technology & digital literacy', 'Training that opens doors to learning and work'],
                    ['Creative workshops', 'Art, music and design experiences'],
                    ['Education-based activities', 'Learning support and structured programs'],
                    ['Pre-employment readiness', 'Workplace skills and confidence building'],
                    ['Volunteering & contribution', 'Meaningful roles in the community'],
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

    {{-- Confidence for the future --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-barista.jpg') }}" alt="A participant working confidently in a café role"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Building Confidence for the Future</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Real-world capabilities.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                By participating in new environments and structured programs, individuals gain the ability to adapt,
                communicate and take initiative — preparing them for greater independence and broader life
                opportunities.
            </p>
            <p class="mt-4 leading-relaxed text-forest/80">
                Over time, participants develop the skills and mindset needed to take on new challenges with
                confidence.
            </p>
        </div>
    </section>

    {{-- Goal-oriented + who it's for --}}
    <section class="bg-forest">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Personalised &amp; goal-oriented</h2>
                <p class="mt-4 leading-relaxed text-cream/80">
                    Every participant has unique goals — and our support reflects that. We work closely with you to:
                </p>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Identify long-term goals',
                        'Create structured development plans',
                        'Track progress and adjust support as needed',
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
                        'Want to build skills for independence or employment',
                        'Are ready to move beyond basic community participation',
                        'Need structured programs to support personal development',
                        'Are looking to explore new opportunities and experiences',
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
        <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Outcomes, growth and opportunity.</h2>
        <p class="mt-4 leading-relaxed text-forest/80">
            Structured and purpose-driven programs, experienced and supportive staff, a strong focus on skill
            development and independence, and flexible, personalised support plans.
        </p>
    </section>

    @include('partials.service-cta')
@endsection
