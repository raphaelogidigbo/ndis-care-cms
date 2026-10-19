@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' | Harbourview Care Services')
@if ($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif

@section('content')
    @include('partials.service-hero')

    {{-- Intro --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/Community-Nursing-Care-lg-3.png') }}" alt="A nurse providing complex care support in a participant's home"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">High Intensity Support</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Complex care, delivered with dignity.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                High intensity personal activities are supports for participants with more complex health and care
                needs — tasks that require additional training, clinical oversight and careful, consistent delivery.
            </p>
            <p class="mt-4 leading-relaxed text-forest/80">
                At Harbourview Care Services, our high intensity supports are provided by workers who are trained and
                assessed against the NDIS High Intensity Support Skills Descriptors, so every task is performed
                safely and in line with your care plan.
            </p>
        </div>
    </section>

    {{-- What we support --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">What We Support</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Skilled support for complex needs.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    Depending on your individual needs and NDIS plan, high intensity support can include:
                </p>
                <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                    @foreach ([
                        'Enteral (PEG) feeding and mealtime management',
                        'Tracheostomy and ventilator support',
                        'Complex bowel care and catheter care',
                        'Subcutaneous injections and medication administration',
                        'Diabetes management and monitoring',
                        'Severe dysphagia support',
                        'Wound and pressure care',
                        'Seizure management support',
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
            <img src="{{ asset('images/stock-pexels-tima-6609516.jpg') }}" alt="A participant with high support needs receiving assistance"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- Trained workers + funding --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/Community-Nursing-Care-5.png') }}" alt="A nurse providing hands-on clinical support to a participant"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div class="space-y-6">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Trained &amp; supported workers.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    High intensity tasks are only ever performed by workers who have been specifically trained and
                    assessed as competent for that task — with oversight from qualified nursing staff. We match you
                    with consistent, familiar workers wherever possible, so your care is delivered by people who
                    understand your routines, preferences and communication style.
                </p>
            </div>
            <div class="rounded-2xl bg-cream-dark/50 p-6">
                <h3 class="font-display text-lg font-semibold">Funded through your NDIS plan</h3>
                <p class="mt-2 text-sm leading-relaxed text-forest/70">
                    High intensity personal activities are typically funded under Core Supports. If you are unsure
                    whether this support is included in your plan, our team can help you understand your funding and
                    prepare for your next plan review.
                </p>
            </div>
        </div>
    </section>

    {{-- Approach + who it's for --}}
    <section class="bg-forest">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Our approach</h2>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Competency-assessed workers for every high intensity task',
                        'Documented care plans reviewed with your health team',
                        'Nursing oversight and clinical governance',
                        'Dignity, comfort and choice in every interaction',
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
                        'Participants with complex health and care needs',
                        'People requiring clinical or nursing-level support at home',
                        'Participants whose plans fund high intensity supports',
                        'Families wanting safe, consistent and skilled care',
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
