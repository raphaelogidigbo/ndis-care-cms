@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    {{-- Page hero --}}
    <section class="relative">
        <img src="{{ asset('images/stock-team-healthcare.jpg') }}" alt="The Harbourview Care Services support team"
             class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
            @include('partials.breadcrumbs', ['dark' => true])
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Why Choose Harbourview</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Care you can trust. Support you can rely on.
            </h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">
                Choosing the right support provider is an important decision. At Harbourview Care Services, we go beyond
                delivering services — we build trusted relationships that support long-term wellbeing,
                independence and confidence.
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
            Trust built every day.
        </p>
    </section>

    {{-- Consistent & Reliable --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-therapy-session.jpg') }}" alt="A counsellor talking through a support plan with clients"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Consistent &amp; Reliable Support</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">
                Trust is built through consistency.
            </h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                That's why we prioritise stable rostering and familiar support staff — so participants feel
                comfortable, safe and supported by people who understand their needs, routines and preferences.
            </p>
            <div class="mt-6 rounded-2xl bg-cream-dark/50 p-5">
                <h3 class="font-display text-lg font-semibold">Holistic mental health &amp; disability care</h3>
                <p class="mt-2 text-sm leading-relaxed text-forest/70">
                    We take a well-rounded approach, supporting both mental health and disability needs — addressing
                    not just daily tasks, but emotional wellbeing, confidence and overall quality of life.
                </p>
            </div>
        </div>
    </section>

    {{-- Person-Centred --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Person-Centred Services</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">
                    Every individual is unique — and so is the support we provide.
                </h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    We design personalised care plans based on each participant's goals, lifestyle and preferences —
                    ensuring support is meaningful, respectful and empowering.
                </p>
                <div class="mt-6 rounded-2xl bg-white p-5 ring-1 ring-forest/10">
                    <h3 class="font-display text-lg font-semibold">Flexible &amp; responsive approach</h3>
                    <p class="mt-2 text-sm leading-relaxed text-forest/70">
                        Needs can change — and we are ready to adapt. Our flexible approach lets us respond quickly
                        and adjust support as required, ensuring continuity and reliability at all times.
                    </p>
                </div>
            </div>
            <img src="{{ asset('images/stock-carer-wheelchair.jpg') }}" alt="A support worker planning personalised supports with a participant"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- Communication band --}}
    <section class="bg-forest">
        <div class="mx-auto w-full max-w-3xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Strong Communication &amp; Collaboration</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                Quality care is built on strong communication.
            </h2>
            <p class="mt-4 leading-relaxed text-cream/85">
                We work closely with participants, families, support coordinators and allied health professionals
                to ensure everyone is aligned and informed — a collaborative approach that delivers consistent,
                high-quality outcomes.
            </p>
        </div>
    </section>

    {{-- Independence & Growth --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/stock-group-peeps.jpg') }}" alt="Participants enjoying time together in the community"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Focus on Independence &amp; Growth</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">
                Not just support — empowerment.
            </h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                We actively encourage the development of life skills, confidence and independence — helping
                participants achieve long-term success and greater control over their lives.
            </p>
            <div class="mt-6 rounded-2xl bg-cream-dark/50 p-5">
                <h3 class="font-display text-lg font-semibold">Community connection &amp; inclusion</h3>
                <p class="mt-2 text-sm leading-relaxed text-forest/70">
                    Everyone deserves to feel connected and included. Our services support individuals to engage
                    with their community, build relationships and participate in meaningful activities.
                </p>
            </div>
        </div>
    </section>

    {{-- Values-Driven --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Values-Driven Care</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">
                    Compassion, integrity, dignity and respect.
                </h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    Our values shape every interaction, ensuring each individual feels genuinely cared for and
                    supported in a safe and respectful environment.
                </p>
                <div class="mt-6 rounded-2xl bg-white p-5 ring-1 ring-forest/10">
                    <h3 class="font-display text-lg font-semibold">Our commitment to you</h3>
                    <p class="mt-2 text-sm leading-relaxed text-forest/70">
                        You're not just receiving support — you're gaining a team committed to your growth, wellbeing
                        and independence. We are here to walk alongside you and help you live with confidence and purpose.
                    </p>
                </div>
            </div>
            <img src="{{ asset('images/stock-help-elderly.jpg') }}" alt="A support worker helping a participant at home"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- CTA --}}
    <section class="border-t border-sand bg-white">
        <div class="mx-auto w-full max-w-3xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Get started.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Looking for a support provider you can trust? Book a free consultation and experience the
                difference with Harbourview Care Services.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="{{ route('page.show', 'referrals') }}" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Make a Referral
                </a>
                <a href="tel:0890000000" class="inline-flex items-center rounded-full border-2 border-forest px-7 py-3.5 font-semibold text-forest transition-colors hover:bg-forest hover:text-white">
                    Call (08) 9000 0000
                </a>
            </div>
        </div>
    </section>
@endsection
