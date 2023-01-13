<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pemodalan Hewan') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white rounded-md shadow-lg p-5 mb-3">
                Teknis Pengadas<br>
                <br>

                {!! $model->kontrak_hewan !!}
            </div>
            <div class="bg-white rounded-md shadow-lg p-5">
                {{-- Edit here  --}}
                <form action="{{ route('pemodal.items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Hewan
                        </label>
                        <select required type="text" name="id_hewan" id="id_hewan"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="{{ $model->id }}">Nama hewan: {{ $model->nama_hewan }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Akun Pembayaran
                        </label>
                        <select required type="text" name="rekening" id="rekening" placeholder="Nama Hewan"
                            onchange="return getRekNum();"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="">
                            </option>
                            @foreach ($rek as $re)
                                <option value="{{ $re->no_rekening }}">Bank {{ $re->nama_bank }} a/n
                                    {{ $re->nama_rekening }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nomor Rekening Admin
                        </label>
                        <input required type="text" name="norek_admin" id="norek_admin" disabled
                            class="w-full rounded-md border border-[#e0e0e0] bg-gray-300 py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Tanggal Transaksi
                        </label>
                        <input required type="date" name="tgl_transaksi" id="tgl_transaksi"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Jumlah Bayar
                        </label>
                        <input required type="number" name="jumlah_bayar" id="jumlah_bayar" placeholder="Jumlah Bayar"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $model->modal_hewan }}" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nama Bank
                        </label>
                        <input required type="text" name="nama_bank" id="nama_bank" placeholder="Nama Bank"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nama Rekening
                        </label>
                        <input required type="text" name="nama_rekening" id="nama_rekening"
                            placeholder="Nama Rekening"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nomor Bank
                        </label>
                        <input required type="text" name="nomor_bank" id="nomor_bank" placeholder="Nomor Rekening"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Bukti Transaksi
                        </label>
                        <input required type="file" name="bukti_transaksi" id="bukti_transaksi"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div>
                        <button
                            class="mb-3 bg-blue-400 text-white font-semibold p-2 rounded-sm shadow-sm hover:bg-blue-200"
                            type="submit">Submit</button>
                        <button
                            class="mb-3 bg-gray-400 text-white font-semibold p-2 rounded-sm shadow-sm hover:bg-blue-200"
                            type="button" onclick="history.back()">Batal</button>
                    </div>
                </form>

                {{-- End Edit  --}}
            </div>
        </div>
    </div>
</x-admin-layout>
