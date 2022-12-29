<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Hewan') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white rounded-md shadow-lg p-5">
                {{-- Edit here  --}}
                <div class="grid grid-cols-12 gap-5">
                    @foreach ($hewans as $hewan)
                        <div
                            class="col-span-12 md:col-span-4 bg-white drop-shadow-none hover:drop-shadow-md transition ease-in-out duration-300 rounded-md overflow-hidden shadow-lg">
                            <div class="bg-full bg-cover py-32 mb-2"
                                style="background-image: url('{{ asset('photo_hewan/' . $hewan->gambar) }}');"></div>
                            <div class="p-3">
                                <h2 class="font-bold mb-2 leading-relaxed">{{ $hewan->nama_hewan }} </h2>
                                <p class=" font-semibold mb-2 leading-relaxed">Modal:
                                    Rp.{{ number_format($hewan->modal_hewan) }}</p>
                                <p class=" font-semibold mb-2 leading-relaxed">Harga Jual:
                                    Rp.{{ number_format($hewan->harga_hewan) }}</p>
                                <form action="{{ route('pemodal.items.update', $hewan->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="text-sm font-semibold py-2 px-4 rounded bg-blue-300 leading-relaxed mb-2 hover:text-black transition ease-in-out duration-300">Pilih</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- End Edit  --}}
            </div>
        </div>
    </div>
</x-student-layout>
