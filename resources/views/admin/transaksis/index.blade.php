<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Transaksi') }}
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
                <div class="overflow-auto">
                    <table id="table" class="table-auto">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Action</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Status</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Tanggal Transaksi</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Jumlah Bayar</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nomor Rekening</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nama Rekening</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nama Bank</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Bukti Transaksi</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Pemodal</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Hewan</div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-sm divide-y divide-gray-100">
                            <!-- record 1 -->
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex justify-center">
                                            <form id="update-form{{ $transaksi->id }}"
                                                action="{{ route('admin.transaksis.update', $transaksi->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                            @if ($transaksi->status_transaksi == 0)
                                                <button type="button"
                                                    class="p-2 rounded-sm shadow-sm bg-green-500 text-white font-medium hover:bg-green-300"
                                                    onclick="confirmationTransaksi({{ $transaksi->id }});">
                                                    Konfirmasi
                                                </button>
                                            @elseif($transaksi->status_transaksi == 1)
                                                {{-- <form action="{{ route('admin.transaksis.edit', $transaksi->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('GET')
                                                    <button type="submit"
                                                        class="p-2 rounded-sm shadow-sm bg-green-500 text-white font-medium hover:bg-green-300">
                                                        Daftar Pengadas
                                                    </button>
                                                </form> --}}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="font-medium text-gray-800">
                                            @if ($transaksi->status_transaksi == 0)
                                                Belum Konfirmasi
                                            @elseif ($transaksi->status_transaksi == 1)
                                                Terkonfirmasi
                                            @else
                                                Selesai
                                            @endif
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $transaksi->tgl_transaksi }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            Rp.{{ number_format($transaksi->jumlah_bayar) }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $transaksi->nomor_bank }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $transaksi->nama_rekening }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $transaksi->nama_bank }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            <a class="border-blue-500 border-2 text-blue-500 font-semibold p-2 rounded-sm"
                                                href="/bukti_transaksi/{{ $transaksi->bukti_transaksi }}"
                                                target="_blank">Lihat
                                                Gambar</a>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $transaksi->nama_pemodal }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $transaksi->nama_groups }}
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
