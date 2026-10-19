@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' | Harbourview Care Services')
@if ($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif

@section('content')
    @include('partials.service-hero')

    {{-- Intro --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-group-peeps.jpg') }}" alt="Participants enjoying a group activity together"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Group Activities</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Meaningful connections through shared experiences.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Group Activities bring individuals together in a supportive and engaging environment where they
                can connect, participate and grow.
            </p>
            <p class="mt-4 leading-relaxed text-forest/80">
                This is not just about staying busy — it's about building relationships, improving social
                confidence and creating enjoyable experiences that enhance overall wellbeing.
            </p>
        </div>
    </section>

    {{-- Social connection benefits --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">The Power of Social Connection</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Being part of a group matters.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    Regular participation helps individuals:
                </p>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Build friendships and meaningful connections',
                        'Improve communication and social interaction skills',
                        'Gain confidence in group settings',
                        'Feel a sense of belonging and inclusion',
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
            <img src="{{ asset('images/stock-down-syndrome-carer.jpg') }}" alt="Participants laughing together during a group outing"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- Activity variety --}}
    <section class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="mx-auto max-w-2xl text-center">
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">A Variety of Engaging Activities</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Programs to suit every interest.</h2>
        </div>
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ([
                ['Social outings', 'Cafés, parks and community events'],
                ['Creative activities', 'Art, music and crafts'],
                ['Fitness & recreation', 'Active sessions for all abilities'],
                ['Cooking & shared meals', 'Hands-on food experiences together'],
                ['Games & workshops', 'Interactive sessions that build skills'],
                ['Community events', 'Festivals, clubs and local meetups'],
            ] as [$title, $text])
                <div class="rounded-2xl bg-white p-6 text-center shadow-sm ring-1 ring-forest/5">
                    <span class="mx-auto mb-4 flex h-11 w-11 items-center justify-center rounded-full bg-coral/10" aria-hidden="true">
                        <svg class="h-5 w-5 text-coral" viewBox="0 0 20 20" fill="none"><path d="m4 10.5 4 4L16 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <h3 class="font-display text-lg font-semibold">{{ $title }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-forest/70">{{ $text }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Support + confidence --}}
    <section class="bg-forest">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Support that encourages participation</h2>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Encouraging interaction and engagement',
                        'Facilitating activities in a safe, structured way',
                        'Adapting activities to suit different abilities',
                        'Ensuring everyone feels included and respected',
                    ] as $item)
                        <li class="flex items-start gap-3 text-cream/90">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-coral/20" aria-hidden="true">
                                <svg class="h-3 w-3 text-coral" viewBox="0 0 14 14" fill="none"><path d="m3 7.5 2.5 2.5L11 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
                <p class="mt-4 text-sm leading-relaxed text-cream/70">Participants are supported at their own pace, without pressure.</p>
            </div>
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Building confidence over time</h2>
                <p class="mt-4 leading-relaxed text-cream/80">
                    Group settings provide a natural environment to develop confidence and independence. By regularly
                    engaging with others, participants become more comfortable expressing themselves, trying new
                    activities and participating in social environments.
                </p>
                <p class="mt-4 leading-relaxed text-cream/80">
                    Over time, this leads to greater independence and improved quality of life.
                </p>
            </div>
        </div>
    </section>

    {{-- Who it's for --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-girls-art.jpg') }}" alt="Participants enjoying a creative art session together"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Who This Service Is For</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Ideal if you want to connect and grow.</h2>
            <ul class="mt-6 space-y-3">
                @foreach ([
                    'Want to develop social skills and build friendships',
                    'Enjoy being part of a group environment',
                    'Feel isolated or want to increase social interaction',
                    'Are looking for structured and enjoyable activities',
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
                <strong class="font-semibold text-forest">Why Harbourview Care Services:</strong> a welcoming and supportive
                environment, well-structured and meaningful activities, experienced and consistent staff, and a
                strong focus on inclusion and participant wellbeing.
            </p>
        </div>
    </section>

    @include('partials.service-cta')
@endsection
