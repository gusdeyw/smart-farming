<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Hewan') }}
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
                {{-- <form action="{{ route('admin.hewans.create') }}" method="GET">
                    @csrf
                    @method('GET')
                    <button class="mb-3 bg-blue-400 text-white font-semibold p-2 rounded-sm shadow-sm hover:bg-blue-200"
                        type="submit">Add
                        Hewan</button>
                </form> --}}
                <div class="overflow-auto">
                    <table id="table" class="table-auto">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Action</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nama Hewan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">ID Hewan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Jenis Hewan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Harga Hewan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Modal Hewan</div>
                                </th>
                                {{-- <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Kontrak Hewan</div>
                                </th> --}}
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Target Berat Hewan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Status Hewan</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Gambar</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Pemodal</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Pengadas</div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-sm divide-y divide-gray-100">
                            <!-- record 1 -->
                            @foreach ($hewans as $hewan)
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex justify-center">
                                            <form action="{{ route('admin.hewans.edit', $hewan->IDhewan) }}">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="p-2 font-medium text-lg">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </form>

                                            <form id="delete-form{{ $hewan->IDhewan }}"
                                                action="{{ route('admin.hewans.destroy', $hewan->IDhewan) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <button type="button" class="p-2 font-medium text-lg"
                                                onclick="confirmationDeleteRekening({{ $hewan->IDhewan }});">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>

                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $hewan->nama_hewan }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $hewan->IDhewan }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $hewan->jenis_hewan }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            Rp.{{ number_format($hewan->harga_hewan) }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            Rp.{{ number_format($hewan->modal_hewan) }}
                                        </div>
                                    </td>
                                    {{-- <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $hewan->kontrak_hewan }}
                                        </div>
                                    </td> --}}
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $hewan->target_berat_hewan }} Kg
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            @if ($hewan->status_hewan == 0)
                                                <p class="p-2 bg-yellow-300 rounded-sm">Belum dimodalkan</p>
                                            @elseif ($hewan->status_hewan == 1)
                                                <p class="p-2 bg-gray-400 rounded-sm">Proses Konfirmasi</p>
                                            @elseif ($hewan->status_hewan == 2)
                                                <p class="p-2 bg-gray-400 rounded-sm">Belum siap jual</p>
                                            @elseif($hewan->status_hewan == 3)
                                                <p class="p-2 bg-blue-400 rounded-sm">Siap jual</p>
                                            @elseif($hewan->status_hewan == 4)
                                                <p class="p-2 bg-green-400 rounded-sm">Terjual</p>
                                            @elseif($hewan->status_hewan == 5)
                                                <p class="p-2 bg-red-400 rounded-sm">Meninggal</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            <a class="border-blue-500 border-2 text-blue-500 font-semibold p-2 rounded-sm"
                                                href="/photo_hewan/{{ $hewan->gambar }}" target="_blank">Lihat
                                                Gambar</a>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            @if ($hewan->nama_pemodal != null)
                                                {{ $hewan->nama_pemodal }}
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            @if ($hewan->nama_pengadas != null)
                                                {{ $hewan->nama_pengadas }}
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
