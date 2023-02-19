<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Hewan Baru') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white rounded-md shadow-lg p-5">
                {{-- Edit here  --}}

                <div class="bg-white rounded-md shadow-lg p-5 mb-3">
                    Teknis Pengadas<br>
                    <br>

                    {!! $model->kontrak_group !!}
                </div>
                <div class="bg-white rounded-md shadow-lg p-5 mb-3">
                    List Pemodal: <br>
                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                        @foreach ($pemodals as $pemodal)
                            <li>
                                {{ $pemodal->nama_pemodal }}
                            </li>
                        @endforeach
                    </ul>
                    Jumlah Sapi yang sudah berjalan: {{ $grupNow }}/{{ $model->banyak_sapi }}<br>
                    Total dana terkumpul: IDR {{ number_format($totalDanaTerkumpul) }} dari total IDR
                    {{ number_format($model->banyak_sapi * $model->modal_group) }}<br>

                </div>
                {{-- End Edit  --}}
            </div>
        </div>
    </div>
</x-admin-layout>
