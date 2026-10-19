<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Error | Harbourview Care Services')</title>
        <meta name="robots" content="noindex">
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700|inter:400,500,600,700|caveat:500,600&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css'])
    </head>
    <body class="flex min-h-screen flex-col bg-cream font-sans text-forest antialiased">
        <header class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Harbourview Care Services" class="h-11 w-auto">
            </a>
        </header>

        <main class="flex flex-1 items-center">
            <section class="mx-auto w-full max-w-2xl px-4 py-16 text-center sm:px-6 lg:px-8">
                <p class="font-display text-7xl font-semibold text-coral sm:text-8xl">@yield('code')</p>
                <h1 class="font-display mt-4 text-3xl font-semibold tracking-tight sm:text-4xl">@yield('heading')</h1>
                <p class="mt-4 text-lg leading-relaxed text-forest/75">
                    @yield('message')
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-3">
                    @yield('actions')
                </div>

                <p class="font-hand mt-10 rotate-[-2deg] text-2xl text-coral">
                    @yield('note', 'We&#39;re still here to help.')
                </p>
            </section>
        </main>

        <footer class="bg-forest text-cream">
            <div class="mx-auto flex w-full max-w-7xl flex-wrap items-center justify-between gap-3 px-4 py-6 text-sm sm:px-6 lg:px-8">
                <p class="text-cream/80">Need help right away?</p>
                <div class="flex flex-wrap items-center gap-x-6 gap-y-2">
                    <a href="tel:0890000000" class="font-semibold text-white hover:text-cream">Call (08) 9000 0000</a>
                    <a href="mailto:info@example.com" class="hover:text-white">info@example.com</a>
                </div>
            </div>
        </footer>
    </body>
</html>
