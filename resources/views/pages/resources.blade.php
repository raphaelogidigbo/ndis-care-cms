@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    {{-- Page hero --}}
    <section class="relative">
        <img src="{{ asset('images/serv-img03.jpg') }}" alt="A support worker sharing a friendly moment with an elderly participant"
             class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
            @include('partials.breadcrumbs', ['dark' => true])
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Resources</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Helpful resources &amp; support.
            </h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">
                Support goes beyond the services we provide. Whether you're navigating the NDIS, seeking mental
                health support, or looking for guidance as a carer — these resources can help.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="tel:0890000000" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Call (08) 9000 0000
                </a>
                <a href="{{ route('page.show', 'contact-us') }}" class="inline-flex items-center rounded-full border-2 border-cream px-7 py-3.5 font-semibold text-cream transition-colors hover:bg-cream hover:text-forest">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

    {{-- NDIS Resources --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-20">
        <img src="{{ asset('images/stock-ndis-yellow-wheelchair.png') }}" alt="A participant reviewing NDIS information on a tablet"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">NDIS Resources</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Official NDIS information.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Access official information about the National Disability Insurance Scheme, including eligibility,
                plans and participant supports.
            </p>
            <ul class="mt-6 space-y-3">
                <li>
                    <a href="https://www.ndis.gov.au" target="_blank" rel="noopener"
                       class="flex items-center justify-between gap-4 rounded-2xl bg-white p-4 font-semibold text-forest ring-1 ring-forest/10 transition-shadow hover:shadow-md">
                        NDIS Website <span class="text-sm font-medium text-coral">ndis.gov.au</span>
                    </a>
                </li>
                <li>
                    <a href="tel:1800800110"
                       class="flex items-center justify-between gap-4 rounded-2xl bg-white p-4 font-semibold text-forest ring-1 ring-forest/10 transition-shadow hover:shadow-md">
                        NDIS Contact Centre <span class="text-sm font-medium text-coral">1800 800 110</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    {{-- Mental Health Support --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-20">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Mental Health Support</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Guidance, counselling and crisis support.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    If you or someone you support needs mental health assistance, these services can help.
                </p>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        ['Beyond Blue', 'https://www.beyondblue.org.au', 'beyondblue.org.au'],
                        ['Lifeline', 'https://www.lifeline.org.au', 'lifeline.org.au'],
                        ['Head to Health', 'https://www.headtohealth.gov.au', 'headtohealth.gov.au'],
                    ] as [$name, $href, $label])
                        <li>
                            <a href="{{ $href }}" target="_blank" rel="noopener"
                               class="flex items-center justify-between gap-4 rounded-2xl bg-white p-4 font-semibold text-forest ring-1 ring-forest/10 transition-shadow hover:shadow-md">
                                {{ $name }} <span class="text-sm font-medium text-coral">{{ $label }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <img src="{{ asset('images/stock-counselling.jpg') }}" alt="A supportive counselling conversation"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- Support for Carers --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-20">
        <img src="{{ asset('images/serv-img37.jpg') }}" alt="A carer spending time with an elderly participant"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Support for Carers</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Carers matter too.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Carers play an essential role in supporting individuals — and access to the right resources
                can make a significant difference.
            </p>
            <ul class="mt-6 space-y-3">
                <li>
                    <a href="https://www.carergateway.gov.au" target="_blank" rel="noopener"
                       class="flex items-center justify-between gap-4 rounded-2xl bg-white p-4 font-semibold text-forest ring-1 ring-forest/10 transition-shadow hover:shadow-md">
                        Carer Gateway <span class="text-sm font-medium text-coral">carergateway.gov.au</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    {{-- Emergency & Crisis Support --}}
    <section class="bg-forest">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-20">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Emergency &amp; Crisis Support</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                    Urgent help is always available.
                </h2>
                <p class="mt-4 leading-relaxed text-cream/85">
                    If you are in immediate danger or require urgent assistance, please contact emergency
                    services or a crisis support line.
                </p>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        ['Emergency Services', 'tel:000', 'Call 000'],
                        ['Lifeline (24/7 Crisis Support)', 'tel:131114', '13 11 14'],
                        ['Mental Health Emergency Response Line (WA)', 'tel:1300555788', '1300 555 788'],
                    ] as [$name, $href, $label])
                        <li>
                            <a href="{{ $href }}"
                               class="flex items-center justify-between gap-4 rounded-2xl bg-cream/10 p-4 font-semibold text-white ring-1 ring-cream/15 transition-colors hover:bg-cream/15">
                                {{ $name }} <span class="text-sm font-medium text-coral">{{ $label }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <img src="{{ asset('images/stock-phone-support.jpg') }}" alt="A friendly helpline conversation — urgent support is always available"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto w-full max-w-3xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Need personalised support?</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                If you would like guidance or support tailored to your situation, our team at Harbourview Care
                Services is here to help.
            </p>
            <div class="mt-8">
                <a href="{{ route('page.show', 'contact-us') }}" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Book a Free Consultation
                </a>
            </div>
        </div>
    </section>
@endsection
