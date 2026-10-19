@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    {{-- Page hero --}}
    <section class="relative">
        <img src="{{ asset('images/stock-office-meeting.jpg') }}" alt="A team meeting at Harbourview Care Services"
             class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 sm:py-20 lg:px-8 lg:py-24">
            @include('partials.breadcrumbs', ['dark' => true])
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Website terms</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                Terms of Use
            </h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">
                The terms that govern your use of the Harbourview Care Services website.
            </p>
        </div>
    </section>

    {{-- Terms content --}}
    <section class="mx-auto w-full max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <p class="rounded-2xl bg-cream-dark/40 px-6 py-4 text-sm italic leading-relaxed text-forest/70">
            Last updated: January 2026. These terms are provided as a draft and should be reviewed before launch.
        </p>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Introduction</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                The Terms of Use of the Harbourview Care Services website include these Terms of Use, our
                <a href="{{ route('page.show', 'privacy-policy') }}" class="font-semibold text-coral hover:text-coral-dark">Privacy Policy</a>
                and any other terms and conditions that appear in, or are linked to, this website.
            </p>
            <p>
                By using this website you agree to be bound by these terms. If you do not agree, please do not
                use the site.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Website content and access</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                While Harbourview Care Services takes reasonable care in preparing and maintaining the information on
                this website, we do not warrant the accuracy, reliability, adequacy or completeness of the
                website content. Content may include technical inaccuracies or typographical errors, is
                subject to change at any time without notice, and may not be up to date at the time you view
                it.
            </p>
            <p>
                It is your responsibility to contact us directly to confirm the accuracy and currency of any
                information you seek to rely on. We do not guarantee that access to this website will be
                uninterrupted, or that the website is free from viruses or anything else that may damage your
                computer or device.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Information, not advice</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                Content on this site is general in nature and does not constitute medical, legal or
                professional advice. Service availability and eligibility may vary — please contact us to
                discuss your circumstances.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Limitation of liability</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                To the maximum extent permitted by law, Harbourview Care Services excludes all liability for any loss
                or damage of any kind (including direct, indirect, incidental, special or consequential
                damages) arising out of, or in any way connected with, the website content and the use or
                performance of this website, except to the extent that the loss or damage is directly caused
                by our fraud or wilful misconduct.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Intellectual property</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                The materials displayed on this website — including text, information, photographs,
                illustrations, artwork, names, logos, trademarks and other graphic materials — are owned by
                or licensed to Harbourview Care Services and are protected by copyright and other intellectual
                property laws. You must not reproduce, retransmit, distribute, sell, publish or circulate any
                of this material to any third party without our express prior written consent.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Submissions</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                Material you send to us through this website (such as general comments or suggestions) is
                deemed to be non-confidential and non-proprietary unless indicated otherwise, and we may use
                it for any purpose without compensation to you.
            </p>
            <p>
                Information submitted through our referral, feedback, careers and contact forms is handled in
                accordance with our
                <a href="{{ route('page.show', 'privacy-policy') }}" class="font-semibold text-coral hover:text-coral-dark">Privacy Policy</a>.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Third-party websites</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                This website may contain links to websites operated by third parties (such as the NDIS).
                Unless otherwise indicated, Harbourview Care Services does not control, endorse or approve those
                websites or their content, and takes no responsibility for any aspect of them.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Linking to this website</h2>
        <p class="mb-5 leading-relaxed text-forest/85">
            If you wish to link to this website, please seek our approval first by emailing
            <a href="mailto:info@example.com" class="font-semibold text-coral hover:text-coral-dark">info@example.com</a>
            with the following information:
        </p>
        <ul class="mb-5 list-disc space-y-2 pl-6 leading-relaxed text-forest/85 marker:text-coral">
            <li>The URL of the website you wish to link from</li>
            <li>A brief description of your website</li>
            <li>The reason you wish to establish the link</li>
        </ul>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                If we approve your link, you must comply with any conditions we set. If the nature or content
                of your website changes significantly, please contact us again with an updated description.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Interference with this website</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                You must not attempt to change, add to, remove, deface, hack or otherwise interfere with this
                website or any material or content displayed on it, nor use automated means to submit forms
                or scrape content.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Governing law</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                These terms are governed by the laws of Western Australia.
            </p>
        </div>

        {{-- Contact callout --}}
        <div class="mt-14 rounded-3xl bg-forest p-8 text-cream sm:p-10">
            <h2 class="font-display text-2xl font-semibold text-white">Questions about these terms?</h2>
            <p class="mt-3 text-sm leading-relaxed text-cream/80">
                Questions about these Terms of Use can be directed to:
            </p>
            <ul class="mt-6 space-y-3 text-sm">
                <li class="flex flex-wrap items-baseline gap-x-3 gap-y-1">
                    <span class="font-semibold uppercase tracking-wider text-cream/60">Phone</span>
                    <a href="tel:0890000000" class="font-semibold text-white hover:text-coral">(08) 9000 0000</a>
                </li>
                <li class="flex flex-wrap items-baseline gap-x-3 gap-y-1">
                    <span class="font-semibold uppercase tracking-wider text-cream/60">Email</span>
                    <a href="mailto:info@example.com" class="break-all font-semibold text-white hover:text-coral">info@example.com</a>
                </li>
                <li class="flex flex-wrap items-baseline gap-x-3 gap-y-1">
                    <span class="font-semibold uppercase tracking-wider text-cream/60">Address</span>
                    <span class="font-semibold text-white">1 Example Street, Melbourne VIC 3000</span>
                </li>
            </ul>
        </div>
    </section>
@endsection
