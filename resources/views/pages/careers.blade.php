@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    {{-- Page hero --}}
    <section class="relative">
        <img src="{{ asset('images/serv-img39.jpg') }}" alt="A job candidate in an interview with a hiring manager"
             class="absolute inset-0 h-full w-full object-cover" loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/30 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            @include('partials.breadcrumbs', ['dark' => true])
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Careers at Harbourview</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                Join our team.
            </h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">
                We're always looking for passionate, reliable and compassionate people who are committed to
                making a difference in the lives of others.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="tel:0890000000" class="inline-flex items-center rounded-full bg-coral px-7 py-3.5 font-semibold text-white transition-colors hover:bg-coral-dark">
                    Call (08) 9000 0000
                </a>
                <a href="mailto:hr@example.com" class="inline-flex items-center rounded-full border-2 border-cream px-7 py-3.5 font-semibold text-cream transition-colors hover:bg-cream hover:text-forest">
                    Email Our Team
                </a>
            </div>
        </div>
    </section>

    {{-- Who we're looking for --}}
    <section class="mx-auto w-full max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="grid items-start gap-10 lg:grid-cols-2 lg:gap-16">
            <div>
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Who We're Looking For</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">
                    Roles that make a real difference.
                </h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    If you are a Support Worker, Nurse, Recovery Coach, or have experience and skills that align
                    with disability and mental health support, we would love to hear from you. We value
                    professionalism, empathy and a genuine commitment to high-quality, person-centred care.
                </p>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Relevant experience in disability or mental health support',
                        'Strong communication and interpersonal skills',
                        'Reliability and professionalism',
                        'A genuine passion for supporting others',
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

            <div class="rounded-3xl bg-cream-dark/60 p-8 sm:p-10">
                <h2 class="font-display text-xl font-semibold">Open positions</h2>
                @if ($jobListings->isNotEmpty())
                    <ul class="mt-4 space-y-4">
                        @foreach ($jobListings as $job)
                            <li class="rounded-2xl bg-white p-5 ring-1 ring-forest/5">
                                <div class="flex flex-wrap items-center gap-x-3 gap-y-1">
                                    <h3 class="font-semibold">{{ $job->title }}</h3>
                                    @if ($job->employment_type)
                                        <span class="rounded-full bg-coral/15 px-3 py-0.5 text-xs font-semibold text-coral">{{ str_replace('_', '-', ucfirst($job->employment_type)) }}</span>
                                    @endif
                                    @if ($job->location)
                                        <span class="text-xs text-forest/60">{{ $job->location }}</span>
                                    @endif
                                </div>
                                @if ($job->summary)
                                    <p class="mt-2 text-sm leading-relaxed text-forest/75">{{ $job->summary }}</p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    <p class="mt-4 text-sm text-forest/75">Apply using the form below — mention the role in your message.</p>
                @else
                    <p class="mt-3 text-sm leading-relaxed text-forest/75">
                        We don't have any advertised vacancies right now — but expressions of interest are always
                        welcome. Send us your resume and a short introduction and we'll be in touch when a
                        suitable role opens up.
                    </p>
                @endif
                <p class="mt-5 text-sm font-semibold text-forest">
                    Prefer email? Send your resume to
                    <a href="mailto:hr@example.com" class="text-coral hover:text-coral-dark">hr@example.com</a>
                </p>
            </div>
        </div>
    </section>

    {{-- Application form --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto w-full max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-forest/5 sm:p-10">
                <h2 class="font-display text-2xl font-semibold tracking-tight sm:text-3xl">Apply or register your interest</h2>
                <p class="mt-3 text-sm leading-relaxed text-forest/70">
                    Tell us a little about yourself and the kind of role you're looking for.
                </p>
                <div class="mt-8">
                    @include('forms.careers')
                </div>
            </div>
        </div>
    </section>
@endsection
