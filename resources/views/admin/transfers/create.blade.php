<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transfer Baru') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white rounded-md shadow-lg p-5">
                {{-- Edit here  --}}

                <form action="{{ route('admin.transfers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Jenis Transaksi
                        </label>
                        <select required type="text" name="jenis" id="jenis"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="Cash Keluar">
                                Cash Keluar
                            </option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                            Keterangan
                        </label>
                        <input required type="text" name="keterangan" id="keterangan" placeholder="keterangan"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Harga Jual
                        </label>
                        <input required type="number" name="jumlah" id="jumlah" placeholder="Jumlah"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5 border-2 rounded-md p-2">
                        <p class="font-bold">Informasi Pemodal</p>
                        @foreach ($pemodals as $pemodal)
                            <p>Nama : {{ $pemodal->name }}</p>
                            <p>Nomor Rekening : {{ $pemodal->no_rekening }}</p>
                            <p>Nama Bank : {{ $pemodal->bank }}</p>
                            <p>Nomor Telp : {{ $pemodal->no_telp }}</p>
                            <p>Persentase : {{ $pemodal->persentase }}%</p>
                            <p>Jumlah Modal : {{ $pemodal->jumlah_setor }}</p>
                            <input required type="file" name="bukti_pemodal"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            <br>
                        @endforeach

                    </div>
                    <div class="mb-5 border-2 rounded-md p-2">
                        <p class="font-bold">Informasi Pengadas</p>
                        <p>Nama : {{ $pengadas->name }}</p>
                        <p>Nomor Rekening : {{ $pengadas->no_rekening }}</p>
                        <p>Nama Bank : {{ $pengadas->bank }}</p>
                        <p>Nomor Telp : {{ $pengadas->no_telp }}</p>
                        <p>Alamat Tanah : {{ $pengadas->alamat_tanah }}</p>
                        <input required type="file" name="bukti_pengadas" id="bukti_pengadas"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <input hidden type="text" name="id_pemodal" id="id_pemodal" value="{{ $hewans->id_pemodal }}" />
                    <input hidden type="text" name="id_pengadas" id="id_pengadas"
                        value="{{ $hewans->id_pengadas }}" />
                    <input hidden type="text" name="id_hewan" id="id_hewan" value="{{ $hewans->id }}" />
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
