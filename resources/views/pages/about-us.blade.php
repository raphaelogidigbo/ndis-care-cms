@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    {{-- Page hero --}}
    <section class="relative">
        <img src="{{ asset('images/stock-team-healthcare.jpg') }}" alt="The Harbourview Care Services team"
             class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
            @include('partials.breadcrumbs', ['dark' => true])
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">About Harbourview Care Services</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Faith. Compassion. Dignity.
            </h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">
                At Harbourview Care Services, we are committed to delivering compassionate, person-centred support to individuals living with disability and mental health challenges. Our goal is to empower every participant to live with confidence, independence, and dignity in their everyday lives.
            </p>
            <p class="mt-4 max-w-2xl leading-relaxed text-cream/85">
                We proudly support NDIS participants across Melbourne, providing flexible and reliable care tailored to individual needs, goals, and preferences.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="tel:0890000000" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Call (08) 9000 0000
                </a>
                <a href="mailto:info@example.com" class="inline-flex items-center rounded-full border-2 border-cream px-7 py-3.5 font-semibold text-cream transition-colors hover:bg-cream hover:text-forest">
                    Email Us
                </a>
            </div>
        </div>
        <p class="font-hand pointer-events-none absolute bottom-6 right-8 hidden rotate-[-3deg] text-3xl text-white drop-shadow-[0_2px_4px_rgba(0,0,0,0.6)] lg:block">
            Support with heart.
        </p>
    </section>

    {{-- Who We Are --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/about-us-3.png') }}" alt="Members of the Harbourview Care Services team in discussion"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Who We Are</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">
                Care built on faith, compassion and respect.
            </h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Harbourview Care Services is built on a foundation of faith, compassion, and respect. We believe that quality care goes beyond assistance — it’s about building meaningful relationships, understanding each individual, and providing support that truly makes a difference.


            </p>
            <p class="mt-4 leading-relaxed text-forest/80">
                Our team is dedicated to delivering care that is not only professional but also genuine, consistent and empowering — across Melbourne, North and South of the River.


            </p>
            <p class="font-hand mt-6 rotate-[-2deg] text-2xl text-coral">Care that puts people first.</p>
        </div>
    </section>

    {{-- Our Approach --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Our Approach</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">
                    Personalised. Collaborative. Meaningful.
                </h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    We take a personalised and collaborative approach to care, working closely with participants,
                    families, support coordinators and allied health professionals to deliver consistent,
                    high-quality support.
                </p>
                <p class="mt-4 leading-relaxed text-forest/80">Every support plan is tailored to:</p>
                <ul class="mt-4 flex flex-wrap gap-2.5">
                    <li class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-forest ring-1 ring-forest/10">Individual goals</li>
                    <li class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-forest ring-1 ring-forest/10">Personal preferences</li>
                    <li class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-forest ring-1 ring-forest/10">Lifestyle needs</li>
                </ul>
                <p class="mt-4 leading-relaxed text-forest/80">
                    This ensures each participant receives support that is both meaningful and effective.
                </p>
            </div>
            <img src="{{ asset('images/about-us-2.png') }}" alt="An Harbourview Care support worker spending time with a participant"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- Mission & Vision --}}
    <section class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="grid gap-6 lg:grid-cols-2">
            <div class="rounded-3xl bg-forest p-8 text-cream sm:p-10">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Our Mission</p>
                <p class="font-display text-2xl font-semibold leading-snug sm:text-3xl">
                    To provide high-quality, person-centred support that promotes independence, wellbeing and
                    meaningful participation in everyday life.
                </p>
            </div>
            <div class="rounded-3xl bg-white p-8 ring-1 ring-forest/10 sm:p-10">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Our Vision</p>
                <p class="font-display text-2xl font-semibold leading-snug text-forest sm:text-3xl">
                    To be a trusted NDIS provider known for compassionate care, strong relationships and
                    positive outcomes for every participant.
                </p>
            </div>
        </div>
    </section>

    {{-- What Makes Us Different --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="mx-auto max-w-2xl text-center">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">What Makes Us Different</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">
                    Support designed around the person — not the system.
                </h2>
            </div>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['Person-Centred Care', 'We focus on the individual, ensuring every service is tailored to personal needs and goals.'],
                    ['Consistent & Reliable Support', 'We prioritise familiar staff to build trust, comfort and long-term relationships.'],
                    ['Holistic Support Approach', 'We support both mental health and daily living needs for overall wellbeing.'],
                    ['Flexible & Responsive Services', 'We adapt to changing needs and provide dependable, ongoing support.'],
                    ['Strong Communication', 'We collaborate closely with families, coordinators and healthcare professionals.'],
                    ['Focus on Independence', 'We empower participants to build life skills, confidence and long-term independence.'],
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

    {{-- Quality & Safety --}}
    <section class="relative">
        <img src="{{ asset('images/serv-img37.jpg') }}" alt="An Harbourview Care support worker reviewing a support plan with a participant"
             class="absolute inset-0 h-full w-full object-cover" loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/75 to-forest/40 sm:to-forest/15"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="max-w-xl">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Our Commitment</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                    Quality and safety come first.
                </h2>
                <p class="mt-4 leading-relaxed text-white/85">Your safety and wellbeing are our top priorities.</p>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'NDIS Worker Screening Checks',
                        'Trained and qualified staff',
                        'Compliance with the NDIS Code of Conduct',
                        'Fully insured services',
                    ] as $item)
                        <li class="flex items-center gap-3 text-cream">
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-coral/20" aria-hidden="true">
                                <svg class="h-3.5 w-3.5 text-coral" viewBox="0 0 14 14" fill="none"><path d="m3 7.5 2.5 2.5L11 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- Community --}}
    <section class="mx-auto w-full max-w-3xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
        <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Supporting Our Community</p>
        <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Proudly local to Melbourne.</h2>
        <p class="mt-4 leading-relaxed text-forest/80">
            We proudly support participants across Melbourne — both North and South of the River — helping individuals
            stay connected, engaged and supported within their communities.
        </p>
    </section>

    {{-- CTA --}}
    <section class="border-t border-sand bg-white">
        <div class="mx-auto w-full max-w-3xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Let's work together.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                At Harbourview Care Services, we believe everyone deserves the opportunity to live a fulfilling and
                independent life. Reach out today and discover how we can support you or your loved one.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="tel:0890000000" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Call (08) 9000 0000
                </a>
                <a href="{{ route('page.show', 'contact-us') }}" class="inline-flex items-center rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
                    Contact Our Team
                </a>
            </div>
        </div>
    </section>
@endsection
