@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    {{-- Page hero --}}
    <section class="relative">
        <img src="{{ asset('images/stock-budgeting.jpg') }}" alt="A support coordinator reviewing paperwork with a participant"
             class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
            @include('partials.breadcrumbs', ['dark' => true])
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Referrals</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Make a referral.
            </h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">
                Referrals can be made by participants, families, guardians, Support Coordinators and allied
                health professionals. Complete the form below and our team will be in touch.
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
            Every referral matters.
        </p>
    </section>

    {{-- Who can refer --}}
    <section class="mx-auto w-full max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['Participants', 'Refer yourself for NDIS disability or mental health support.'],
                ['Families & Guardians', 'Refer a family member or someone in your care.'],
                ['Support Coordinators', 'Send us participant referrals — we respond promptly.'],
                ['Health Professionals', 'GPs, therapists and allied health referrals are welcome.'],
            ] as [$title, $text])
                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-forest/5">
                    <h2 class="font-display text-lg font-semibold">{{ $title }}</h2>
                    <p class="mt-2 text-sm leading-relaxed text-forest/70">{{ $text }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Referral form --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto w-full max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-forest/5 sm:p-10">
                <h2 class="font-display text-2xl font-semibold tracking-tight sm:text-3xl">Referral details</h2>
                <p class="mt-3 text-sm leading-relaxed text-forest/70">
                    Tell us a little about the participant and the support they're looking for. Fields marked
                    <span class="text-coral">*</span> are required — the rest helps us respond faster.
                </p>
                <div class="mt-8">
                    @include('forms.referral')
                </div>
            </div>
        </div>
    </section>

    {{-- What happens next --}}
    <section class="mx-auto w-full max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <h2 class="font-display text-center text-3xl font-semibold tracking-tight sm:text-4xl">What happens next?</h2>
        <ol class="mx-auto mt-10 grid max-w-4xl gap-6 sm:grid-cols-3">
            @foreach ([
                ['We review your referral', 'Our team reviews the details and checks how we can best support the participant.'],
                ['We get in touch', "We'll contact you — usually within one business day — to talk through next steps."],
                ['Support begins', 'We match the participant with the right support workers and agree on a start date.'],
            ] as $i => [$title, $text])
                <li class="text-center">
                    <span class="font-display mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-coral text-lg font-semibold text-white">
                        {{ $i + 1 }}
                    </span>
                    <h3 class="font-display mt-4 text-lg font-semibold">{{ $title }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-forest/70">{{ $text }}</p>
                </li>
            @endforeach
        </ol>
        <p class="mt-10 text-center text-sm text-forest/70">
            Prefer to talk first? Call us on
            <a href="tel:0890000000" class="font-semibold text-coral hover:text-coral-dark">(08) 9000 0000</a>
            or email
            <a href="mailto:info@example.com" class="font-semibold text-coral hover:text-coral-dark">info@example.com</a>.
        </p>
    </section>
@endsection
