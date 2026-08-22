<x-layouts.marketing
    title="Request a Quote"
    description="Request customs clearance, freight forwarding, cargo handling, warehousing, transport, vehicle importation or other logistics support."
>

    <section class="bg-slate-950 py-20 text-white sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-300">
                Request a quote
            </p>

            <h1 class="mt-4 text-4xl font-black tracking-tight sm:text-5xl">
                Tell us about your shipment.
            </h1>

            <p class="mt-6 max-w-3xl text-base leading-8 text-slate-300">
                Share the cargo type, origin, destination and available shipment details through WhatsApp, phone or email.
            </p>

            <div class="mt-9 flex flex-col gap-3 sm:flex-row">

                <a
                    href="https://wa.me/{{ config('company.whatsapp') }}"
                    target="_blank"
                    rel="noopener"
                    class="rounded-full bg-emerald-500 px-7 py-3.5 text-center text-sm font-black text-white"
                >
                    Request through WhatsApp
                </a>

                <a
                    href="mailto:{{ config('company.email') }}"
                    class="rounded-full border border-white/20 px-7 py-3.5 text-center text-sm font-black text-white"
                >
                    Request by Email
                </a>

            </div>
        </div>
    </section>

    <section class="bg-slate-100 py-16 sm:py-20">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            <div class="rounded-3xl bg-white p-6 shadow-sm sm:p-9">

                @if (session('success'))
                    <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-bold text-emerald-800">
                        {{ session('success') }}
                    </div>
                @endif

                <form
                    method="POST"
                    action="{{ route('quote.store') }}"
                    class="grid gap-5 sm:grid-cols-2"
                >
                    @csrf

                    <div class="hidden" aria-hidden="true">
                        <label for="website">Website</label>

                        <input
                            id="website"
                            name="website"
                            type="text"
                            tabindex="-1"
                            autocomplete="off"
                        >
                    </div>

                    <div class="sm:col-span-2">
                        <label
                            for="name"
                            class="mb-2 block text-sm font-bold text-slate-700"
                        >
                            Name *
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            required
                            @error('name')
                                aria-invalid="true"
                                aria-describedby="name-error"
                            @enderror
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100"
                        >

                        @error('name')
                            <p
                                id="name-error"
                                role="alert"
                                class="mt-2 text-sm text-red-600"
                            >
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label
                            for="phone"
                            class="mb-2 block text-sm font-bold text-slate-700"
                        >
                            Phone number
                        </label>

                        <input
                            id="phone"
                            name="phone"
                            type="tel"
                            value="{{ old('phone') }}"
                            autocomplete="tel"
                            aria-describedby="contact-help{{ $errors->has('phone') ? ' phone-error' : '' }}"
                            @error('phone')
                                aria-invalid="true"
                            @enderror
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100"
                        >

                        @error('phone')
                            <p
                                id="phone-error"
                                role="alert"
                                class="mt-2 text-sm text-red-600"
                            >
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label
                            for="email"
                            class="mb-2 block text-sm font-bold text-slate-700"
                        >
                            Email address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            aria-describedby="contact-help{{ $errors->has('email') ? ' email-error' : '' }}"
                            @error('email')
                                aria-invalid="true"
                            @enderror
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100"
                        >

                        @error('email')
                            <p
                                id="email-error"
                                role="alert"
                                class="mt-2 text-sm text-red-600"
                            >
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <p
                        id="contact-help"
                        class="-mt-2 text-xs text-slate-500 sm:col-span-2"
                    >
                        Provide at least a phone number or email address.
                    </p>

                    <div class="sm:col-span-2">
                        <label
                            for="service"
                            class="mb-2 block text-sm font-bold text-slate-700"
                        >
                            Service required *
                        </label>

                        <select
                            id="service"
                            name="service"
                            required
                            @error('service')
                                aria-invalid="true"
                                aria-describedby="service-error"
                            @enderror
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100"
                        >
                            <option value="">
                                Select a service
                            </option>

                            @foreach (
                                collect(config('services'))
                                    ->filter(
                                        fn ($service) =>
                                            is_array($service)
                                            && isset($service['name'])
                                    )
                                as $value => $service
                            )
                                <option
                                    value="{{ $value }}"
                                    @selected(
                                        old(
                                            'service',
                                            request('service')
                                        ) === $value
                                    )
                                >
                                    {{ $service['name'] }}
                                </option>
                            @endforeach

                            <option
                                value="other"
                                @selected(
                                    old(
                                        'service',
                                        request('service')
                                    ) === 'other'
                                )
                            >
                                Other
                            </option>
                        </select>

                        @error('service')
                            <p
                                id="service-error"
                                role="alert"
                                class="mt-2 text-sm text-red-600"
                            >
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label
                            for="message"
                            class="mb-2 block text-sm font-bold text-slate-700"
                        >
                            How can we help? *
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            required
                            @error('message')
                                aria-invalid="true"
                                aria-describedby="message-error"
                            @enderror
                            placeholder="Briefly describe the service or cargo assistance you need."
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100"
                        >{{ old('message') }}</textarea>

                        @error('message')
                            <p
                                id="message-error"
                                role="alert"
                                class="mt-2 text-sm text-red-600"
                            >
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <button
                            type="submit"
                            class="w-full rounded-full bg-cyan-600 px-7 py-3.5 text-sm font-black text-white shadow-lg transition hover:bg-cyan-700 sm:w-auto"
                        >
                            Send Enquiry
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid gap-6 md:grid-cols-3">

                @foreach ([
                    [
                        'Cargo details',
                        'What are you importing or moving?',
                    ],
                    [
                        'Route details',
                        'Where is the cargo coming from and where should it go?',
                    ],
                    [
                        'Available documents',
                        'Share any Bill of Lading, invoice or arrival information available.',
                    ],
                ] as [$heading, $description])

                    <article class="rounded-3xl border border-slate-200 p-7 shadow-sm">
                        <h2 class="text-xl font-black text-slate-950">
                            {{ $heading }}
                        </h2>

                        <p class="mt-4 text-sm leading-7 text-slate-600">
                            {{ $description }}
                        </p>
                    </article>

                @endforeach

            </div>
        </div>
    </section>

</x-layouts.marketing>
