@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@php($items = \App\Support\ContentRenderer::accordionItems($page->content_html))

@section('content')
    {{-- Page hero --}}
    <section class="relative">
        <img src="{{ asset('images/stock-therapy-session.jpg') }}" alt="A support worker answering a participant's questions"
             class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
            @include('partials.breadcrumbs', ['dark' => true])
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Frequently Asked Questions</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Answers to common questions.
            </h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">
                Everything you need to know about our NDIS support services in Melbourne — and how to get started.
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
            No question too small.
        </p>
    </section>

    <section class="mx-auto w-full max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        @if ($items === [])
            <div class="site-content">
                {{ \App\Support\ContentRenderer::render($page->content_html) }}
            </div>
        @else
            <div class="divide-y divide-sand overflow-hidden rounded-3xl bg-white ring-1 ring-forest/5" x-data="{ open: 0 }">
                @foreach ($items as $i => $item)
                    <div>
                        <h2>
                            <button type="button" @click="open = open === {{ $i }} ? null : {{ $i }}"
                                    :aria-expanded="open === {{ $i }}" aria-controls="faq-panel-{{ $i }}"
                                    class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left font-display text-lg font-semibold text-forest transition-colors hover:bg-cream-dark/30 sm:px-8">
                                {{ $item['question'] }}
                                <svg class="h-5 w-5 shrink-0 text-coral transition-transform duration-300"
                                     :class="open === {{ $i }} ? 'rotate-180' : ''"
                                     viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                    <path d="m5 7.5 5 5 5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="faq-panel-{{ $i }}" x-show="open === {{ $i }}" @if ($i !== 0) x-cloak @endif
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0">
                            <div class="site-content px-6 pb-6 text-sm leading-relaxed text-forest/75 sm:px-8">
                                {{ $item['answer'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Still need help --}}
        <div class="mt-12 rounded-3xl bg-forest p-8 text-center text-cream sm:p-10">
            <h2 class="font-display text-2xl font-semibold text-white">Still have a question?</h2>
            <p class="mt-3 text-sm leading-relaxed text-cream/80">
                Our team is happy to help — reach out and we'll talk it through together.
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3">
                <a href="{{ route('page.show', 'contact-us') }}" class="inline-flex items-center rounded-full bg-coral px-7 py-3 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Contact Us
                </a>
                <a href="tel:0890000000" class="inline-flex items-center rounded-full border-2 border-cream px-7 py-3 font-semibold text-cream transition-colors hover:bg-cream hover:text-forest">
                    Call (08) 9000 0000
                </a>
            </div>
        </div>
    </section>
@endsection
