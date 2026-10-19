@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' | Harbourview Care Services')
@if ($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif

@section('content')
    @include('partials.service-hero')

    {{-- Intro --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/Shared-Living-Support-ndis-5-md.png') }}" alt="A participant with a walking frame supported in a shared living home"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Shared Living Support</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Support that feels like home.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Shared Living Support offers the opportunity to live in a safe, supportive home environment while
                building meaningful connections and maintaining independence.
            </p>
            <p class="mt-4 leading-relaxed text-forest/80">
                We create living arrangements that are not only supportive but empowering — combining personalised
                care with a strong sense of community, belonging, routine and stability.
            </p>
        </div>
    </section>

    {{-- Dual benefit --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="mx-auto max-w-2xl text-center">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">The Dual Benefit</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Personalised care and community connection.</h2>
            </div>
            <div class="mt-12 grid gap-6 lg:grid-cols-2">
                <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-forest/5">
                    <h3 class="font-display text-xl font-semibold">Individualised care</h3>
                    <ul class="mt-4 space-y-3">
                        @foreach ([
                            'Personalised support tailored to your goals, preferences and daily routines',
                            'Assistance with personal care, daily tasks and skill development',
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
                <div class="rounded-3xl bg-forest p-8 text-cream">
                    <h3 class="font-display text-xl font-semibold text-white">Social connection</h3>
                    <ul class="mt-4 space-y-3">
                        @foreach ([
                            'Living alongside others in a supportive environment',
                            'Opportunities to build friendships and social connections',
                            'Shared experiences that promote inclusion and engagement',
                        ] as $item)
                            <li class="flex items-start gap-3 text-sm leading-relaxed text-cream/90">
                                <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-coral/20" aria-hidden="true">
                                    <svg class="h-3 w-3 text-coral" viewBox="0 0 14 14" fill="none"><path d="m3 7.5 2.5 2.5L11 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <p class="mx-auto mt-8 max-w-2xl text-center text-sm leading-relaxed text-forest/70">
                This balance helps individuals feel supported while reducing isolation and encouraging a more
                fulfilling lifestyle.
            </p>
        </div>
    </section>

    {{-- What support may include --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/Shared-Living-Support-ndis-2.png') }}" alt="Participants sharing daily life in a supportive home"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">What Support May Include</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Flexible, adapted to your needs.</h2>
            <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                @foreach ([
                    'Assistance with daily living activities',
                    'Meal planning and preparation',
                    'Household tasks and shared responsibilities',
                    'Medication support and health monitoring',
                    'Community participation and outings',
                    'Development of life skills and independence',
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
    </section>

    {{-- Flexible options + quality --}}
    <section class="bg-forest">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Flexible living options</h2>
                <p class="mt-4 leading-relaxed text-cream/80">
                    Everyone's needs and preferences are different. We offer flexible shared living arrangements
                    designed to suit each participant's lifestyle, compatibility and support requirements — so every
                    individual feels comfortable, respected and at home.
                </p>
            </div>
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Our commitment to quality</h2>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Experienced and professionally trained team',
                        'Consistent and reliable support',
                        'Focused on building trust and strong relationships',
                        'Dedicated to a safe and supportive environment',
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

    {{-- Who it's for --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <div class="order-2 lg:order-1">
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Who This Service Is For</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">A supportive home, on your terms.</h2>
            <ul class="mt-6 space-y-3">
                @foreach ([
                    'Want a supportive home environment with others',
                    'Need assistance with daily living and routines',
                    'Value both independence and social connection',
                    'Are looking for a structured and safe living arrangement',
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
        <img src="{{ asset('images/Shared-Living-Support-ndis-7.png') }}" alt="A support worker assisting a resident in a shared living home"
             class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
    </section>

    @include('partials.service-cta')
@endsection
