@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    {{-- Page hero --}}
    <section class="relative">
        <img src="{{ asset('images/stock-talking-bubble.jpg') }}" alt="A speech bubble representing your feedback"
             class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
            @include('partials.breadcrumbs', ['dark' => true])
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Feedback</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Your feedback helps us do better.
            </h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">
                Compliments, suggestions and complaints all help us improve the support we provide. Every piece
                of feedback is taken seriously and handled with care and confidentiality.
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
            Your voice matters.
        </p>
    </section>

    <section class="mx-auto w-full max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="grid gap-8 lg:grid-cols-5">
            {{-- Info column --}}
            <div class="space-y-6 lg:col-span-2">
                <div class="rounded-3xl bg-white p-8 ring-1 ring-forest/10">
                    <h2 class="font-display text-xl font-semibold">How we handle feedback</h2>
                    <ul class="mt-5 space-y-4">
                        @foreach ([
                            'We listen — every submission is read by our management team.',
                            'We acknowledge your feedback and follow up where needed.',
                            'We act — feedback informs how we train, roster and improve.',
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

                
                
            </div>

            {{-- Feedback form --}}
            <div class="lg:col-span-3">
                <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-forest/5 sm:p-10">
                    <h2 class="font-display text-2xl font-semibold tracking-tight sm:text-3xl">Share your feedback</h2>
                    <p class="mt-3 text-sm leading-relaxed text-forest/70">
                        You can submit feedback anonymously if you prefer — just leave the name and contact
                        fields blank.
                    </p>
                    <div class="mt-8">
                        @include('forms.feedback')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
