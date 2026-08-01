<x-layouts.marketing title="Request a Quote" description="Request a customs clearance, freight, container, vehicle importation or delivery quotation.">
    <section class="bg-slate-950 py-20 text-white sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-300">Request a quote</p>
            <h1 class="mt-4 text-4xl font-black tracking-tight sm:text-5xl">Tell us about your shipment.</h1>
            <p class="mt-6 max-w-3xl text-base leading-8 text-slate-300">
                Share the cargo type, origin, destination and available shipment details through WhatsApp, phone or email.
            </p>
            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="https://wa.me/{{ config('company.whatsapp') }}" target="_blank" rel="noopener" class="rounded-full bg-emerald-500 px-7 py-3.5 text-center text-sm font-black text-white">Request through WhatsApp</a>
                <a href="mailto:{{ config('company.email') }}" class="rounded-full border border-white/20 px-7 py-3.5 text-center text-sm font-black text-white">Request by Email</a>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-3">
                @foreach ([
                    ['Cargo details', 'What are you importing, exporting or moving?'],
                    ['Route details', 'Where is the cargo coming from and where should it go?'],
                    ['Available documents', 'Share any Bill of Lading, invoice or arrival information available.'],
                ] as [$heading, $description])
                    <article class="rounded-3xl border border-slate-200 p-7 shadow-sm">
                        <h2 class="text-xl font-black text-slate-950">{{ $heading }}</h2>
                        <p class="mt-4 text-sm leading-7 text-slate-600">{{ $description }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.marketing>
