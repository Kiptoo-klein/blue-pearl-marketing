<x-layouts.marketing
    :title="$details['name']"
    :description="$details['summary']"
>
    <section class="relative overflow-hidden bg-slate-950 py-20 text-white sm:py-24">
        <div class="absolute -right-24 top-0 size-80 rounded-full bg-cyan-600/20 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
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
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[1fr_.8fr] lg:px-8">

            <div>
                <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-700">
                    Service coverage
                </p>

                <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950">
                    What this service can include
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

            <div class="rounded-[2rem] bg-gradient-to-br from-cyan-50 to-white p-8 ring-1 ring-slate-200 sm:p-12">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">

                    <div>
                        <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-700">
                            Start your enquiry
                        </p>

                        <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950">
                            Share the shipment details you already have.
                        </h2>

                        <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600">
                            We will review the information and explain the next
                            practical steps for your cargo.
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
