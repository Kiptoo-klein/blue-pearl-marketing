<x-layouts.marketing
    :title="$details['seo_title'] ?? $details['name']"
    :description="$details['seo_description'] ?? $details['summary']"
>
    @php
        $publicServices = collect(config('services'))
            ->filter(
                fn ($serviceDetails) =>
                    is_array($serviceDetails)
                    && isset(
                        $serviceDetails['name'],
                        $serviceDetails['summary']
                    )
            );

        $relatedServices = collect(
            $details['related_services'] ?? []
        )
            ->filter(
                fn ($slug) =>
                    is_string($slug)
                    && $slug !== $service
                    && $publicServices->has($slug)
            )
            ->mapWithKeys(
                fn ($slug) => [
                    $slug => $publicServices->get($slug),
                ]
            )
            ->take(3);

        $breadcrumbSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => route('home'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Services',
                    'item' => route('services'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => $details['name'],
                    'item' => route(
                        'services.show',
                        $service
                    ),
                ],
            ],
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode(
            $breadcrumbSchema,
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        ) !!}
    </script>

    <section class="relative overflow-hidden bg-slate-950 py-20 text-white sm:py-24">
        <div class="absolute -right-24 top-0 size-80 rounded-full bg-cyan-600/20 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <nav
                aria-label="Breadcrumb"
                class="flex flex-wrap items-center gap-2 text-sm"
            >
                <a
                    href="{{ route('home') }}"
                    class="font-bold text-slate-400 transition hover:text-white"
                >
                    Home
                </a>

                <span
                    aria-hidden="true"
                    class="text-slate-600"
                >
                    /
                </span>

                <a
                    href="{{ route('services') }}"
                    class="font-bold text-slate-400 transition hover:text-white"
                >
                    Services
                </a>

                <span
                    aria-hidden="true"
                    class="text-slate-600"
                >
                    /
                </span>

                <span
                    aria-current="page"
                    class="font-bold text-cyan-300"
                >
                    {{ $details['name'] }}
                </span>
            </nav>

            <div
                @class([
                    'mt-8 grid gap-10 lg:items-center',
                    'lg:grid-cols-[1fr_.72fr]' => isset($details['image']),
                ])
            >
                <div
                    @class([
                        'lg:order-2' =>
                            isset($details['image'])
                            && ($details['image_side'] ?? 'right') === 'left',
                        'lg:order-1' =>
                            ! isset($details['image'])
                            || ($details['image_side'] ?? 'right') !== 'left',
                    ])
                >
                    <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-300">
                        {{ $details['eyebrow'] }}
                    </p>

                    <h1 class="mt-4 max-w-4xl text-4xl font-black tracking-tight sm:text-5xl">
                        {{ $details['name'] }}
                    </h1>

                    <p class="mt-6 max-w-3xl text-base leading-8 text-slate-300">
                        {{ $details['intro'] }}
                    </p>

                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a
                            href="{{ route('quote', ['service' => $service]) }}"
                            class="rounded-full bg-cyan-500 px-7 py-3.5 text-center text-sm font-black text-slate-950 transition hover:bg-cyan-300"
                        >
                            Request This Service
                        </a>

                        <a
                            href="https://wa.me/{{ config('company.whatsapp') }}"
                            target="_blank"
                            rel="noopener"
                            class="rounded-full border border-white/20 px-7 py-3.5 text-center text-sm font-black text-white transition hover:bg-white/10"
                        >
                            Ask on WhatsApp
                        </a>
                    </div>
                </div>

                @if (isset($details['image']))
                    <div
                        @class([
                            'overflow-hidden rounded-[2rem] border border-white/10 bg-white/10 p-3 shadow-2xl',
                            'lg:order-1' =>
                                ($details['image_side'] ?? 'right') === 'left',
                            'lg:order-2' =>
                                ($details['image_side'] ?? 'right') !== 'left',
                        ])
                    >
                        <img
                            src="{{ asset($details['image']) }}"
                            alt="{{ $details['image_alt'] ?? '' }}"
                            width="1200"
                            height="900"
                            fetchpriority="high"
                            decoding="async"
                            class="aspect-[4/3] w-full rounded-[1.5rem] object-cover"
                        >
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[1fr_.8fr] lg:px-8">

            <div>
                <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-700">
                    Service coverage
                </p>

                <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950">
                    What {{ $details['name'] }} can include
                </h2>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    @foreach ($details['features'] as $feature)
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                            <div class="flex items-start gap-3">
                                <span class="mt-1 grid size-6 shrink-0 place-items-center rounded-full bg-cyan-600 text-xs font-black text-white">
                                    ✓
                                </span>

                                <p class="text-sm font-bold leading-6 text-slate-800">
                                    {{ $feature }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <aside class="rounded-[2rem] bg-slate-950 p-8 text-white">
                <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-300">
                    Suitable for
                </p>

                <h2 class="mt-4 text-2xl font-black">
                    Clients and cargo we commonly support
                </h2>

                <div class="mt-7 space-y-3">
                    @foreach ($details['ideal_for'] as $item)
                        <div class="rounded-2xl border border-white/10 bg-white/5 px-5 py-4 text-sm font-bold text-slate-200">
                            {{ $item }}
                        </div>
                    @endforeach
                </div>
            </aside>

        </div>
    </section>

    <section class="bg-slate-100 py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="max-w-3xl">
                <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-700">
                    How it works
                </p>

                <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950">
                    A clear process from enquiry to completion
                </h2>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($details['process'] as $index => [$heading, $description])
                    <article class="rounded-3xl bg-white p-6 shadow-sm">
                        <span class="grid size-11 place-items-center rounded-full bg-slate-950 text-sm font-black text-cyan-300">
                            {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <h3 class="mt-6 text-lg font-black text-slate-950">
                            {{ $heading }}
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            {{ $description }}
                        </p>
                    </article>
                @endforeach
            </div>

        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-700">
                Related logistics services
            </p>

            <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950">
                Explore other ways we can support your cargo.
            </h2>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @foreach ($relatedServices as $slug => $related)
                    <a
                        href="{{ route('services.show', $slug) }}"
                        class="rounded-3xl border border-slate-200 p-6 shadow-sm transition hover:-translate-y-1 hover:border-cyan-300 hover:shadow-lg"
                    >
                        <span class="grid size-10 place-items-center rounded-xl bg-cyan-100 text-xs font-black text-cyan-700">
                            BP
                        </span>

                        <h3 class="mt-5 text-xl font-black text-slate-950">
                            {{ $related['name'] }}
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            {{ $related['summary'] }}
                        </p>

                        <span class="mt-5 inline-flex text-sm font-black text-cyan-700">
                            View service →
                        </span>
                    </a>
                @endforeach
            </div>

            <a
                href="{{ route('services') }}"
                class="mt-8 inline-flex text-sm font-black text-cyan-700 hover:text-cyan-900"
            >
                View all logistics services →
            </a>

        </div>
    </section>

    <section class="bg-slate-100 py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="rounded-[2rem] bg-white p-8 ring-1 ring-slate-200 sm:p-12">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">

                    <div>
                        <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-700">
                            Start your enquiry
                        </p>

                        <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950">
                            Need {{ $details['name'] }} support?
                        </h2>

                        <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600">
                            Share the shipment details you already have and we
                            will explain the next practical steps.
                        </p>
                    </div>

                    <a
                        href="{{ route('quote', ['service' => $service]) }}"
                        class="rounded-full bg-slate-950 px-7 py-3.5 text-center text-sm font-black text-white transition hover:bg-cyan-700"
                    >
                        Request a Quote
                    </a>

                </div>
            </div>

        </div>
    </section>
</x-layouts.marketing>
