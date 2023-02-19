<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bukti Transfer Bagi Hasil') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <!-- @if ($message = Session::get('success'))
                <div class="bg-white rounded-md shadow-lg p-5 mb-2">
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                </div>
            @endif -->
            <div class="bg-white rounded-md shadow-lg p-5">
                {{-- Edit here  --}}
                <!-- <div class="grid grid-cols-6 gap-4">
                    <div class="col-start-1 col-end-3">
                        <form action="{{ route('admin.laporans.create') }}" method="GET">
                            @csrf
                            @method('GET')
                            <button
                                class="mb-3 bg-blue-400 text-white font-semibold p-2 rounded-sm shadow-sm hover:bg-blue-200"
                                type="submit">Add Transaksi</button>
                        </form>
                    </div>
                    <div class="col-end-7 col-span-2">Total Cash: Rp.{{ number_format($uangs->uang) }}</div>
                </div> -->
                <div class="overflow-auto">
                    <table id="table" class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <!-- <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Jenis</div>
                                </th> -->
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Keterangan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Jumlah</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Waktu</div>
                                </th>

                                <!-- <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Pengadas / Pemodal</div>
                                </th> -->

                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Bukti Transfer</div>
                                </th>

                            </tr>
                        </thead>

                        <tbody class="text-sm divide-y divide-gray-100">
                            <!-- record 1 -->
                            @foreach ($laporans as $laporan)
                                <tr>
                                    <!-- <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $laporan->jenis }}
                                        </div>
                                    </td> -->
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $laporan->keterangan }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            Rp.{{ number_format($laporan->jumlah) }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $laporan->waktu }}
                                        </div>
                                    </td>
                                    <!-- <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            @if ($laporan->nama_pengadas != null)
                                                Nama Pengadas: {{ $laporan->nama_pengadas }}
                                            @elseif ($laporan->nama_pemodal != null)
                                                Nama Pemodal: {{ $laporan->nama_pemodal }}
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </td> -->
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            @if ($laporan->bukti_transfer != null)
                                                <a class="border-blue-500 border-2 text-blue-500 font-semibold p-2 rounded-sm"
                                                    href="/bukti_transfer_penjualan/{{ $laporan->bukti_transfer }}"
                                                    target="_blank">Lihat
                                                    Bukti TF</a>
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <script type="text/javascript">
                    $(function() {
                        var table = $('#table').DataTable({});
                    });
                </script>
                {{-- End Edit  --}}
            </div>
        </div>
    </div>
</x-admin-layout>
