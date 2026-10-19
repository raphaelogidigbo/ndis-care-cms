@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | Harbourview Care Services')
@if ($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('content')
    {{-- Page hero --}}
    <section class="relative">
        <img src="{{ asset('images/stock-down-syndrome-carer.jpg') }}" alt="A participant laughing with their support worker"
             class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-forest/90 via-forest/70 to-forest/40 sm:from-forest/85 sm:via-forest/60 sm:to-forest/10"></div>
        <div class="relative mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 sm:py-20 lg:px-8 lg:py-24">
            @include('partials.breadcrumbs', ['dark' => true])
            <p class="mt-8 mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-coral">Your privacy</p>
            <h1 class="font-display max-w-2xl text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                Privacy Policy
            </h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-cream/85">
                How Harbourview Care Services collects, uses, stores and protects your personal information.
            </p>
        </div>
    </section>

    {{-- Policy content --}}
    <section class="mx-auto w-full max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <p class="rounded-2xl bg-cream-dark/40 px-6 py-4 text-sm italic leading-relaxed text-forest/70">
            Last updated: January 2026. This policy is provided as a draft and should be reviewed to ensure it
            reflects Harbourview Care Services' practices.
        </p>

        <div class="mt-10 space-y-4 leading-relaxed text-forest/85">
            <p>
                Harbourview Care Services (ABN 12 345 678 901) is committed to protecting your privacy and handling
                your personal information in accordance with the Privacy Act 1988 (Cth) and the
                Australian Privacy Principles (APPs). This policy explains how we collect, use, store and
                protect the information you share with us when you use this website or our services.
            </p>
            <p>
                We may update this policy from time to time by updating this page. We encourage you to check
                this page periodically to make sure you are happy with any changes.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">What information we collect</h2>
        <p class="mb-5 leading-relaxed text-forest/85">
            Depending on how you interact with us, we may collect:
        </p>
        <ul class="mb-5 list-disc space-y-2 pl-6 leading-relaxed text-forest/85 marker:text-coral">
            <li>Your name, contact details (phone, email, address) and date of birth</li>
            <li>NDIS-related information, such as your NDIS number, plan details and support needs</li>
            <li>Information about your health, disability or mental health needs that you choose to share with us (sensitive information)</li>
            <li>Referral details provided by families, guardians, Support Coordinators or health professionals</li>
            <li>Employment and application information when you apply for a role (e.g. resume, qualifications, referees)</li>
            <li>Feedback, complaints and enquiries you submit</li>
            <li>Basic technical information when you use this website (such as browser type and pages visited)</li>
        </ul>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">How we use your information</h2>
        <p class="mb-5 leading-relaxed text-forest/85">
            We require this information to understand your needs and provide you with a better service. In
            particular, we use it to:
        </p>
        <ul class="mb-5 list-disc space-y-2 pl-6 leading-relaxed text-forest/85 marker:text-coral">
            <li>Respond to enquiries, referrals and feedback</li>
            <li>Assess and deliver appropriate NDIS support services</li>
            <li>Meet our obligations as a registered NDIS provider</li>
            <li>Process job applications and manage recruitment</li>
            <li>Keep internal records and improve our services and this website</li>
        </ul>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">How we store and protect your information</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                We are committed to ensuring that your information is secure. We take reasonable steps —
                physical, electronic and managerial — to protect personal information from misuse, loss,
                unauthorised access, modification or disclosure. Access is limited to team members who need
                it to perform their role, and we retain information only for as long as needed for the purpose
                it was collected, or as required by law.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">When we may disclose information</h2>
        <p class="mb-5 leading-relaxed text-forest/85">
            We do not sell, distribute or lease your personal information to third parties. We may disclose
            information:
        </p>
        <ul class="mb-5 list-disc space-y-2 pl-6 leading-relaxed text-forest/85 marker:text-coral">
            <li>To people involved in your care (such as your Support Coordinator or allied health professionals) with your consent</li>
            <li>To the NDIS Quality and Safeguards Commission or other regulatory bodies where required</li>
            <li>To service providers who support our operations, under appropriate confidentiality obligations</li>
            <li>Where required or authorised by law</li>
        </ul>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Cookies</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                This website uses only the cookies it needs to function — such as session and security
                cookies that keep forms and logins working safely. We do not use advertising or tracking
                cookies. You can set your browser to decline cookies, though parts of the site may not work
                as intended if you do.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Links to other websites</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                Our website may contain links to other websites of interest, such as the NDIS. Once you use
                these links to leave our site, we do not have any control over that other website and cannot
                be responsible for the protection and privacy of any information you provide while visiting
                it. Please check the privacy statement of the website in question.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Access and correction</h2>
        <div class="space-y-4 leading-relaxed text-forest/85">
            <p>
                You may request access to the personal information we hold about you, or ask us to correct it
                if it is inaccurate, incomplete or out of date. To do so, contact us using the details below —
                we will promptly correct any information found to be incorrect.
            </p>
        </div>

        <h2 class="font-display mt-12 mb-4 text-2xl font-semibold tracking-tight text-forest sm:text-3xl">Complaints</h2>
        <p class="mb-5 leading-relaxed text-forest/85">
            If you believe we have breached your privacy, please contact us first so we can try to resolve
            the issue. You can also contact:
        </p>
        <ul class="mb-5 list-disc space-y-2 pl-6 leading-relaxed text-forest/85 marker:text-coral">
            <li>The NDIS Quality and Safeguards Commission on <a href="tel:1800035544" class="font-semibold text-coral hover:text-coral-dark">1800 035 544</a> or at <a href="https://www.ndiscommission.gov.au" class="font-semibold text-coral hover:text-coral-dark" rel="noopener noreferrer" target="_blank">www.ndiscommission.gov.au</a></li>
            <li>The Office of the Australian Information Commissioner (OAIC) at <a href="https://www.oaic.gov.au" class="font-semibold text-coral hover:text-coral-dark" rel="noopener noreferrer" target="_blank">www.oaic.gov.au</a></li>
        </ul>

        {{-- Contact callout --}}
        <div class="mt-14 rounded-3xl bg-forest p-8 text-cream sm:p-10">
            <h2 class="font-display text-2xl font-semibold text-white">Questions about your privacy?</h2>
            <p class="mt-3 text-sm leading-relaxed text-cream/80">
                Questions about this policy or your personal information can be directed to:
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
