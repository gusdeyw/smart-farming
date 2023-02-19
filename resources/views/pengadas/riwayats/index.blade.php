<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Hewan') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white rounded-md shadow-lg p-5">
                {{-- Edit here  --}}
                <div class="">
                    <table id="table" class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Tanggal Riwayat</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nama Hewan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">ID Hewan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Kondisi Hewan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Status Jual</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Berat Hewan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Status Berat Badan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Foto Kondisi</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nama Pemodal</div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-sm divide-y divide-gray-100">
                            <!-- record 1 -->
                            @foreach ($hewans as $hewan)
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $hewan->tgl_riwayat }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $hewan->nama_hewan }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $hewan->id_hewan }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $hewan->kondisi_hewan }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $hewan->status_jual }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $hewan->berat_hewat }} Kg
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            @if ($hewan->status_berat == 'Tidak Bertambah')
                                                <p class="p-2 bg-gray-300 rounded-sm">Tidak Bertambah <i
                                                        class="fa-solid fa-square-minus"></i></p>
                                            @elseif ($hewan->status_berat == 'Bertambah')
                                                <p class="p-2 bg-green-400 rounded-sm">Bertambah <i
                                                        class="fa-solid fa-square-up"></i></p>
                                            @elseif ($hewan->status_berat == 'Berkurang')
                                                <p class="p-2 bg-yellow-400 rounded-sm">Berkurang <i
                                                        class="fa-solid fa-square-down"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            <a class="border-blue-500 border-2 text-blue-500 font-semibold p-2 rounded-sm"
                                                href="/update_photo_hewan/{{ $hewan->foto_kondisi }}"
                                                target="_blank">Lihat
                                                Gambar</a>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $hewan->nama_pemodal }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <script type="text/javascript">
                    $(function() {
                        var table = $('#table').DataTable({
                            search: {
                                search: "{{ !empty($_GET) ? $_GET['nama_hewan'] : '' }}"
                            }
                        });
                    });
                </script>
                {{-- End Edit  --}}
            </div>
        </div>
    </div>
</x-admin-layout>
