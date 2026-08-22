<x-layouts.marketing
    title="Our Services"
    description="Explore Blue Pearl Logistics customs clearance, air and sea freight forwarding, port and CFS handling, warehousing, cargo transport, vehicle importation and specialized cargo services."
>
    <section class="bg-slate-950 py-20 text-white sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-300">
                Logistics services in Kenya
            </p>

            <h1 class="mt-4 max-w-4xl text-4xl font-black tracking-tight sm:text-5xl">
                Practical support across the cargo journey.
            </h1>

            <p class="mt-6 max-w-3xl text-base leading-8 text-slate-300">
                From customs clearance and freight coordination to cargo
                handling, warehousing and final delivery, we help coordinate
                the logistics needed to move your cargo.
            </p>

        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid gap-7 md:grid-cols-2 lg:grid-cols-3">

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
                    <article class="flex flex-col rounded-3xl border border-slate-200 p-7 shadow-sm transition hover:-translate-y-1 hover:border-cyan-300 hover:shadow-xl">

                        <span class="grid size-12 place-items-center rounded-2xl bg-cyan-100 text-xs font-black text-cyan-700">
                            BP
                        </span>

                        <h2 class="mt-6 text-2xl font-black text-slate-950">
                            {{ $service['name'] }}
                        </h2>

                        <p class="mt-4 flex-1 text-sm leading-7 text-slate-600">
                            {{ $service['summary'] }}
                        </p>

                        <div class="mt-7 flex flex-wrap gap-4">
                            <a
                                href="{{ route('services.show', $slug) }}"
                                aria-label="View {{ $service['name'] }} service"
                                class="text-sm font-black text-cyan-700 hover:text-cyan-900"
                            >
                                View service →
                            </a>

                            <a
                                href="{{ route('quote', ['service' => $slug]) }}"
                                class="text-sm font-black text-slate-600 hover:text-slate-950"
                            >
                                Request quote
                            </a>
                        </div>

                    </article>
                @endforeach

            </div>
        </div>
    </section>
</x-layouts.marketing>
