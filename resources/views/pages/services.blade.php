<x-layouts.marketing title="Our Services" description="Explore Blue Pearl Logistics customs clearance, freight forwarding, container handling, vehicle importation and delivery services.">
    <section class="bg-slate-950 py-20 text-white sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-300">Our services</p>
            <h1 class="mt-4 max-w-4xl text-4xl font-black tracking-tight sm:text-5xl">Practical support across the cargo journey.</h1>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl gap-7 px-4 sm:px-6 md:grid-cols-2 lg:px-8">
            @foreach ([
                ['Customs Clearance', 'Support with shipment documents, customs processes and cargo release.'],
                ['Freight Forwarding', 'Coordination for cargo moving by sea or air, for imports and exports.'],
                ['Port & Container Handling', 'Port handling and support for FCL and LCL cargo from release to empty return.'],
                ['Vehicle Importation', 'Clearance, registration assistance and coordination for imported vehicles.'],
                ['Transport and Delivery', 'Cargo movement from the port or terminal to the final destination.'],
                ['General Cargo Support', 'Flexible support for commercial goods, personal effects and other cargo.'],
            ] as [$heading, $description])
                <article class="rounded-3xl border border-slate-200 p-7 shadow-sm">
                    <span class="grid size-12 place-items-center rounded-2xl bg-cyan-100 text-xs font-black text-cyan-700">BP</span>
                    <h2 class="mt-6 text-2xl font-black text-slate-950">{{ $heading }}</h2>
                    <p class="mt-4 text-sm leading-7 text-slate-600">{{ $description }}</p>
                    <a href="{{ route('quote') }}" class="mt-7 inline-flex text-sm font-black text-cyan-700 hover:text-cyan-900">Request this service →</a>
                </article>
            @endforeach
        </div>
    </section>
</x-layouts.marketing>
