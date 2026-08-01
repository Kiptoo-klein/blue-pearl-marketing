<x-layouts.marketing
    title="Contact Us"
    description="Contact Blue Pearl Logistics Limited for customs clearance, freight forwarding and logistics support."
>
    <section class="bg-slate-950 py-20 text-white sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-300">
                Contact us
            </p>

            <h1 class="mt-4 max-w-4xl text-4xl font-black tracking-tight sm:text-5xl">
                Start with a call, message or enquiry.
            </h1>

            <p class="mt-5 text-sm font-bold text-slate-300 sm:text-base">
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
</x-layouts.marketing>
