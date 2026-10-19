@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' | Harbourview Care Services')
@if ($service->meta_description)
    @section('meta_description', $service->meta_description)
@endif

@php($listings = \App\Models\SdaListing::published()->ordered()->get())
@php($suburbs = $listings->pluck('suburb')->unique()->sort())
@php($categories = $listings->pluck('design_category')->unique())

@section('content')
    @include('partials.service-hero')

    {{-- Intro --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/Shared-Living-Support-ndis-2.png') }}" alt="Participants sharing daily life in an accessible SDA home"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div>
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Specialist Disability Accommodation</p>
            <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Homes designed around you.</h2>
            <p class="mt-4 leading-relaxed text-forest/80">
                Specialist Disability Accommodation (SDA) is housing purpose-built for NDIS participants with
                extreme functional impairment or very high support needs — homes where the design itself makes
                daily life easier, safer and more independent.
            </p>
            <p class="mt-4 leading-relaxed text-forest/80">
                At Harbourview Care Services, our SDA homes are professionally managed and tailored to each resident —
                because a home should fit your life, not the other way around.
            </p>
        </div>
    </section>

    {{-- Design categories --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">NDIS Design Categories</p>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Built to the SDA Design Standard.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    SDA homes are certified against four NDIS design categories — your plan identifies which
                    category and building type you are funded for.
                </p>
                <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                    @foreach ([
                        'Improved Liveability — enhanced design for sensory, intellectual or cognitive needs',
                        'Fully Accessible — step-free, wheelchair-friendly homes for significant physical impairment',
                        'Robust — durable, low-maintenance homes built for resilience and safety',
                        'High Physical Support — ceiling hoists, assistive technology and on-site overnight support provisions',
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
            <img src="{{ asset('images/stock-wheelchair-kitchen.jpg') }}" alt="An accessible kitchen designed for wheelchair users"
                 class="order-1 w-full rounded-[2rem] object-cover shadow-lg lg:order-2" loading="lazy">
        </div>
    </section>

    {{-- Built for independence + eligibility --}}
    <section class="mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
        <img src="{{ asset('images/Shared-Living-Support-ndis-7.png') }}" alt="A support worker assisting a resident at home"
             class="w-full rounded-[2rem] object-cover shadow-lg" loading="lazy">
        <div class="space-y-6">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">Built for independence.</h2>
                <p class="mt-4 leading-relaxed text-forest/80">
                    Our homes include step-free entries, widened doorways, accessible kitchens and bathrooms,
                    open-plan living, provision for assistive technology and smart-home controls, and safety
                    features such as emergency systems and secure outdoor areas.
                </p>
            </div>
            <div class="rounded-2xl bg-cream-dark/50 p-6">
                <h3 class="font-display text-lg font-semibold">Eligibility &amp; costs</h3>
                <p class="mt-2 text-sm leading-relaxed text-forest/70">
                    SDA is funded through your NDIS plan when standard housing cannot meet your needs. Residents
                    contribute a reasonable rent contribution — around a quarter of the Disability Support Pension
                    plus Commonwealth Rent Assistance — while daily supports such as SIL are funded separately.
                </p>
            </div>
        </div>
    </section>

    {{-- Current vacancies --}}
    <section class="bg-cream-dark/40">
        <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20" x-data="{ suburb: '', category: '' }">
            <div class="flex flex-wrap items-end justify-between gap-6">
                <div>
                    <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Current Vacancies</p>
                    <h2 class="font-display text-3xl font-semibold tracking-tight sm:text-4xl">
                        Available homes &amp; upcoming vacancies.
                    </h2>
                    <p class="mt-4 max-w-2xl leading-relaxed text-forest/80">
                        Browse our current and upcoming SDA properties across Melbourne. Can't find the right fit?
                        Get in touch — new homes become available regularly.
                    </p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <label class="sr-only" for="sda-suburb">Filter by suburb</label>
                    <select id="sda-suburb" x-model="suburb"
                            class="rounded-full border border-sand bg-white px-5 py-2.5 text-sm font-medium text-forest focus:border-coral focus:outline-none">
                        <option value="">All suburbs</option>
                        @foreach ($suburbs as $suburbOption)
                            <option value="{{ $suburbOption }}">{{ $suburbOption }}</option>
                        @endforeach
                    </select>
                    <label class="sr-only" for="sda-category">Filter by design category</label>
                    <select id="sda-category" x-model="category"
                            class="rounded-full border border-sand bg-white px-5 py-2.5 text-sm font-medium text-forest focus:border-coral focus:outline-none">
                        <option value="">All categories</option>
                        @foreach ($categories as $categoryOption)
                            <option value="{{ $categoryOption->value }}">{{ $categoryOption->getLabel() }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if ($listings->isNotEmpty())
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($listings as $listing)
                        <article x-show="(suburb === '' || suburb === @js($listing->suburb)) && (category === '' || category === '{{ $listing->design_category->value }}')"
                                 x-transition.opacity.duration.150ms
                                 class="flex flex-col overflow-hidden rounded-[1.5rem] bg-white shadow-sm ring-1 ring-forest/10">
                            @if ($listing->image)
                                <div class="relative">
                                    <img src="{{ asset('images/'.$listing->image) }}" alt="{{ $listing->title }}"
                                         class="aspect-[4/3] w-full object-cover" loading="lazy">
                                    <span class="absolute left-4 top-4 rounded-full px-3 py-1 text-xs font-semibold text-white {{ $listing->status === \App\Enums\SdaListingStatus::Available ? 'bg-coral' : 'bg-forest/80' }}">
                                        {{ $listing->status->getLabel() }}
                                    </span>
                                </div>
                            @endif
                            <div class="flex flex-1 flex-col p-6">
                                <p class="text-xs font-semibold uppercase tracking-[0.15em] text-coral">{{ $listing->design_category->getLabel() }}</p>
                                <h3 class="font-display mt-2 text-xl font-semibold">{{ $listing->title }}</h3>
                                <p class="mt-1 text-sm text-forest/60">
                                    {{ $listing->address ? $listing->address.', '.$listing->suburb : $listing->suburb }}
                                    @if ($listing->bedrooms || $listing->bathrooms)
                                        &middot; {{ $listing->bedrooms }} bed &middot; {{ $listing->bathrooms }} bath
                                    @endif
                                </p>
                                @if ($listing->summary)
                                    <p class="mt-3 flex-1 text-sm leading-relaxed text-forest/75">{{ $listing->summary }}</p>
                                @endif
                                <a href="{{ route('page.show', 'referrals') }}"
                                   class="mt-5 inline-flex items-center text-sm font-semibold text-coral transition-colors hover:text-coral-dark">
                                    Enquire about this home <span aria-hidden="true" class="ml-1">&rarr;</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="mt-10 rounded-[1.5rem] bg-white p-8 text-center ring-1 ring-forest/10">
                    <p class="text-forest/70">No vacancies listed right now — contact our team to join the waitlist.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- Approach + who it's for --}}
    <section class="bg-forest">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
            <div>
                <h2 class="font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">Our approach</h2>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'Professionally managed, well-maintained homes',
                        'Tenancy support that respects your rights and privacy',
                        'Homes matched to your design category and lifestyle',
                        'Responsive maintenance and safety-first standards',
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
                        'Participants with extreme functional impairment',
                        'People with very high support needs',
                        'Those whose needs can’t be met by standard housing',
                        'Participants with SDA funding in their NDIS plan',
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
