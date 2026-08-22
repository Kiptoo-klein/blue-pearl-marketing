<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
        $routeName = request()->route()?->getName();

        $routeSeo = $routeName
            ? config("seo.pages.{$routeName}", [])
            : [];

        $pageTitleBase = $routeSeo['title']
            ?? $title
            ?? config('company.name');

        $pageDescription = $routeSeo['description']
            ?? $description
            ?? 'Customs clearance, air and sea freight forwarding, cargo handling, warehousing, transport and vehicle importation support in Kenya.';

        $seoSiteName = config(
            'seo.site_name',
            config('company.name')
        );

        $pageTitle = $pageTitleBase === $seoSiteName
            ? $pageTitleBase
            : $pageTitleBase.' | '.$seoSiteName;

        $canonicalUrl = request()->url();

        $socialImageUrl = asset(
            'images/blue-pearl-social-preview.png'
        );

        /*
        |--------------------------------------------------------------------------
        | Structured Data
        |--------------------------------------------------------------------------
        */

        $organizationId = route('home').'#organization';

        $organizationSchema = [
            '@type' => 'Organization',
            '@id' => $organizationId,
            'name' => config('company.name'),
            'url' => route('home'),

            'logo' => asset(
                'images/blue-pearl-logo-transparent.png'
            ),

            'image' => $socialImageUrl,

            'description' => config(
                'seo.pages.home.description'
            ),

            'email' => config('company.email'),

            'telephone' => config(
                'company.phone'
            ),

            'slogan' => config(
                'company.tagline'
            ),

            'address' => [
                '@type' => 'PostalAddress',

                'streetAddress' => config(
                    'company.address'
                ),

                'addressLocality' => 'Nairobi',

                'addressCountry' => 'KE',
            ],

            'areaServed' => [
                [
                    '@type' => 'Country',
                    'name' => 'Kenya',
                ],
                [
                    '@type' => 'Country',
                    'name' => 'Democratic Republic of the Congo',
                ],
            ],

            'contactPoint' => [
                '@type' => 'ContactPoint',

                'telephone' => config(
                    'company.phone'
                ),

                'email' => config(
                    'company.email'
                ),

                'contactType' => 'customer service',
            ],
        ];

        $schemaGraph = [
            $organizationSchema,
        ];

        /*
        |--------------------------------------------------------------------------
        | Website Structured Data
        |--------------------------------------------------------------------------
        */

        if (request()->routeIs('home')) {
            $schemaGraph[] = [
                '@type' => 'WebSite',

                '@id' => route('home').'#website',

                'name' => config(
                    'seo.site_name'
                ),

                'alternateName' => config(
                    'company.name'
                ),

                'url' => route('home'),

                'publisher' => [
                    '@id' => $organizationId,
                ],
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Service Structured Data
        |--------------------------------------------------------------------------
        */

        if (request()->routeIs('services.show')) {
            $serviceSlug = request()->route(
                'service'
            );

            $serviceDetails = config(
                "services.{$serviceSlug}"
            );

            if (
                is_array($serviceDetails)
                && isset($serviceDetails['name'])
            ) {
                $schemaGraph[] = [
                    '@type' => 'Service',

                    '@id' => $canonicalUrl
                        .'#service',

                    'name' => $serviceDetails[
                        'name'
                    ],

                    'serviceType' => $serviceDetails[
                        'name'
                    ],

                    'description' => $serviceDetails[
                        'seo_description'
                    ]
                        ?? $serviceDetails['summary']
                        ?? '',

                    'url' => $canonicalUrl,

                    'provider' => [
                        '@id' => $organizationId,
                    ],

                    'areaServed' => [
                        '@type' => 'Country',
                        'name' => 'Kenya',
                    ],
                ];
            }
        }

        $structuredData = [
            '@context' => 'https://schema.org',
            '@graph' => $schemaGraph,
        ];
    @endphp

    <title>{{ $pageTitle }}</title>

    <meta
        name="description"
        content="{{ $pageDescription }}"
    >

    <meta
        name="robots"
        content="{{ config('seo.indexing_enabled')
            ? 'index, follow'
            : 'noindex, nofollow'
        }}"
    >

    <link
        rel="canonical"
        href="{{ $canonicalUrl }}"
    >

    {{-- Site icon --}}
    <link
        rel="icon"
        href="{{ asset('favicon.ico') }}"
        sizes="any"
    >

    {{-- Open Graph --}}
    <meta
        property="og:type"
        content="website"
    >

    <meta
        property="og:locale"
        content="en_KE"
    >

    <meta
        property="og:site_name"
        content="{{ $seoSiteName }}"
    >

    <meta
        property="og:title"
        content="{{ $pageTitle }}"
    >

    <meta
        property="og:description"
        content="{{ $pageDescription }}"
    >

    <meta
        property="og:url"
        content="{{ $canonicalUrl }}"
    >

    <meta
        property="og:image"
        content="{{ $socialImageUrl }}"
    >

    <meta
        property="og:image:secure_url"
        content="{{ $socialImageUrl }}"
    >

    <meta
        property="og:image:type"
        content="image/png"
    >

    <meta
        property="og:image:width"
        content="1200"
    >

    <meta
        property="og:image:height"
        content="630"
    >

    <meta
        property="og:image:alt"
        content="{{ config('company.name') }} — Customs Clearance and Logistics"
    >

    {{-- Twitter / X --}}
    <meta
        name="twitter:card"
        content="summary_large_image"
    >

    <meta
        name="twitter:title"
        content="{{ $pageTitle }}"
    >

    <meta
        name="twitter:description"
        content="{{ $pageDescription }}"
    >

    <meta
        name="twitter:image"
        content="{{ $socialImageUrl }}"
    >

    <meta
        name="twitter:image:alt"
        content="{{ config('company.name') }} — Customs Clearance and Logistics"
    >

    {{-- Schema.org structured data --}}
    <script type="application/ld+json">
        {!! json_encode(
            $structuredData,
            JSON_UNESCAPED_SLASHES
            | JSON_UNESCAPED_UNICODE
            | JSON_HEX_TAG
            | JSON_HEX_AMP
            | JSON_HEX_APOS
            | JSON_HEX_QUOT
        ) !!}
    </script>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">

    <a
        href="#main-content"
        class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-lg focus:bg-white focus:px-4 focus:py-3 focus:text-sm focus:font-black focus:text-slate-950 focus:shadow-xl focus:outline-none focus:ring-4 focus:ring-cyan-300"
    >
        Skip to main content
    </a>

    {{-- Top information bar --}}
    <div class="bg-slate-950 text-white">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-2 px-4 py-2 text-xs sm:px-6 lg:px-8">

            <p>
                {{ config('company.tagline') }}
            </p>

            <div class="flex gap-4">

                <a
                    href="tel:{{ config('company.phone_href') }}"
                    class="hover:text-cyan-300"
                >
                    {{ config('company.phone') }}
                </a>

                <a
                    href="mailto:{{ config('company.email') }}"
                    class="hidden hover:text-cyan-300 sm:inline"
                >
                    {{ config('company.email') }}
                </a>

            </div>

        </div>
    </div>

    {{-- Main navigation --}}
    <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">

        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">

            <a
                href="{{ route('home') }}"
                class="flex shrink-0 items-center"
                aria-label="{{ config('company.name') }} home"
            >
                <img
                    src="{{ asset('images/blue-pearl-logo-transparent.png') }}"
                    alt="{{ config('company.name') }}"
                    width="185"
                    height="74"
                    style="width: 185px; height: auto; max-width: 45vw; display: block;"
                >
            </a>

            {{-- Desktop navigation --}}
            <nav class="hidden items-center gap-8 lg:flex">

                @foreach ([
                    'home' => 'Home',
                    'about' => 'About',
                    'services' => 'Services',
                    'faq' => 'FAQ',
                    'contact' => 'Contact',
                ] as $route => $label)

                    @php
                        $active = request()->routeIs(
                            $route
                        )
                            || (
                                $route === 'services'
                                && request()->routeIs(
                                    'services.*'
                                )
                            );
                    @endphp

                    <a
                        href="{{ route($route) }}"
                        @if ($active)
                            aria-current="page"
                        @endif
                        class="text-sm font-bold transition
                            {{ $active
                                ? 'text-cyan-700'
                                : 'text-slate-700 hover:text-cyan-700'
                            }}"
                    >
                        {{ $label }}
                    </a>

                @endforeach

            </nav>

            {{-- Desktop actions --}}
            <div class="hidden items-center gap-3 lg:flex">

                <a
                    href="https://wa.me/{{ config('company.whatsapp') }}"
                    target="_blank"
                    rel="noopener"
                    class="rounded-full border border-slate-300 px-5 py-2.5 text-sm font-black text-slate-800 transition hover:border-emerald-500 hover:text-emerald-700"
                >
                    WhatsApp
                </a>

                <a
                    href="{{ route('quote') }}"
                    class="rounded-full bg-cyan-600 px-5 py-2.5 text-sm font-black text-white transition hover:bg-cyan-700"
                >
                    Request a Quote
                </a>

            </div>

            {{-- Mobile menu --}}
            <details class="relative lg:hidden">

                <summary class="cursor-pointer list-none rounded-xl border border-slate-300 px-4 py-2 text-sm font-black">
                    Menu
                </summary>

                <nav class="absolute right-0 mt-3 grid w-64 gap-1 rounded-2xl border border-slate-200 bg-white p-3 shadow-2xl">

                    <a
                        href="{{ route('home') }}"
                        class="rounded-xl px-4 py-3 text-sm font-bold hover:bg-slate-100"
                    >
                        Home
                    </a>

                    <a
                        href="{{ route('about') }}"
                        class="rounded-xl px-4 py-3 text-sm font-bold hover:bg-slate-100"
                    >
                        About
                    </a>

                    <a
                        href="{{ route('services') }}"
                        class="rounded-xl px-4 py-3 text-sm font-bold hover:bg-slate-100"
                    >
                        Services
                    </a>

                    <a
                        href="{{ route('faq') }}"
                        class="rounded-xl px-4 py-3 text-sm font-bold hover:bg-slate-100"
                    >
                        FAQ
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="rounded-xl px-4 py-3 text-sm font-bold hover:bg-slate-100"
                    >
                        Contact
                    </a>

                    <a
                        href="{{ route('quote') }}"
                        class="mt-2 rounded-xl bg-cyan-600 px-4 py-3 text-center text-sm font-black text-white"
                    >
                        Request a Quote
                    </a>

                </nav>

            </details>

        </div>

    </header>

    {{-- Page content --}}
    <main
        id="main-content"
        tabindex="-1"
    >
        {{ $slot }}
    </main>

    {{-- Global CTA --}}
    <section class="bg-cyan-600 text-white">

        <div class="mx-auto flex max-w-7xl flex-col gap-6 px-4 py-10 sm:px-6 md:flex-row md:items-center md:justify-between lg:px-8">

            <div>

                <p class="text-xs font-black uppercase tracking-[0.2em] text-cyan-100">
                    Move your cargo with confidence
                </p>

                <h2 class="mt-2 text-2xl font-black sm:text-3xl">
                    Tell us what you need moved, cleared or handled.
                </h2>

            </div>

            <a
                href="{{ route('quote') }}"
                class="rounded-full bg-white px-6 py-3 text-center text-sm font-black text-cyan-700 transition hover:bg-cyan-50"
            >
                Get a Custom Quote
            </a>

        </div>

    </section>

    {{-- Footer --}}
    <footer class="bg-slate-950 text-slate-300">

        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:px-6 md:grid-cols-2 lg:grid-cols-4 lg:px-8">

            <div class="lg:col-span-2">

                <p class="text-xl font-black text-white">
                    {{ config('company.name') }}
                </p>

                <p class="mt-2 text-sm font-bold text-cyan-300">
                    {{ config('company.tagline') }}
                </p>

                <p class="mt-4 max-w-xl text-sm leading-7 text-slate-400">
                    Practical logistics support for businesses and individuals
                    moving cargo through Kenya.
                </p>

            </div>

            <div>

                <h2 class="font-black text-white">
                    Quick Links
                </h2>

                <div class="mt-4 grid gap-3 text-sm">

                    <a
                        href="{{ route('about') }}"
                        class="hover:text-cyan-300"
                    >
                        About Us
                    </a>

                    <a
                        href="{{ route('services') }}"
                        class="hover:text-cyan-300"
                    >
                        Our Services
                    </a>

                    <a
                        href="{{ route('quote') }}"
                        class="hover:text-cyan-300"
                    >
                        Request a Quote
                    </a>

                    <a
                        href="{{ route('faq') }}"
                        class="hover:text-cyan-300"
                    >
                        FAQ
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="hover:text-cyan-300"
                    >
                        Contact
                    </a>

                </div>

            </div>

            <div>

                <h2 class="font-black text-white">
                    Contact
                </h2>

                <div class="mt-4 grid gap-3 text-sm text-slate-400">

                    <p>
                        {{ config('company.address') }}
                    </p>

                    <a
                        href="tel:{{ config('company.phone_href') }}"
                        class="hover:text-cyan-300"
                    >
                        {{ config('company.phone') }}
                    </a>

                    <a
                        href="mailto:{{ config('company.email') }}"
                        class="break-all hover:text-cyan-300"
                    >
                        {{ config('company.email') }}
                    </a>

                </div>

            </div>

        </div>

        <div class="border-t border-white/10 px-4 py-5 text-center text-xs text-slate-500">
            © {{ now()->year }}
            {{ config('company.name') }}.
            All rights reserved.
        </div>

    </footer>

    {{-- Floating WhatsApp button --}}
    <a
        href="https://wa.me/{{ config('company.whatsapp') }}"
        target="_blank"
        rel="noopener"
        aria-label="Chat on WhatsApp"
        class="fixed bottom-5 right-5 z-40 grid size-14 place-items-center rounded-full bg-emerald-500 text-sm font-black text-white shadow-2xl transition hover:bg-emerald-600"
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
