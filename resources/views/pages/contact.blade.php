<x-layouts.marketing
    title="Contact Us"
    description="Contact Blue Pearl Logistics Limited for customs clearance, freight forwarding and logistics support."
>
    <section class="bg-slate-950 py-20 text-white sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-300">
                Contact Blue Pearl Logistics
            </p>

            <h1 class="mt-4 max-w-4xl text-4xl font-black tracking-tight sm:text-5xl">
                Talk to us about your customs or logistics requirements.
            </h1>

            <p class="mt-6 max-w-3xl text-base leading-8 text-slate-300">
                Contact us about customs clearance, freight forwarding,
                container handling, warehousing, vehicle importation, cargo
                transport or other logistics support.
            </p>

            <p class="mt-5 text-sm font-bold text-cyan-300 sm:text-base">
                {{ config('company.tagline') }}
            </p>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl gap-7 px-4 sm:px-6 md:grid-cols-2 lg:grid-cols-3 lg:px-8">
            @foreach ([
                [
                    'Phone',
                    config('company.phone'),
                    'tel:'.config('company.phone_href'),
                    false,
                ],
                [
                    'Email',
                    config('company.email'),
                    'mailto:'.config('company.email'),
                    false,
                ],
                [
                    'WhatsApp',
                    'Start a chat',
                    'https://wa.me/'.config('company.whatsapp'),
                    true,
                ],
                [
                    'Office',
                    config('company.address'),
                    null,
                    false,
                ],
                [
                    'Postal Address',
                    config('company.postal_address'),
                    null,
                    false,
                ],
                [
                    'Website',
                    'www.bluepearlogistics.co.ke',
                    config('company.website'),
                    true,
                ],
            ] as [$heading, $value, $href, $external])
                <article class="rounded-3xl border border-slate-200 p-6 shadow-sm">
                    <p class="text-xs font-black uppercase tracking-[0.18em] text-cyan-700">
                        {{ $heading }}
                    </p>

                    @if ($href)
                        <a
                            href="{{ $href }}"
                            @if ($external)
                                target="_blank"
                                rel="noopener"
                            @endif
                            class="mt-4 block break-words text-base font-medium leading-7 text-slate-700 hover:text-cyan-700"
                        >
                            {{ $value }}
                        </a>
                    @else
                        <p class="mt-4 text-base font-medium leading-7 text-slate-700">
                            {{ $value }}
                        </p>
                    @endif
                </article>
            @endforeach
        </div>
    </section>

    <section class="bg-slate-100 py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-700">
                Find the right service
            </p>

            <h2 class="mt-4 max-w-3xl text-3xl font-black text-slate-950">
                Not sure which logistics service you need?
            </h2>

            <p class="mt-4 max-w-3xl text-sm leading-7 text-slate-600">
                Explore our logistics services first, or send the shipment
                details and we can help identify the relevant support.
            </p>

            <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                <a
                    href="{{ route('services') }}"
                    class="rounded-full bg-slate-950 px-6 py-3 text-center text-sm font-black text-white hover:bg-cyan-700"
                >
                    Explore Our Services
                </a>

                <a
                    href="{{ route('quote') }}"
                    class="rounded-full border border-slate-300 bg-white px-6 py-3 text-center text-sm font-black text-slate-800 hover:border-cyan-500 hover:text-cyan-700"
                >
                    Request a Quote
                </a>
            </div>

        </div>
    </section>
</x-layouts.marketing>
