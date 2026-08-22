<x-layouts.marketing
    title="About Us"
    description="Learn about Blue Pearl Logistics and our approach to customs clearance, freight forwarding, cargo handling and delivery support."
>
    <section class="bg-slate-950 py-20 text-white sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-300">
                About Blue Pearl Logistics
            </p>

            <h1 class="mt-4 max-w-4xl text-4xl font-black tracking-tight sm:text-5xl">
                Logistics support built around clarity and coordination.
            </h1>

            <p class="mt-6 max-w-3xl text-base leading-8 text-slate-300">
                Blue Pearl Logistics Limited is a Kenya-based company supporting
                individuals, businesses and government institutions with customs
                clearance, air and sea freight forwarding, port and CFS handling,
                warehousing, vehicle importation, cargo transport and delivery.
                We serve clients in Kenya and the DRC.
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a
                    href="{{ route('services') }}"
                    class="rounded-full bg-cyan-500 px-6 py-3 text-center text-sm font-black text-slate-950 hover:bg-cyan-300"
                >
                    Explore Our Services
                </a>

                <a
                    href="{{ route('contact') }}"
                    class="rounded-full border border-white/20 px-6 py-3 text-center text-sm font-black text-white hover:bg-white/10"
                >
                    Contact Blue Pearl
                </a>
            </div>

        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">

            <div>
                <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-700">
                    Our role
                </p>

                <h2 class="mt-4 text-3xl font-black text-slate-950">
                    Making complex logistics easier to understand.
                </h2>
            </div>

            <div class="space-y-5 text-sm leading-7 text-slate-600">
                <p>
                    Moving imported cargo involves connected documentation,
                    customs, port or CFS handling, release, transport and
                    delivery requirements.
                </p>

                <p>
                    We help coordinate these steps and keep clients informed
                    about what is required, what is happening and what comes next.
                </p>

                <p>
                    Our support can also include warehousing, packing, removals,
                    consolidated cargo, project cargo and other logistics
                    requirements depending on the shipment.
                </p>

                <p>
                    Every job is approached according to its cargo, route,
                    documents, handling requirements and final destination.
                </p>
            </div>

        </div>
    </section>

    <section class="bg-slate-100 py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-700">
                What we support
            </p>

            <h2 class="mt-4 max-w-3xl text-3xl font-black text-slate-950">
                Connected logistics services from clearance to delivery.
            </h2>

            <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                @foreach (
                    collect(config('services'))
                        ->filter(
                            fn ($details) =>
                                is_array($details)
                                && isset(
                                    $details['name'],
                                    $details['summary']
                                )
                        )
                        ->take(6)
                    as $slug => $details
                )
                    <a
                        href="{{ route('services.show', $slug) }}"
                        class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-cyan-300 hover:shadow-md"
                    >
                        <h3 class="font-black text-slate-950">
                            {{ $details['name'] }}
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            {{ $details['summary'] }}
                        </p>
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
</x-layouts.marketing>
