<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Rekening') }}
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
                <form action="{{ route('admin.rekenings.create') }}" method="GET">
                    @csrf
                    @method('GET')
                    <button class="mb-3 bg-blue-400 text-white font-semibold p-2 rounded-sm shadow-sm hover:bg-blue-200"
                        type="submit">Add
                        Rekening</button>
                </form>
                <div class="overflow-auto">
                    <table id="table" class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Action</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nama Bank</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nama Rekening</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nomor Rekening</div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-sm divide-y divide-gray-100">
                            <!-- record 1 -->
                            @foreach ($rekenings as $rekening)
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex justify-center">
                                            <form action="{{ route('admin.rekenings.edit', $rekening->id) }}">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="p-2 font-medium text-lg">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </form>

                                            <form id="delete-form{{ $rekening->id }}"
                                                action="{{ route('admin.rekenings.destroy', $rekening->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <button type="button" class="p-2 font-medium text-lg"
                                                onclick="confirmationDeleteRekening({{ $rekening->id }});">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>

                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $rekening->nama_bank }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $rekening->nama_rekening }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $rekening->no_rekening }}
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
