<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Pengadas') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
                <div class="bg-white rounded-md shadow-lg p-5 mb-2">
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                </div>
            @endif
            <div class="bg-white rounded-md shadow-lg p-5">
                {{-- Edit here  --}}
                <p>Jumlah Sapi : {{ $jumlahhewan }}</p>
                <p>Jumlah Pemodal : {{ $jumlahhewan }}</p>
                <p>Kenaikan berat badan sapi rata-rata : {{ $average }}</p>
                {{-- End Edit  --}}
            </div>
        </div>
    </div>
</x-admin-layout>
