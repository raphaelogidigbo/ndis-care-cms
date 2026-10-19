@extends('layouts.app')

@if ($page?->meta_title)
    @section('title', $page->meta_title . ' | Harbourview Care Services')
@endif
@if ($page?->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    {{-- 01 Hero --}}
    <section class="relative" x-data="{
        count: 3,
        current: 0,
        timer: null,
        init() {
            if (! window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                this.timer = setInterval(() => this.next(), 6000);
            }
        },
        next() { this.current = (this.current + 1) % this.count; },
        go(i) { this.current = i; clearInterval(this.timer); },
    }">
        <div class="absolute inset-0 overflow-hidden bg-forest">
            <img src="{{ asset('images/stock-hero-conversation.jpg') }}" alt="An Harbourview Care support worker visiting a participant at home"
                 x-show="current === 0"
                 x-transition:leave="transition-opacity duration-1000"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 h-full w-full object-cover">
            @foreach (['stock-participant-group.jpg', 'stock-cafe-friends.jpg'] as $i => $heroImage)
                <img src="{{ asset('images/'.$heroImage) }}" alt="" aria-hidden="true"
                     x-cloak x-show="current === {{ $i + 1 }}"
                     x-transition:enter="transition-opacity duration-1000"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition-opacity duration-1000"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="absolute inset-0 h-full w-full object-cover">
            @endforeach
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>

        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 sm:py-28 lg:px-8 lg:py-40">
            <div class="max-w-2xl">
                <p class="mb-4 text-xs font-semibold uppercase tracking-[0.2em] text-coral">
                    NDIS Disability Support Provider in Melbourne
                </p>
                <h1 class="font-display grid text-4xl font-semibold leading-tight tracking-tight text-white sm:text-5xl lg:text-6xl" aria-live="polite">
                    <span x-show="current === 0"
                          x-transition:leave="transition-opacity duration-700"
                          x-transition:leave-start="opacity-100"
                          x-transition:leave-end="opacity-0"
                          class="col-start-1 row-start-1">Consistent support.</span>
                    <span x-cloak x-show="current === 1"
                          x-transition:enter="transition-opacity duration-700"
                          x-transition:enter-start="opacity-0"
                          x-transition:enter-end="opacity-100"
                          x-transition:leave="transition-opacity duration-700"
                          x-transition:leave-start="opacity-100"
                          x-transition:leave-end="opacity-0"
                          class="col-start-1 row-start-1">Real relationships.</span>
                    <span x-cloak x-show="current === 2"
                          x-transition:enter="transition-opacity duration-700"
                          x-transition:enter-start="opacity-0"
                          x-transition:enter-end="opacity-100"
                          x-transition:leave="transition-opacity duration-700"
                          x-transition:leave-start="opacity-100"
                          x-transition:leave-end="opacity-0"
                          class="col-start-1 row-start-1">Care built around you.</span>
                </h1>
                <p class="mt-5 max-w-xl text-lg leading-relaxed text-white/85">
                    At Harbourview Care Services, we provide personalised NDIS support that empowers you to live a meaningful, independent life — with a team that genuinely cares.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('page.show', 'referrals') }}" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                        Make a Referral
                    </a>
                    <a href="{{ route('page.show', 'contact-us') }}" class="inline-flex items-center rounded-full border-2 border-cream px-7 py-3.5 font-semibold text-cream transition-colors hover:bg-cream hover:text-forest">
                        Talk to Our Team
                    </a>
                </div>
                <ul class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-2 text-sm font-medium text-white/80">
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-coral" aria-hidden="true"></span> Person-centred support
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-coral" aria-hidden="true"></span> Consistent, familiar team
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-coral" aria-hidden="true"></span> Local to Melbourne
                    </li>
                </ul>

                {{-- Carousel dots --}}
                <div class="mt-10 flex items-center gap-2.5" role="group" aria-label="Hero image carousel">
                    <template x-for="i in count" :key="i">
                        <button type="button" @click="go(i - 1)" :aria-label="`Show slide ${i}`"
                                :class="current === i - 1 ? 'bg-coral w-8' : 'bg-white/40 w-2.5 hover:bg-white/70'"
                                class="h-2.5 rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </div>
        </div>

        <p class="font-hand pointer-events-none absolute bottom-8 right-8 hidden rotate-[-3deg] text-3xl text-white drop-shadow-[0_2px_4px_rgba(0,0,0,0.6)] lg:block">
            Real people. Brighter days.
        </p>
    </section>

    {{-- 02 Introduction --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-counselling.jpg') }}" alt="A support worker listening to a participant in conversation"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">About Harbourview Care Services</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Care starts with listening.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                We take the time to understand your goals, your preferences and what matters most. Our support is built around you — so you can live the life you choose, with confidence and the right people by your side.
            </p>
            <a href="{{ route('page.show', 'about-us') }}" class="mt-7 inline-flex items-center gap-1.5 rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
                Learn More About Harbourview
                <svg class="h-4 w-4" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h9.5M9 4.5 12.5 8 9 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <p class="font-hand mt-6 rotate-[-2deg] text-2xl text-coral">
                "Support that sees the whole you."
            </p>
        </div>
    </section>

    {{-- 03 Our Services --}}
    <section class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div class="max-w-2xl">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Our Services</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">
                    Support for everyday life, independence and community connection.
                </h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    Whether someone needs a few hours of support each week or more regular assistance, our team works to provide support that fits into their life.
                </p>
            </div>
            <a href="{{ route('services.index') }}" class="inline-flex items-center gap-1.5 rounded-full border-2 border-forest px-6 py-3 text-sm font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
                View All Harbourview Services
                <svg class="h-4 w-4" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h9.5M9 4.5 12.5 8 9 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($services as $service)
                <a href="{{ route('page.show', $service->slug) }}" class="group flex flex-col overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-forest/5 transition-shadow hover:shadow-lg">
                    @if ($service->card_image)
                        <img src="{{ asset('images/'.$service->card_image) }}" alt="{{ $service->title }}"
                             class="aspect-[4/3] w-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy">
                    @endif
                    <div class="flex flex-1 flex-col p-5">
                        <h3 class="font-display text-lg font-semibold">{{ $featuredCopy[$service->slug]['title'] ?? $service->title }}</h3>
                        <p class="mt-1.5 flex-1 text-sm leading-relaxed text-forest/70">
                            {{ $featuredCopy[$service->slug]['excerpt'] ?? $service->excerpt }}
                        </p>
                        <span class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-coral">
                            Learn More
                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h9.5M9 4.5 12.5 8 9 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- 04 Why Harbourview --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
            <h2 class="font-display mx-auto max-w-2xl text-center text-3xl font-semibold tracking-tight sm:text-4xl">
                What you should expect from your support provider.
            </h2>
            <div class="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="text-center">
                    <img src="{{ asset('images/serv-icon05.png') }}" alt="" class="mx-auto mb-4 h-11 w-11" aria-hidden="true" loading="lazy">
                    <h3 class="font-display text-lg font-semibold">Familiar and Consistent Support</h3>
                    <p class="mt-2 text-sm leading-relaxed text-forest/70">
                        Where possible, we provide stable support teams who get to know the participant, their routines and the way they prefer to be supported.
                    </p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('images/serv-icon06.png') }}" alt="" class="mx-auto mb-4 h-11 w-11" aria-hidden="true" loading="lazy">
                    <h3 class="font-display text-lg font-semibold">Clear Communication</h3>
                    <p class="mt-2 text-sm leading-relaxed text-forest/70">
                        We work closely with participants and the people around them so concerns, changes and important information are addressed promptly.
                    </p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('images/serv-icon07.png') }}" alt="" class="mx-auto mb-4 h-11 w-11" aria-hidden="true" loading="lazy">
                    <h3 class="font-display text-lg font-semibold">Support Built Around the Individual</h3>
                    <p class="mt-2 text-sm leading-relaxed text-forest/70">
                        A participant's goals, culture, preferences, routines and communication style guide the way their support is delivered.
                    </p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('images/serv-icon08.png') }}" alt="" class="mx-auto mb-4 h-11 w-11" aria-hidden="true" loading="lazy">
                    <h3 class="font-display text-lg font-semibold">Collaboration That Works</h3>
                    <p class="mt-2 text-sm leading-relaxed text-forest/70">
                        We value strong working relationships with families, guardians, Support Coordinators and allied health professionals.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 05 Real Support, Everyday Life --}}
    <section class="relative">
        <img src="{{ asset('images/stock-pexels-5723192.jpg') }}" alt="A support worker holding a participant's hands"
             class="absolute inset-0 h-full w-full object-cover" loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/55 sm:to-forest/10"></div>

        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 sm:py-28 lg:px-8 lg:py-32">
            <div class="max-w-xl">
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                    Real support, everyday life.
                </h2>
                <p class="mt-4 leading-relaxed text-white/85">
                    Support should help life happen — not take it over. It's learning to prepare a favourite meal, getting to an appointment, building confidence in the community or simply having the right support to make everyday life easier.
                </p>
                <a href="{{ route('page.show', 'contact-us') }}" class="mt-7 inline-flex items-center gap-1.5 rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Talk to Our Team
                    <svg class="h-4 w-4" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h9.5M9 4.5 12.5 8 9 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
        </div>

        <p class="font-hand pointer-events-none absolute bottom-8 right-8 hidden rotate-[-3deg] text-3xl text-white drop-shadow-[0_2px_4px_rgba(0,0,0,0.6)] lg:block">
            Different abilities. Brighter possibilities.
        </p>
    </section>

    {{-- 06 Testimonials --}}
    @if ($testimonials->isNotEmpty())
        <section class="bg-cream-dark/40" x-data="{
            count: {{ $testimonials->count() }},
            current: 0,
            timer: null,
            init() {
                if (this.count > 1 && ! window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                    this.timer = setInterval(() => this.next(), 7000);
                }
            },
            next() { this.current = (this.current + 1) % this.count; },
            prev() { this.current = (this.current - 1 + this.count) % this.count; },
            go(i) { clearInterval(this.timer); this.current = i; },
        }">
            <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">What our clients and families say</h2>
                    <a href="{{ route('page.show', 'feedback') }}" class="inline-flex items-center gap-1.5 font-semibold text-coral hover:text-coral-dark">
                        Read More Experiences
                        <svg class="h-4 w-4" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h9.5M9 4.5 12.5 8 9 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>

                {{-- Carousel slides --}}
                <div class="mx-auto mt-10 grid max-w-3xl" aria-live="polite">
                    @foreach ($testimonials as $testimonial)
                        <figure @if (! $loop->first) x-cloak @endif
                                x-show="current === {{ $loop->index }}"
                                x-transition:enter="transition-opacity duration-700"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition-opacity duration-700"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="col-start-1 row-start-1 flex w-full flex-col items-center self-stretch rounded-[2rem] bg-white px-6 py-10 text-center shadow-sm ring-1 ring-forest/5 sm:px-12">
                            <span class="font-display text-6xl leading-none text-coral/40" aria-hidden="true">&ldquo;</span>
                            <blockquote class="mt-3 flex-1 text-lg leading-relaxed text-forest/80 sm:text-xl">
                                {{ $testimonial->content }}
                            </blockquote>
                            @if ($testimonial->rating)
                                <div class="mt-4 text-sm tracking-wide text-coral" aria-label="{{ $testimonial->rating }} out of 5 stars">
                                    @for ($i = 0; $i < $testimonial->rating; $i++)
                                        <span aria-hidden="true">&#9733;</span>
                                    @endfor
                                </div>
                            @endif
                            <figcaption class="mt-6 flex items-center gap-3 border-t border-sand pt-6 text-left">
                                @if ($testimonial->author_photo)
                                    <img src="{{ asset('images/'.$testimonial->author_photo) }}" alt="{{ $testimonial->author_name }}"
                                         class="h-12 w-12 rounded-full object-cover" loading="lazy">
                                @else
                                    <span class="flex h-12 w-12 items-center justify-center rounded-full bg-coral/15 font-display text-lg font-semibold text-coral" aria-hidden="true">
                                        {{ \Illuminate\Support\Str::of($testimonial->author_name)->explode(' ')->map(fn ($w) => \Illuminate\Support\Str::substr($w, 0, 1))->take(2)->implode('') }}
                                    </span>
                                @endif
                                <div>
                                    <p class="text-sm font-semibold">{{ $testimonial->author_name }}</p>
                                    @if ($testimonial->author_role)
                                        <p class="text-xs text-forest/60">{{ $testimonial->author_role }}</p>
                                    @endif
                                </div>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>

                {{-- Controls --}}
                @if ($testimonials->count() > 1)
                    <div class="mt-8 flex items-center justify-center gap-6">
                        <button type="button" @click="clearInterval(timer); prev()" aria-label="Previous testimonial"
                                class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-forest ring-1 ring-forest/15 transition-colors hover:bg-forest hover:text-cream">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M12.5 4.5 7 10l5.5 5.5" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                        <div class="flex items-center gap-2.5" role="group" aria-label="Testimonial carousel">
                            <template x-for="i in count" :key="i">
                                <button type="button" @click="go(i - 1)" :aria-label="`Show testimonial ${i}`"
                                        :class="current === i - 1 ? 'bg-coral w-8' : 'bg-forest/25 w-2.5 hover:bg-forest/50'"
                                        class="h-2.5 rounded-full transition-all duration-300"></button>
                            </template>
                        </div>
                        <button type="button" @click="clearInterval(timer); next()" aria-label="Next testimonial"
                                class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-forest ring-1 ring-forest/15 transition-colors hover:bg-forest hover:text-cream">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M7.5 4.5 13 10l-5.5 5.5" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- 07 Getting Started --}}
    <section class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <h2 class="font-display max-w-xl text-3xl font-semibold tracking-tight sm:text-4xl">
                Starting support doesn't need to be complicated.
            </h2>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('page.show', 'referrals') }}" class="inline-flex items-center rounded-full bg-coral px-6 py-3 text-sm font-semibold text-white transition-colors hover:bg-coral-dark">
                    Make a Referral
                </a>
                <a href="{{ route('page.show', 'contact-us') }}" class="inline-flex items-center rounded-full border-2 border-forest px-6 py-3 text-sm font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
                    Contact Harbourview
                </a>
            </div>
        </div>

        <ol class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['Contact Us', "Get in touch yourself or send us a referral."],
                ["Let's Talk", "We'll discuss the participant's needs, goals, preferences and current supports."],
                ['Meet the Team', "Where appropriate, we'll arrange a meet-and-greet and work on finding a suitable support team."],
                ['Begin Support', 'Once everything is agreed and the necessary documentation is in place, supports can commence.'],
            ] as $i => [$stepTitle, $stepText])
                <li class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-forest/5">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-coral font-display text-lg font-semibold text-white">{{ $i + 1 }}</span>
                    <h3 class="mt-4 font-semibold">{{ $stepTitle }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-forest/70">{{ $stepText }}</p>
                </li>
            @endforeach
        </ol>
    </section>

    {{-- 08 Support Coordinator / Professional Referrals --}}
    <section class="bg-sand/60">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <img src="{{ asset('images/stock-office-meeting.jpg') }}" alt="An Harbourview team member meeting with a support coordinator"
                 class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
            <div>
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">For Support Coordinators &amp; Professionals</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">
                    Looking for the right provider for a participant?
                </h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    We welcome referrals from Support Coordinators, Recovery Coaches, guardians, allied health professionals, hospitals, community organisations and other professionals.
                </p>
                <p class="mt-3 leading-relaxed text-forest/80">
                    When you refer to Harbourview, our team will work with you to understand the participant's needs, confirm whether we are the right fit and communicate clearly throughout the onboarding process.
                </p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="{{ route('page.show', 'referrals') }}" class="inline-flex items-center gap-1.5 rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                        Make a Participant Referral
                        <svg class="h-4 w-4" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h9.5M9 4.5 12.5 8 9 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="{{ route('page.show', 'contact-us') }}" class="inline-flex items-center rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
                        Discuss a Referral With Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- 09 Meet the People Behind Harbourview --}}
    <section class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Meet the people behind Harbourview.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    Good support starts with good people. Our team brings together professionals and support workers who share a commitment to respectful, safe and dependable support — from our Managing Directors Lavina &amp; Onyeka to our nursing, service management and support teams.
                </p>
                <a href="{{ route('page.show', 'about-us') }}" class="mt-7 inline-flex items-center gap-1.5 rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
                    Meet Our Team
                    <svg class="h-4 w-4" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h9.5M9 4.5 12.5 8 9 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
            <img src="{{ asset('images/about-us-2.png') }}" alt="The Harbourview Care Services team"
                 class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        </div>
    </section>

    {{-- 10 Final Call to Action --}}
    <section class="mx-auto w-full max-w-7xl px-4 pb-20 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-[2rem] bg-forest px-6 py-12 text-center sm:px-12">
            <p class="font-hand rotate-[-2deg] text-2xl text-cream/80">Real people. Positive change.</p>
            <h2 class="font-display mx-auto mt-2 max-w-2xl text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                Let's talk about how we can support you.
            </h2>
            <p class="mx-auto mt-3 max-w-xl text-cream/80">
                Whether you're looking for support for yourself, a family member or someone you work with, we'd be happy to discuss what they need and whether Harbourview is the right fit.
            </p>
            <div class="mt-7 flex flex-wrap justify-center gap-3">
                <a href="{{ route('page.show', 'referrals') }}" class="inline-flex items-center gap-1.5 rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Make a Referral
                    <svg class="h-4 w-4" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h9.5M9 4.5 12.5 8 9 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <a href="{{ route('page.show', 'contact-us') }}" class="inline-flex items-center rounded-full border-2 border-cream px-7 py-3.5 font-semibold text-cream transition-colors hover:bg-cream hover:text-forest">
                    Contact Our Team
                </a>
            </div>
            <div class="mt-8 flex flex-wrap items-center justify-center gap-x-8 gap-y-2 text-sm text-cream/80">
                <a href="tel:0890000000" class="inline-flex items-center gap-1.5 hover:text-white">
                    <img src="{{ asset('images/ph-icon02.png') }}" alt="" class="h-4 w-4" aria-hidden="true"> (08) 9000 0000
                </a>
                <a href="mailto:info@example.com" class="inline-flex items-center gap-1.5 hover:text-white">
                    <img src="{{ asset('images/email-icon02.png') }}" alt="" class="h-4 w-4" aria-hidden="true"> info@example.com
                </a>
                <span class="inline-flex items-center gap-1.5">
                    <img src="{{ asset('images/location-icon01.png') }}" alt="" class="h-4 w-4" aria-hidden="true"> 1 Example Street, Melbourne VIC 3000
                </span>
            </div>
        </div>
    </section>
@endsection
