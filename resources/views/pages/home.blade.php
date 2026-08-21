<x-layouts.marketing
    title="Customs Clearance and Logistics Support"
    description="Blue Pearl Logistics Limited provides customs clearance, air and sea freight forwarding, cargo handling, warehousing, transport, vehicle importation and delivery support for clients in Kenya and the DRC."
>
    <section class="relative overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute -left-20 top-10 size-80 rounded-full bg-cyan-500 blur-3xl"></div>
            <div class="absolute right-0 top-0 size-96 rounded-full bg-blue-700 blur-3xl"></div>
        </div>

        <div class="relative mx-auto grid max-w-7xl gap-14 px-4 py-20 sm:px-6 sm:py-28 lg:grid-cols-[1.08fr_.92fr] lg:items-center lg:px-8 lg:py-32">
            <div>
                <p class="inline-flex rounded-full border border-cyan-300/30 bg-cyan-300/10 px-4 py-2 text-xs font-black uppercase tracking-[0.2em] text-cyan-200">
                    Customs clearance · Freight · Delivery
                </p>

                <h1 class="mt-7 text-4xl font-black leading-tight tracking-tight sm:text-5xl lg:text-6xl">
                    Clear cargo faster.
                    <span class="text-cyan-300">Move it with confidence.</span>
                </h1>

                <p class="mt-6 max-w-2xl text-base leading-8 text-slate-300 sm:text-lg">
                    Kenya-based support for customs clearance, air and sea freight
                    forwarding, cargo handling, warehousing, vehicle importation
                    and delivery for clients in Kenya and the DRC.
                </p>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a
                        href="{{ route('quote') }}"
                        class="rounded-full bg-cyan-400 px-7 py-3.5 text-center text-sm font-black text-slate-950 hover:bg-cyan-300"
                    >
                        Request a Quote
                    </a>

                    <a
                        href="https://wa.me/{{ config('company.whatsapp') }}"
                        target="_blank"
                        rel="noopener"
                        class="rounded-full border border-white/20 px-7 py-3.5 text-center text-sm font-black hover:bg-white/10"
                    >
                        Chat on WhatsApp
                    </a>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/10 p-4 shadow-2xl backdrop-blur">
                <div class="rounded-[1.5rem] bg-white p-6 text-slate-900 sm:p-8">
                    <p class="text-xs font-black uppercase tracking-[0.18em] text-cyan-700">
                        How it works
                    </p>

                    <h2 class="mt-2 text-2xl font-black">
                        One reliable logistics partner
                    </h2>

                    <div class="mt-7 space-y-4">
                        @foreach ([
                            ['01', 'Share your shipment details'],
                            ['02', 'Receive guidance and a quotation'],
                            ['03', 'We coordinate clearance and movement'],
                            ['04', 'Cargo reaches its destination'],
                        ] as [$number, $label])
                            <div class="flex items-center gap-4 rounded-2xl bg-slate-50 p-4">
                                <span class="grid size-10 place-items-center rounded-full bg-slate-950 text-xs font-black text-cyan-300">
                                    {{ $number }}
                                </span>

                                <p class="text-sm font-black">
                                    {{ $label }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-700">
                What we handle
            </p>

            <h2 class="mt-4 max-w-3xl text-3xl font-black tracking-tight text-slate-950 sm:text-4xl">
                Logistics services built around your cargo.
            </h2>

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
                            {{ $service['name'] }}
                        </h3>

                        <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">
                            {{ $service['summary'] }}
                        </p>

                        <a
                            href="{{ route('quote', ['service' => $slug]) }}"
                            class="mt-5 inline-flex text-sm font-black text-cyan-700 hover:text-cyan-900"
                        >
                            Request this service →
                        </a>
                    </article>
                @endforeach
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
