<x-layouts.marketing
    title="Customs Clearance and Logistics Support"
    description="Blue Pearl Logistics Limited provides customs clearance, air and sea freight forwarding, cargo handling, warehousing, transport, vehicle importation and delivery support for clients in Kenya and the DRC."
>

    <style>
        @keyframes home-hero-ship {
            0%, 28% {
                opacity: 0;
            }

            33%, 61% {
                opacity: 1;
            }

            66%, 100% {
                opacity: 0;
            }
        }

        @keyframes home-hero-sunset {
            0%, 61% {
                opacity: 0;
            }

            66%, 94% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        .home-hero-secondary,
        .home-hero-tertiary {
            opacity: 0;
        }

        .home-hero-slideshow.is-ready .home-hero-secondary {
            animation: home-hero-ship 30s ease-in-out infinite;
        }

        .home-hero-slideshow.is-ready .home-hero-tertiary {
            animation: home-hero-sunset 30s ease-in-out infinite;
        }

        @media (prefers-reduced-motion: reduce) {
            .home-hero-secondary,
            .home-hero-tertiary {
                animation: none;
                opacity: 0;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slideshow = document.querySelector('.home-hero-slideshow');

            if (! slideshow) {
                return;
            }

            const images = [...slideshow.querySelectorAll('img')];

            Promise.all(
                images.map((image) => {
                    if (image.complete) {
                        return Promise.resolve();
                    }

                    return new Promise((resolve) => {
                        image.addEventListener('load', resolve, { once: true });
                        image.addEventListener('error', resolve, { once: true });
                    });
                })
            ).then(() => {
                slideshow.classList.add('is-ready');
            });
        });
    </script>

    <section class="relative overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute -left-20 top-10 size-80 rounded-full bg-cyan-500 blur-3xl"></div>
            <div class="absolute right-0 top-0 size-96 rounded-full bg-blue-700 blur-3xl"></div>
        </div>

        <div class="relative mx-auto grid max-w-7xl gap-14 px-4 py-20 sm:px-6 sm:py-28 lg:grid-cols-[.92fr_1.08fr] lg:items-center lg:px-8 lg:py-32">
            <div>
                <p class="inline-flex rounded-full border border-cyan-300/30 bg-cyan-300/10 px-4 py-2 text-xs font-black uppercase tracking-[0.2em] text-cyan-200">
                    Customs clearance · Freight · Logistics
                </p>

                <h1 class="mt-7 text-4xl font-black leading-tight tracking-tight sm:text-5xl lg:text-6xl">
                    Customs clearance and logistics support in Kenya.
                    <span class="text-cyan-300">
                        Move cargo with confidence.
                    </span>
                </h1>

                <p class="mt-6 max-w-2xl text-base leading-8 text-slate-300 sm:text-lg">
                    Blue Pearl Logistics supports customs clearance, air and sea
                    freight forwarding, port and CFS handling, warehousing,
                    vehicle importation and cargo delivery for clients in Kenya
                    and the DRC.
                </p>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a
                        href="{{ route('quote') }}"
                        class="rounded-full bg-cyan-400 px-7 py-3.5 text-center text-sm font-black text-slate-950 hover:bg-cyan-300"
                    >
                        Request a Quote
                    </a>

                    <a
                        href="{{ route('services') }}"
                        class="rounded-full border border-white/20 px-7 py-3.5 text-center text-sm font-black hover:bg-white/10"
                    >
                        Explore Our Services
                    </a>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/10 p-3 shadow-2xl backdrop-blur">
                <div class="home-hero-slideshow relative aspect-[4/3] overflow-hidden rounded-[1.5rem]">
                    <img
                        src="{{ asset('images/logistics/home-logistics-hero-aerial.webp') }}"
                        alt="Container terminal and port logistics operations"
                        width="1400"
                        height="1050"
                        fetchpriority="high"
                        decoding="async"
                        class="absolute inset-0 size-full object-cover"
                    >

                    <img
                        src="{{ asset('images/logistics/home-logistics-hero-ship.webp') }}"
                        alt=""
                        width="1400"
                        height="1050"
                        fetchpriority="auto"
                        decoding="async"
                        aria-hidden="true"
                        class="home-hero-secondary absolute inset-0 size-full object-cover"
                    >

                    <img
                        src="{{ asset('images/logistics/home-logistics-hero-sunset.webp') }}"
                        alt=""
                        width="1400"
                        height="1050"
                        fetchpriority="auto"
                        decoding="async"
                        aria-hidden="true"
                        class="home-hero-tertiary absolute inset-0 size-full object-cover"
                    >
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-700">
                Logistics services in Kenya
            </p>

            <h2 class="mt-4 max-w-3xl text-3xl font-black tracking-tight text-slate-950 sm:text-4xl">
                Practical support across the cargo journey.
            </h2>

            <p class="mt-5 max-w-3xl text-base leading-8 text-slate-600">
                Explore our customs clearance, freight, cargo handling,
                warehousing, transport and vehicle importation services.
            </p>

            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach (
                    collect(config('services'))
                        ->filter(
                            fn ($service) =>
                                is_array($service)
                                && isset(
                                    $service['name'],
                                    $service['summary']
                                )
                        )
                    as $slug => $service
                )
                    <article class="flex flex-col rounded-3xl border border-slate-200 p-6 shadow-sm transition hover:-translate-y-1 hover:border-cyan-300 hover:shadow-xl">
                        <span class="grid size-12 place-items-center rounded-2xl bg-cyan-100 text-sm font-black text-cyan-700">
                            BP
                        </span>

                        <h3 class="mt-6 text-xl font-black text-slate-950">
                            <a
                                href="{{ route('services.show', $slug) }}"
                                class="hover:text-cyan-700"
                            >
                                {{ $service['name'] }}
                            </a>
                        </h3>

                        <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">
                            {{ $service['summary'] }}
                        </p>

                        <div class="mt-5 flex flex-wrap gap-x-5 gap-y-2">
                            <a
                                href="{{ route('services.show', $slug) }}"
                                aria-label="View {{ $service['name'] }} service"
                                class="text-sm font-black text-cyan-700 hover:text-cyan-900"
                            >
                                View service →
                            </a>

                            <a
                                href="{{ route('quote', ['service' => $slug]) }}"
                                class="text-sm font-bold text-slate-500 hover:text-slate-950"
                            >
                                Request quote
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">
                <a
                    href="{{ route('services') }}"
                    class="inline-flex rounded-full border border-slate-300 px-6 py-3 text-sm font-black text-slate-800 transition hover:border-cyan-500 hover:text-cyan-700"
                >
                    View All Logistics Services →
                </a>
            </div>
        </div>
    </section>

    <section class="bg-slate-100 py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">

            <div class="rounded-[2rem] bg-slate-950 p-8 text-white shadow-2xl sm:p-10">
                <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-300">
                    Why Blue Pearl
                </p>

                <h2 class="mt-4 text-3xl font-black">
                    Clear communication at every stage.
                </h2>

                <p class="mt-5 text-sm leading-7 text-slate-300">
                    We help organize the connected documentation, customs,
                    handling, release and delivery steps while keeping clients
                    informed.
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    @foreach ([
                        'Practical guidance',
                        'Responsive communication',
                        'Cargo-focused coordination',
                        'Support from clearance to delivery',
                    ] as $benefit)
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4 text-sm font-black">
                            {{ $benefit }}
                        </div>
                    @endforeach
                </div>

                <a
                    href="{{ route('about') }}"
                    class="mt-7 inline-flex text-sm font-black text-cyan-300 hover:text-white"
                >
                    Learn more about Blue Pearl →
                </a>
            </div>

            <div>
                <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-700">
                    A simple process
                </p>

                <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950">
                    From first enquiry to final delivery.
                </h2>

                <div class="mt-8 space-y-6">
                    @foreach ([
                        [
                            'Tell us about the cargo',
                            'Share the cargo type, origin, destination and available documents.',
                        ],
                        [
                            'Receive a tailored plan',
                            'We explain the likely process, requirements and quotation.',
                        ],
                        [
                            'Clear and coordinate',
                            'The required clearance, handling and transport steps are coordinated.',
                        ],
                        [
                            'Complete delivery',
                            'Cargo is moved to the agreed destination.',
                        ],
                    ] as $index => [$heading, $description])
                        <div class="flex gap-5">
                            <span class="grid size-11 shrink-0 place-items-center rounded-full bg-cyan-600 text-sm font-black text-white">
                                {{ $index + 1 }}
                            </span>

                            <div>
                                <h3 class="font-black text-slate-950">
                                    {{ $heading }}
                                </h3>

                                <p class="mt-2 text-sm leading-7 text-slate-600">
                                    {{ $description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
</x-layouts.marketing>
