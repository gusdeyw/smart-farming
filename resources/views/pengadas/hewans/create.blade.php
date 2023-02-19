<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Kondisi Online') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white rounded-md shadow-lg p-5">
                {{-- Edit here  --}}

                <form action="{{ route('pengadas.hewans.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input hidden type="text" name="id_pemodal" value="{{ $model->id_pemodal }}">
                    <input hidden type="text" name="id_hewan" value="{{ $model->id }}">
                    <input hidden type="text" name="id_pengadas" value="{{ $model->id_pengadas }}">
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Tanggal
                        </label>
                        <input required type="date" name="tgl_riwayat" id="tgl_riwayat"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                            Kondisi Hewan
                        </label>
                        <input required type="text" name="kondisi_hewan" id="kondisi_hewan"
                            placeholder="Kondisi Hewan"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Status Jual
                        </label>
                        <select required type="text" name="status_jual" id="status_jual"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="">
                            </option>
                            <option value="Belum Siap Jual">
                                Belum Siap Jual
                            </option>
                            <option value="Siap Jual">
                                Siap Jual
                            </option>
                            <option value="Meinggal">
                                Meninggal
                            </option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Berat Hewan
                        </label>
                        <input required type="number" name="berat_hewan" id="berat_hewan" placeholder="Berat Hewan"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Status Berat Badan
                        </label>
                        <select required type="text" name="status_berat" id="status_berat"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="">
                            </option>
                            <option value="Tidak Bertambah">
                                Tidak Bertambah
                            </option>
                            <option value="Bertambah">
                                Bertambah
                            </option>
                            <option value="Berkurang">
                                Berkurang
                            </option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Photo Kondisi
                        </label>
                        <input required type="file" name="foto_kondisi" id="foto_kondisi" placeholder="gambar"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
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
