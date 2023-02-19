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

                <form action="{{ route('admin.groups.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nama Hewan
                        </label>
                        <input required type="text" name="nama_hewan" id="nama_hewan" placeholder="Nama Hewan"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $model->nama_hewan }}" />
                    </div>
                    <div class="mb-5">
                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                            Jenis Hewan
                        </label>
                        <input required type="text" name="jenis_hewan" id="jenis_hewan" placeholder="Jenis Hewan"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $model->jenis_hewan }}" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Harga Hewan
                        </label>
                        <input required type="number" name="harga_hewan" id="harga_hewan" placeholder="Harga Hewan"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $model->harga_hewan }}" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Banyaknya Hewan
                        </label>
                        <input required type="number" name="banyak_hewan" id="banyak_hewan" placeholder="Harga Hewan"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $model->banyak_hewan }}" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Modal Hewan
                        </label>
                        <input required type="number" name="modal_hewan" id="modal_hewan" placeholder="Modal Hewan"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $model->modal_hewan }}" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Kontrak Hewan
                        </label>
                        <textarea required type="text" name="kontrak_hewan" id="blogcontent" placeholder="Kontrak Hewan"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $model->kontrak_hewan }}"></textarea>
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Target Berat Hewan
                        </label>
                        <input required type="text" name="target_berat_hewan" id="target_berat_hewan"
                            placeholder="Target Berat Hewan"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $model->target_berat_hewan }}" />
                    </div>
                    <div class="mb-5">
                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">
                            Gambar
                        </label>
                        <input required type="file" name="gambar" id="gambar" placeholder="gambar"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $model->gambar }}" />
                    </div>
                    <div>
                        <button
                            class="mb-3 bg-blue-400 text-white font-semibold p-2 rounded-sm shadow-sm hover:bg-blue-200"
                            type="submit">Submit</button>
                    </div>
                </form>

                <script>
                    CKEDITOR.replace('blogcontent', {
                        height: 300,
                    });
                </script>
                {{-- End Edit  --}}
            </div>
        </div>
    </div>
</x-admin-layout>
