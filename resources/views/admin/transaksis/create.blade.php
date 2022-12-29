<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Pengadas') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white rounded-md shadow-lg p-5">
                {{-- Edit here  --}}

                <form action="{{ route('admin.transaksis.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-5">
                        <input hidden type="text" name="id_transaksi" value="{{ $model->id }}">
                        <input hidden type="text" name="id_hewan" value="{{ $hewans->id }}">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Pengadas
                        </label>
                        <select required type="text" name="id" id="id" onchange="return getRekNum();"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="">
                            </option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button
                            class="mb-3 bg-blue-400 text-white font-semibold p-2 rounded-sm shadow-sm hover:bg-blue-200"
                            type="submit">Submit</button>
                    </div>
                </form>

                {{-- End Edit  --}}
            </div>
        </div>
    </div>
</x-admin-layout>
