<x-layouts.marketing
    title="Frequently Asked Questions"
    description="Answers to common questions about customs clearance, freight forwarding, container handling and vehicle importation."
>
    <section class="bg-slate-950 py-20 text-white sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-300">
                Customs and logistics FAQs
            </p>

            <h1 class="mt-4 max-w-4xl text-4xl font-black tracking-tight sm:text-5xl">
                Questions about customs clearance and logistics in Kenya.
            </h1>

            <p class="mt-6 max-w-3xl text-base leading-8 text-slate-300">
                Every shipment is different, but these answers cover common
                questions about clearance, freight, containers, vehicles and
                cargo delivery.
            </p>
        </div>
    </section>

    <section class="bg-slate-100 py-20 sm:py-24">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="space-y-4">
                @foreach ([
                    [
                        'What information is needed for a quotation?',
                        'Share the cargo type, origin, destination, estimated quantity or size, expected arrival details and any documents already available. You can still submit an enquiry when some details are missing.',
                    ],
                    [
                        'Can you help with both containers and vehicles?',
                        'Yes. Blue Pearl Logistics supports container handling, vehicle importation, customs clearance, freight coordination and delivery requirements.',
                    ],
                    [
                        'Do you only serve businesses?',
                        'No. Blue Pearl Logistics can support businesses, organizations and individuals depending on the shipment and service required.',
                    ],
                    [
                        'Can you arrange delivery after customs clearance?',
                        'Yes. Transport and delivery coordination can be included after cargo or a vehicle has been released.',
                    ],
                    [
                        'How long does customs clearance take?',
                        'Timing depends on the shipment, document readiness, cargo type, customs requirements, assessments and port or terminal processes. After reviewing the shipment, we can provide guidance relevant to the specific cargo.',
                    ],
                    [
                        'Which documents should I prepare?',
                        'Required documents vary by shipment. Common examples may include shipping documents, commercial documents, identification and relevant permits. We review the available information before confirming the requirements for a particular shipment.',
                    ],
                    [
                        'Can I send shipment details through WhatsApp?',
                        'Yes. You can start through WhatsApp, phone or the quotation form. The quotation form is useful when you want to provide several shipment details together.',
                    ],
                    [
                        'Where is Blue Pearl Logistics based?',
                        'Blue Pearl Logistics is based in Kenya. Contact the company for guidance on your cargo route, destination and the logistics support available for your shipment.',
                    ],
                ] as [$question, $answer])
                    <details class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-5 font-black text-slate-950">
                            <span>{{ $question }}</span>

                            <span
                                aria-hidden="true"
                                class="text-xl text-cyan-700 transition group-open:rotate-45"
                            >
                                +
                            </span>
                        </summary>

                        <p class="mt-4 max-w-3xl text-sm leading-7 text-slate-600">
                            {{ $answer }}
                        </p>
                    </details>
                @endforeach
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-2">
                <a
                    href="{{ route('services.show', 'customs-clearance') }}"
                    class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-cyan-300"
                >
                    <p class="text-xs font-black uppercase tracking-[0.15em] text-cyan-700">
                        Learn more
                    </p>

                    <h2 class="mt-2 text-lg font-black text-slate-950">
                        Customs Clearance & Compliance
                    </h2>

                    <p class="mt-2 text-sm text-slate-600">
                        Read about customs documentation, compliance and cargo
                        release support.
                    </p>
                </a>

                <a
                    href="{{ route('services.show', 'vehicle-importation') }}"
                    class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-cyan-300"
                >
                    <p class="text-xs font-black uppercase tracking-[0.15em] text-cyan-700">
                        Learn more
                    </p>

                    <h2 class="mt-2 text-lg font-black text-slate-950">
                        Vehicle Importation
                    </h2>

                    <p class="mt-2 text-sm text-slate-600">
                        Learn about vehicle clearance, release and delivery
                        coordination.
                    </p>
                </a>
            </div>

            <div class="mt-10 rounded-3xl bg-slate-950 p-8 text-white">
                <h2 class="text-2xl font-black">
                    Still have a shipment question?
                </h2>

                <p class="mt-3 text-sm leading-7 text-slate-300">
                    Send the shipment details through the quotation form or
                    contact Blue Pearl Logistics directly.
                </p>

                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <a
                        href="{{ route('quote') }}"
                        class="rounded-full bg-cyan-500 px-6 py-3 text-center text-sm font-black text-slate-950"
                    >
                        Request a Quote
                    </a>

                    <a
                        href="{{ route('services') }}"
                        class="rounded-full border border-white/20 px-6 py-3 text-center text-sm font-black text-white"
                    >
                        Explore Services
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="rounded-full border border-white/20 px-6 py-3 text-center text-sm font-black text-white"
                    >
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.marketing>
