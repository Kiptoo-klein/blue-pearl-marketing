<x-layouts.marketing title="Contact Us" description="Contact Blue Pearl Logistics for customs clearance and freight support.">
    <section class="bg-slate-950 py-20 text-white sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-cyan-300">Contact us</p>
            <h1 class="mt-4 max-w-4xl text-4xl font-black tracking-tight sm:text-5xl">Start with a call, message or quotation request.</h1>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl gap-7 px-4 sm:px-6 md:grid-cols-2 lg:grid-cols-4 lg:px-8">
            @foreach ([
                ['Phone', config('company.phone'), 'tel:'.config('company.phone_href')],
                ['Email', config('company.email'), 'mailto:'.config('company.email')],
                ['WhatsApp', 'Start a chat', 'https://wa.me/'.config('company.whatsapp')],
                ['Location', config('company.address'), null],
            ] as [$heading, $value, $href])
                <article class="rounded-3xl border border-slate-200 p-6 shadow-sm">
                    <p class="text-xs font-black uppercase tracking-[0.18em] text-cyan-700">{{ $heading }}</p>
                    @if ($href)
                        <a href="{{ $href }}" class="mt-4 block break-words text-lg font-black text-slate-950 hover:text-cyan-700">{{ $value }}</a>
                    @else
                        <p class="mt-4 text-lg font-black text-slate-950">{{ $value }}</p>
                    @endif
                </article>
            @endforeach
        </div>
    </section>
</x-layouts.marketing>
