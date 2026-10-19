<footer class="bg-forest text-cream">
    <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-14 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">
        <div>
            <img src="{{ asset('images/ft-logo.png') }}" alt="Harbourview Care Services" class="mb-4 h-12 w-auto">
            <p class="text-sm leading-relaxed text-cream/80">
                Person-centred NDIS disability support services in Melbourne, WA — delivered with compassion, dignity, and respect.
            </p>
            <div class="mt-4 flex items-center gap-3">
                <a href="https://www.facebook.com/harbourviewcare" rel="noopener" aria-label="Facebook" class="inline-flex h-10 w-10 items-center justify-center">
                    <img src="{{ asset('images/fb-icon01.png') }}" alt="" class="h-8 w-8">
                </a>
                <a href="https://www.instagram.com/harbourviewcare" rel="noopener" aria-label="Instagram" class="inline-flex h-10 w-10 items-center justify-center">
                    <img src="{{ asset('images/ins-icon01.png') }}" alt="" class="h-8 w-8">
                </a>
                <a href="https://www.linkedin.com/company/harbourview-care-services" rel="noopener" aria-label="LinkedIn" class="inline-flex h-10 w-10 items-center justify-center">
                    <img src="{{ asset('images/ld-icon01.png') }}" alt="" class="h-8 w-8">
                </a>
            </div>
        </div>

        <nav aria-label="Footer navigation">
            <h2 class="font-display mb-4 text-lg font-semibold text-white">Explore</h2>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                @foreach ($navPages as $navPage)
                    <li>
                        <a href="{{ $navPage->slug === 'services' ? route('services.index') : route('page.show', $navPage->slug) }}" class="hover:text-white">
                            {{ $navPage->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <nav aria-label="Footer services">
            <h2 class="font-display mb-4 text-lg font-semibold text-white">Our Services</h2>
            <ul class="space-y-2 text-sm">
                @foreach ($navServices as $navService)
                    <li>
                        <a href="{{ route('page.show', $navService->slug) }}" class="hover:text-white">
                            {{ $navService->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div>
            <h2 class="font-display mb-4 text-lg font-semibold text-white">Get in Touch</h2>
            <ul class="space-y-3 text-sm">
                <li class="flex items-start gap-2.5">
                    <img src="{{ asset('images/ph-icon03.png') }}" alt="" class="mt-0.5 h-4 w-4" aria-hidden="true">
                    <a href="tel:0890000000" class="hover:text-white">(08) 9000 0000</a>
                </li>
                <li class="flex items-start gap-2.5">
                    <img src="{{ asset('images/email-icon03.png') }}" alt="" class="mt-0.5 h-4 w-4" aria-hidden="true">
                    <a href="mailto:info@example.com" class="hover:text-white">info@example.com</a>
                </li>
                <li class="flex items-start gap-2.5">
                    <img src="{{ asset('images/location-icon01.png') }}" alt="" class="mt-0.5 h-4 w-4" aria-hidden="true">
                    <span>34 Melbourne Road<br>Melbourne WA 6106</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <img src="{{ asset('images/clock-icon0102-1.png') }}" alt="" class="mt-0.5 h-4 w-4" aria-hidden="true">
                    <span>Monday&ndash;Friday, 9am&ndash;5pm</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="border-t border-cream/15">
        <div class="mx-auto flex w-full max-w-7xl flex-wrap items-center justify-between gap-x-6 gap-y-2 px-4 pb-24 pt-5 text-xs text-cream/70 sm:px-6 md:pb-5 lg:px-8">
            <p>&copy; {{ date('Y') }} Harbourview Care Services. All rights reserved.</p>
            <ul class="flex items-center gap-4">
                <li><a href="{{ route('page.show', 'privacy-policy') }}" class="hover:text-white">Privacy Policy</a></li>
                <li><a href="{{ route('page.show', 'terms-of-use') }}" class="hover:text-white">Terms of Use</a></li>
            </ul>
            <p>ABN 12 345 678 901 &middot; NDIS Provider Registration 0000000000</p>
        </div>
    </div>
</footer>
