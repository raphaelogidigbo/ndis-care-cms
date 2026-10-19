<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

        <title>@yield('title', 'Harbourview Care Services | NDIS Disability Support in Melbourne, WA')</title>
        <meta name="description" content="@yield('meta_description', 'Registered NDIS provider in Melbourne, WA. Person-centred disability support services delivered with compassion and respect.')">
        @hasSection('robots')
            <meta name="robots" content="@yield('robots')">
        @endif
        <link rel="canonical" href="@yield('canonical', url()->current())">
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

        <meta property="og:type" content="website">
        <meta property="og:title" content="@yield('title', 'Harbourview Care Services | NDIS Disability Support in Melbourne, WA')">
        <meta property="og:description" content="@yield('meta_description', 'Registered NDIS provider in Melbourne, WA. Person-centred disability support services delivered with compassion and respect.')">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="@yield('og_image', asset('images/stock-hero-conversation.jpg'))">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700|inter:400,500,600,700|caveat:500,600&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-cream font-sans text-forest antialiased">
        <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:z-50 focus:bg-coral focus:px-4 focus:py-2 focus:text-white">
            Skip to content
        </a>

        @include('partials.header')

        <main id="main-content">
            @yield('content')
        </main>

        @include('partials.footer')

        @include('partials.json-ld')

        <a href="tel:0890000000"
           class="fixed inset-x-4 bottom-[max(1rem,env(safe-area-inset-bottom))] z-40 inline-flex items-center justify-center gap-2 rounded-full bg-coral px-6 py-4 text-base font-semibold text-white shadow-lg md:hidden">
            <img src="{{ asset('images/ph-icon01.png') }}" alt="" class="h-5 w-5" aria-hidden="true">
            Call (08) 9000 0000
        </a>
    </body>
</html>
