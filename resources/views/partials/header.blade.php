<header class="relative">
    {{-- Topbar --}}
    <div class="bg-forest text-cream">
        <div class="mx-auto flex w-full max-w-7xl flex-wrap items-center justify-between gap-2 px-4 py-2 text-xs sm:px-6 lg:px-8">
            <div class="flex items-center gap-4">
                <a href="tel:0890000000" class="inline-flex items-center gap-1.5 hover:text-white">
                    <img src="{{ asset('images/ph-icon02.png') }}" alt="" class="h-3.5 w-3.5" aria-hidden="true">
                    (08) 9000 0000
                </a>
                <a href="mailto:info@example.com" class="hidden items-center gap-1.5 hover:text-white sm:inline-flex">
                    <img src="{{ asset('images/email-icon02.png') }}" alt="" class="h-3.5 w-3.5" aria-hidden="true">
                    info@example.com
                </a>
            </div>
            <p class="hidden items-center gap-1.5 sm:inline-flex">
                <img src="{{ asset('images/clock-icon01.png') }}" alt="" class="h-3.5 w-3.5" aria-hidden="true">
                Mon&ndash;Fri, 9am&ndash;5pm &middot; Melbourne, WA
            </p>
        </div>
    </div>
</header>

{{-- Floating nav --}}
<div x-data="{ mobileOpen: false }" class="sticky top-4 z-50 mt-4 px-4 sm:px-6 lg:px-8">
    <nav class="mx-auto flex w-full max-w-7xl items-center justify-between rounded-full bg-white/85 py-3 pl-5 pr-3 shadow-lg ring-1 ring-forest/10 backdrop-blur-md sm:pl-6 sm:pr-4" aria-label="Main navigation">
        <a href="{{ route('home') }}" class="shrink-0">
            <img src="{{ asset('images/logo.png') }}" alt="Harbourview Care Services" class="h-10 w-auto sm:h-11">
        </a>

        {{-- Desktop nav --}}
        <ul class="hidden items-center gap-1 lg:flex">
            @foreach ($navPages as $navPage)
                @if ($navPage->slug === 'services')
                    <li x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('services.index') }}"
                           class="inline-flex items-center gap-1 rounded-full px-3 py-2 text-sm font-medium hover:bg-sand/60">
                            Services
                            <svg class="h-3 w-3" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M3 4.5 6 7.5 9 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                        <ul x-show="open" x-cloak x-transition.opacity.duration.150ms
                            class="absolute left-0 top-full z-50 w-72 rounded-2xl border border-sand bg-white p-2 pt-3 shadow-xl">
                            <li>
                                <a href="{{ route('services.index') }}" class="block rounded-xl px-4 py-2.5 text-sm font-semibold hover:bg-cream">
                                    All Services
                                </a>
                            </li>
                            @foreach ($navServices as $navService)
                                <li>
                                    <a href="{{ route('page.show', $navService->slug) }}" class="block rounded-xl px-4 py-2.5 text-sm hover:bg-cream">
                                        {{ $navService->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('page.show', $navPage->slug) }}"
                           class="rounded-full px-3 py-2 text-sm font-medium hover:bg-sand/60 @if (request()->is($navPage->slug)) bg-sand/60 @endif">
                            {{ $navPage->title }}
                        </a>
                    </li>
                @endif
            @endforeach
            <li>
                <a href="{{ route('page.show', 'referrals') }}" class="ml-2 inline-flex items-center rounded-full bg-coral px-5 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-coral-dark">
                    Make a Referral
                </a>
            </li>
        </ul>

        {{-- Mobile hamburger --}}
        <button type="button" @click="mobileOpen = true" class="rounded-full p-2 hover:bg-sand/60 lg:hidden" aria-label="Open menu">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/></svg>
        </button>
    </nav>

    {{-- Mobile drawer --}}
    <div x-show="mobileOpen" x-cloak class="fixed inset-0 z-50 lg:hidden" role="dialog" aria-modal="true">
        <div x-show="mobileOpen" x-transition.opacity.duration.200ms class="absolute inset-0 bg-forest/50" @click="mobileOpen = false"></div>

        <div x-show="mobileOpen" x-transition:enter="transition duration-300" x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0" x-transition:leave="transition duration-200"
             x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
             class="absolute inset-y-0 right-0 flex w-80 max-w-full flex-col bg-cream shadow-2xl">
            <div class="flex items-center justify-between border-b border-sand px-5 py-4">
                <img src="{{ asset('images/logo.png') }}" alt="Harbourview Care Services" class="h-10 w-auto">
                <button type="button" @click="mobileOpen = false" class="rounded-full p-2 hover:bg-sand/60" aria-label="Close menu">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/></svg>
                </button>
            </div>

            <nav class="flex-1 overflow-y-auto px-5 py-4" aria-label="Mobile navigation">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('home') }}" class="block rounded-xl px-4 py-3 font-medium hover:bg-sand/60">Home</a>
                    </li>
                    @foreach ($navPages as $navPage)
                        @if ($navPage->slug === 'services')
                            <li x-data="{ servicesOpen: false }">
                                <button type="button" @click="servicesOpen = ! servicesOpen"
                                        class="flex w-full items-center justify-between rounded-xl px-4 py-3 font-medium hover:bg-sand/60">
                                    Services
                                    <svg class="h-4 w-4 transition-transform" :class="{ 'rotate-180': servicesOpen }" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M3 4.5 6 7.5 9 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </button>
                                <ul x-show="servicesOpen" x-cloak class="ml-4 space-y-1 border-l border-sand pl-3">
                                    <li>
                                        <a href="{{ route('services.index') }}" class="block rounded-xl px-4 py-2.5 text-sm font-semibold hover:bg-sand/60">
                                            All Services
                                        </a>
                                    </li>
                                    @foreach ($navServices as $navService)
                                        <li>
                                            <a href="{{ route('page.show', $navService->slug) }}" class="block rounded-xl px-4 py-2.5 text-sm hover:bg-sand/60">
                                                {{ $navService->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('page.show', $navPage->slug) }}" class="block rounded-xl px-4 py-3 font-medium hover:bg-sand/60">
                                    {{ $navPage->title }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>

            <div class="border-t border-sand p-5">
                <a href="{{ route('page.show', 'referrals') }}" class="mb-3 flex items-center justify-center rounded-full bg-coral px-5 py-3 font-semibold text-white">
                    Make a Referral
                </a>
                <a href="tel:0890000000" class="flex items-center justify-center gap-2 rounded-full border-2 border-forest px-5 py-3 font-semibold text-forest">
                    Call (08) 9000 0000
                </a>
            </div>
        </div>
    </div>
</div>
