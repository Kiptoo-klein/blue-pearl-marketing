<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ isset($title) ? $title.' | ' : '' }}{{ config('company.name') }}</title>
    <meta
        name="description"
        content="{{ $description ?? 'Customs clearance, freight forwarding, container handling and vehicle importation support in Kenya.' }}"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    <div class="bg-slate-950 text-white">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-2 px-4 py-2 text-xs sm:px-6 lg:px-8">
            <p>Customs clearance and freight support in Kenya</p>

            <div class="flex gap-4">
                <a href="tel:{{ config('company.phone_href') }}" class="hover:text-cyan-300">
                    {{ config('company.phone') }}
                </a>
                <a href="mailto:{{ config('company.email') }}" class="hidden hover:text-cyan-300 sm:inline">
                    {{ config('company.email') }}
                </a>
            </div>
        </div>
    </div>

    <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
            <a
                href="{{ route('home') }}"
                class="flex shrink-0 items-center"
                aria-label="{{ config('company.name') }} home"
            >
                <img
                    src="{{ asset('images/blue-pearl-logo.png') }}"
                    alt="{{ config('company.name') }}"
                    width="185"
                    height="74"
                    style="width: 185px; height: auto; max-width: 45vw; display: block;"
                >
            </a>

            <nav class="hidden items-center gap-8 lg:flex">
                @foreach ([
                    'home' => 'Home',
                    'about' => 'About',
                    'services' => 'Services',
                    'contact' => 'Contact',
                ] as $route => $label)
                    <a
                        href="{{ route($route) }}"
                        class="text-sm font-bold {{ request()->routeIs($route) ? 'text-cyan-700' : 'text-slate-700 hover:text-cyan-700' }}"
                    >
                        {{ $label }}
                    </a>
                @endforeach
            </nav>

            <div class="hidden items-center gap-3 lg:flex">
                <a
                    href="https://wa.me/{{ config('company.whatsapp') }}"
                    target="_blank"
                    rel="noopener"
                    class="rounded-full border border-slate-300 px-5 py-2.5 text-sm font-black text-slate-800 hover:border-emerald-500 hover:text-emerald-700"
                >
                    WhatsApp
                </a>
                <a
                    href="{{ route('quote') }}"
                    class="rounded-full bg-cyan-600 px-5 py-2.5 text-sm font-black text-white hover:bg-cyan-700"
                >
                    Request a Quote
                </a>
            </div>

            <details class="relative lg:hidden">
                <summary class="cursor-pointer list-none rounded-xl border border-slate-300 px-4 py-2 text-sm font-black">
                    Menu
                </summary>
                <nav class="absolute right-0 mt-3 grid w-64 gap-1 rounded-2xl border border-slate-200 bg-white p-3 shadow-2xl">
                    <a href="{{ route('home') }}" class="rounded-xl px-4 py-3 text-sm font-bold hover:bg-slate-100">Home</a>
                    <a href="{{ route('about') }}" class="rounded-xl px-4 py-3 text-sm font-bold hover:bg-slate-100">About</a>
                    <a href="{{ route('services') }}" class="rounded-xl px-4 py-3 text-sm font-bold hover:bg-slate-100">Services</a>
                    <a href="{{ route('faq') }}" class="rounded-xl px-4 py-3 text-sm font-bold hover:bg-slate-100">FAQ</a>
                    <a href="{{ route('contact') }}" class="rounded-xl px-4 py-3 text-sm font-bold hover:bg-slate-100">Contact</a>
                    <a href="{{ route('quote') }}" class="mt-2 rounded-xl bg-cyan-600 px-4 py-3 text-center text-sm font-black text-white">Request a Quote</a>
                </nav>
            </details>
        </div>
    </header>

    <main>{{ $slot }}</main>

    <section class="bg-cyan-600 text-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-6 px-4 py-10 sm:px-6 md:flex-row md:items-center md:justify-between lg:px-8">
            <div>
                <p class="text-xs font-black uppercase tracking-[0.2em] text-cyan-100">Move your cargo with confidence</p>
                <h2 class="mt-2 text-2xl font-black sm:text-3xl">Tell us what you need cleared or delivered.</h2>
            </div>
            <a href="{{ route('quote') }}" class="rounded-full bg-white px-6 py-3 text-center text-sm font-black text-cyan-700">
                Get a Custom Quote
            </a>
        </div>
    </section>

    <footer class="bg-slate-950 text-slate-300">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:px-6 md:grid-cols-2 lg:grid-cols-4 lg:px-8">
            <div class="lg:col-span-2">
                <p class="text-xl font-black text-white">{{ config('company.name') }}</p>
                <p class="mt-4 max-w-xl text-sm leading-7 text-slate-400">
                    Practical logistics support for businesses and individuals moving cargo through Kenya.
                </p>
            </div>
            <div>
                <h3 class="font-black text-white">Quick Links</h3>
                <div class="mt-4 grid gap-3 text-sm">
                    <a href="{{ route('about') }}" class="hover:text-cyan-300">About Us</a>
                    <a href="{{ route('services') }}" class="hover:text-cyan-300">Our Services</a>
                    <a href="{{ route('quote') }}" class="hover:text-cyan-300">Request a Quote</a>
                    <a href="{{ route('faq') }}" class="hover:text-cyan-300">FAQ</a>
                    <a href="{{ route('contact') }}" class="hover:text-cyan-300">Contact</a>
                </div>
            </div>
            <div>
                <h3 class="font-black text-white">Contact</h3>
                <div class="mt-4 grid gap-3 text-sm text-slate-400">
                    <p>{{ config('company.address') }}</p>
                    <a href="tel:{{ config('company.phone_href') }}" class="hover:text-cyan-300">{{ config('company.phone') }}</a>
                    <a href="mailto:{{ config('company.email') }}" class="break-all hover:text-cyan-300">{{ config('company.email') }}</a>
                </div>
            </div>
        </div>
        <div class="border-t border-white/10 px-4 py-5 text-center text-xs text-slate-500">
            © {{ now()->year }} {{ config('company.name') }}. All rights reserved.
        </div>
    </footer>

    <a
        href="https://wa.me/{{ config('company.whatsapp') }}"
        target="_blank"
        rel="noopener"
        aria-label="Chat on WhatsApp"
        class="fixed bottom-5 right-5 z-40 grid size-14 place-items-center rounded-full bg-emerald-500 text-sm font-black text-white shadow-2xl hover:bg-emerald-600"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="28"
            height="28"
            viewBox="0 0 16 16"
            fill="currentColor"
            aria-hidden="true"
        >
            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93a7.9 7.9 0 0 0-2.327-5.607ZM7.994 14.521a6.58 6.58 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.25a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.591-6.592 6.591Zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.116.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.984-.59-.525-.986-1.173-1.102-1.37-.116-.198-.012-.305.087-.403.09-.088.197-.232.296-.346.1-.116.133-.198.198-.33.065-.134.033-.249-.016-.347-.05-.099-.445-1.076-.61-1.47-.16-.385-.323-.332-.445-.338-.114-.006-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.132 1.394 2.132 3.383 2.992.47.205.84.326 1.129.417.475.151.907.13 1.249.079.381-.058 1.17-.48 1.336-.943.164-.462.164-.857.114-.943-.049-.085-.182-.132-.38-.23Z"/>
        </svg>
    </a>
</body>
</html>
