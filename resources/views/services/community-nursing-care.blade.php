@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' | Harbourview Care Services')
@if ($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif

@section('content')
    @include('partials.service-hero')

    {{-- Intro --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/Community-Nursing-Care-1.png') }}" alt="A nurse checking a participant's blood pressure at home"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Community Nursing Care</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Professional nursing care, delivered with compassion.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Clinical support delivered by qualified nurses in the comfort of your home or community setting —
                safe, professional and personalised care that supports your health needs while promoting
                independence and dignity.
            </p>
        </div>
    </section>

    {{-- What we support --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">What We Support</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Clinical care tailored to your health needs.</h2>
                <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                    @foreach ([
                        'Medication management and administration',
                        'Wound care and dressing changes',
                        'Chronic disease management',
                        'Health assessments and monitoring',
                        'Continence care support',
                        'Post-hospital care and recovery support',
                        'Coordination with doctors and allied health professionals',
                    ] as $item)
                        <li class="flex items-start gap-2.5 rounded-xl bg-white p-3 text-sm text-forest/80 ring-1 ring-forest/5 sm:col-span-1">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-coral/15" aria-hidden="true">
                                <svg class="h-3 w-3 text-coral" viewBox="0 0 14 14" fill="none"><path d="m3 7.5 2.5 2.5L11 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <img src="{{ asset('images/Community-Nursing-Care-lg-3.png') }}" alt="Qualified nursing care at home"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- Benefits --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/Community-Nursing-Care-md-4.png') }}" alt="A nurse monitoring a participant's health"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Benefits of Nursing Care at Home</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Comfort, recovery and wellbeing.</h2>
            <ul class="mt-6 space-y-3">
                @foreach ([
                    'Care in a familiar and comfortable environment',
                    'Reduced hospital visits and improved recovery outcomes',
                    'Personalised support tailored to your health needs',
                    'Access to qualified and experienced nursing professionals',
                    'Ongoing monitoring with early intervention',
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
    </section>

    {{-- Who it's for + our approach --}}
    <section class="bg-forest">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Who this service is for</h2>
                <p class="mt-4 leading-relaxed text-cream/80">
                    Suitable for individuals who require ongoing or short-term clinical support while maintaining
                    independence at home — including those who:
                </p>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Require medical or clinical care at home',
                        'Are recovering from surgery, illness or hospital discharge',
                        'Need regular health monitoring or treatment',
                        'Live with chronic conditions or complex care needs',
                        'Prefer professional support in a home environment',
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
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Our approach to care</h2>
                <p class="mt-4 leading-relaxed text-cream/80">
                    We combine clinical expertise with compassionate care — support that is:
                </p>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Person-centred — tailored to your individual needs',
                        'Professional — delivered by trained and qualified staff',
                        'Compassionate — focused on dignity, respect and comfort',
                        'Collaborative — working with families and healthcare providers',
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

    @include('partials.service-cta')
@endsection
