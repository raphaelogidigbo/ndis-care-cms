@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    {{-- Page hero --}}
    <section class="relative">
        <img src="{{ asset('images/stock-phone-support.jpg') }}" alt="A friendly helpline conversation with the Harbourview Care team"
             class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
            @include('partials.breadcrumbs', ['dark' => true])
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Contact Us</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Let's talk about the support you need.
            </h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">
                Whether you're exploring NDIS support for yourself, a family member or a participant you work
                with — our team is here to help.
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
            We'd love to hear from you.
        </p>
    </section>

    <section class="mx-auto w-full max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="grid gap-8 lg:grid-cols-5">
            {{-- Contact details --}}
            <div class="lg:col-span-2">
                <div class="rounded-3xl bg-forest p-8 text-cream sm:p-10">
                    <h2 class="font-display text-2xl font-semibold text-white">Get in touch</h2>
                    <ul class="mt-8 space-y-6">
                        <li class="flex items-start gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-cream/10" aria-hidden="true">
                                <img src="{{ asset('images/ph-icon03.png') }}" alt="" class="h-5 w-5">
                            </span>
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-wider text-cream/60">Phone</p>
                                <a href="tel:0890000000" class="mt-1 block text-lg font-semibold text-white hover:text-coral">(08) 9000 0000</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-cream/10" aria-hidden="true">
                                <img src="{{ asset('images/email-icon03.png') }}" alt="" class="h-5 w-5">
                            </span>
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-wider text-cream/60">Email</p>
                                <a href="mailto:info@example.com" class="mt-1 block text-lg font-semibold text-white hover:text-coral">info@example.com</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-cream/10" aria-hidden="true">
                                <img src="{{ asset('images/location-icon0103.png') }}" alt="" class="h-5 w-5">
                            </span>
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-wider text-cream/60">Address</p>
                                <p class="mt-1 text-lg font-semibold text-white">34 Melbourne Road<br>Melbourne WA 6106</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-cream/10" aria-hidden="true">
                                <img src="{{ asset('images/clock-icon0102-1.png') }}" alt="" class="h-5 w-5">
                            </span>
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-wider text-cream/60">Working hours</p>
                                <p class="mt-1 text-lg font-semibold text-white">Monday&ndash;Friday, 9am&ndash;5pm</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-cream/10" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                </svg>
                            </span>
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-wider text-cream/60">NDIS Registered</p>
                                <p class="mt-1 text-lg font-semibold text-white">Reg. No. 0000000000</p>
                            </div>
                        </li>
                    </ul>
                    <p class="mt-8 border-t border-cream/15 pt-6 text-sm leading-relaxed text-cream/70">
                        We support NDIS participants across Melbourne — both North and South of the River.
                    </p>
                </div>
            </div>

            {{-- Contact form --}}
            <div class="lg:col-span-3">
                <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-forest/5 sm:p-10">
                    <h2 class="font-display text-2xl font-semibold tracking-tight sm:text-3xl">Send us a message</h2>
                    <p class="mt-3 text-sm leading-relaxed text-forest/70">
                        Fill in the form and we'll get back to you — usually within one business day.
                    </p>
                    <div class="mt-8">
                        @include('forms.contact')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
