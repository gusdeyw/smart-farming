<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AlpineJS CDN -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Navbar Desktop -->
    <nav
        class="hidden md:grid px-5 md:px-12 lg:px-20 py-3 md:py-5 lg:px-7 bg-white w-full sticky top-0 left-0 border border-b-1 grid-cols-12">
        <div class="col-span-6 md:col-span-4 lg:col-span-4 flex items-center space-x-2">
            <img src="{{url('/')}}/gambar/sapi.png" 
            class="h-[52px]" alt=""> Peternakan
            Ngadas
        </div>
        <div class="col-span-6 md:col-span-4 lg:col-span-4 flex space-x-4 justify-center">

        </div>
        <div class="col-span-4 flex items-center space-x-5 justify-center">
            <div class="space-x-2">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="bg-[#176149] rounded-md px-7 py-2 text-white">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-[#176149] bg-white rounded-md px-7 py-2 hover:bg-[#176149] hover:text-white transition ease-in-out duration-300">Login</a>

                            <a href="{{ url('/register_user') }}"
                                class="bg-[#176149] rounded-md px-7 py-2 text-white">Register</a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Navbar Mobile -->
    <nav
        class="block md:hidden px-5 md:px-12 lg:px-20 py-3 md:py-5 lg:px-7 bg-white w-full sticky top-0 left-0 border border-b-1 grid grid-cols-12">
        <div class="col-span-6">

        </div>
        <div class="col-span-6">
            <div class="flex">
                <div x-data="{
                    open: false,
                    toggle() {
                        if (this.open) {
                            return this.close()
                        }

                        this.$refs.button.focus()

                        this.open = true
                    },
                    close(focusAfter) {
                        if (!this.open) return

                        this.open = false

                        focusAfter && focusAfter.focus()
                    }
                }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
                    class="relative">
                    <!-- Button -->
                    <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                        :aria-controls="$id('dropdown-button')" type="button"
                        class="flex items-center gap-2 bg-white px-5 py-2.5 ml-24">
                        <!-- Heroicon: chevron-down -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                        </svg>
                    </button>
                    <!-- Panel -->
                    @if (Route::has('login'))
                        <div x-ref="panel" x-show="open" x-transition.origin.top.left
                            x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none"
                            class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                    Login
                                </a>
                                <a href="{{ url('/register_user') }}"
                                    class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                    Register
                                </a>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <header class="bg-gradient-to-b from-white to-neutral-100 grid grid-cols-12 items-center">
        <div class="col-span-12 md:col-span-6 py-5 md:py-10 px-5 md:px-20">
            <div class="">
                <h1 class="text-2xl md:text-5xl font-bold leading-relaxed">
                    Peternakan Ngadas
                </h1>
                <p class="font-semibold my-4">
                    Mulai Pendanaan Peternakan Yang Aman Dan Nyaman Berinvestasi Bersama Kami
                </p>
            </div>
            {{-- <div class="space-x-2 md:space-x-5 mt-8">
                <a href="#" class="text-xs md:text-base bg-[#176149] px-10 py-3 text-white rounded-md">Memulai</a>
                <a href="#"
                    class="text-xs md:text-base px-10 py-3 text-black hover:text-white hover:bg-[#176149] transition ease-in-out duration-300 rounded-md">Pelajari
                    Lebih Lanjut</a>
            </div> --}}
            <div class="block md:flex space-y-2 mt-8 space-x-0 md:space-x-5">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 mr-2">
                        <path fill-rule="evenodd"
                            d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-bold text-sm md:text-base">Melestarikan Sistem Ngadas Tradisional Bali</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 mr-2">
                        <path fill-rule="evenodd"
                            d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-bold text-sm md:text-base">Memilih Proyek Pendanaan Sesui Dana</span>
                </div>

            </div>
            <div class="block md:flex mt-2 space-y-2 md:space-y-0 space-x-0 md:space-x-5">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 mr-2">
                        <path fill-rule="evenodd"
                            d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-bold text-sm md:text-base">Memilih Sistem Kontrak </span>
                </div>
                
        
                </div>
            </div>


        </div>
        <div class="col-span-12 md:col-span-6">
            <img src="{{url('/')}}/gambar/sapi.png" alt="" />
        </div>
    </header>

    <main>

        <section class="px-5 md:px-12 lg:px-20 grid grid-cols-12 mt-4 gap-y-3 pb-10 py-3">
            <div class="col-span-6 md:col-span-3 flex items-center">
                <div class="p-2">
                    <img src="https://igrow.asia/images/hero-bottom-7.png" class="h-[32px]" alt="" />
                </div>
                <div class="ml-2">
                    <p class="text-base md:text-xl font-bold">{{ $jumlahpemodal }}</p>
                    <p class="text-xs text-neutral-500">Total Pemodal</p>
                </div>
            </div>
            <div class="col-span-6 md:col-span-3 flex items-center">
                <div class="p-2">
                    <img src="https://igrow.asia/images/hero-bottom-6.png" class="h-[32px]" alt="" />
                </div>
                <div class="ml-2">
                    <p class="text-base md:text-xl font-bold">{{ $jumlahpengadas }}</p>
                    <p class="text-xs text-neutral-500">Total Pengadas</p>
                </div>
            </div>
            <div class="col-span-6 md:col-span-3 flex items-center">
                <div class="p-2">
                    <img src="{{url('/')}}/gambar/sapi.png" class="h-[32px]" alt="" />
                </div>
                <div class="ml-2">
                    <p class="text-base md:text-xl font-bold">{{ $jumlahhewans }}</p>
                    <p class="text-xs text-neutral-500">Total Sapi</p>
                </div>
            </div>
            <div class="col-span-6 md:col-span-3 flex items-center">
                <div class="p-2">
                    <img src="https://igrow.asia/images/hero-bottom-2.png" class="h-[32px]" alt="" />
                </div>
                <div class="ml-2">
                    <p class="text-base md:text-xl font-bold">Rp.{{ number_format($jum) }}</p>
                    <p class="text-xs text-neutral-500">Total Penjualan</p>
                </div>
            </div>
            <div class="col-span-6 md:col-span-3 flex items-center">

                <div class="p-2">
                    <img src="https://igrow.asia/images/hero-bottom-4.png" class="h-[32px]" alt="" />
                </div>
                <div class="ml-2">
                    <p class="text-base md:text-xl font-bold">Rp.{{ number_format($keuntungan) }}</p>
                    <p class="text-xs text-neutral-500">Total Keuntungan</p>
                </div>
            </div>

            <div class="col-span-6 md:col-span-3 flex items-center">
                <div class="p-2">
                    <img src="https://igrow.asia/images/hero-bottom-3.png" class="h-[32px]" alt="" />
                </div>
                <div class="ml-2">
                    <p class="text-base md:text-xl font-bold">{{ $jumlahberjalans }}</p>
                    <p class="text-xs text-neutral-500">Total Proyek Berjalan</p>
                </div>
            </div>
            <div class="col-span-6 md:col-span-3 flex items-center">
                <div class="p-2">
                    <img src="{{url('/')}}/gambar/sapi.png" class="h-[32px]" alt="" />
                </div>
                <div class="ml-2">
                    <p class="text-base md:text-xl font-bold">{{ $jumlahbelumberjalans }}</p>
                    <p class="text-xs text-neutral-500">Total Proyek Belum Berjalan</p>
                </div>
            </div>



            <div class="col-span-6 md:col-span-3 flex items-center">
                <div class="p-2">
                    <img src="https://cdn-icons-png.flaticon.com/512/220/220127.png" 
                    class="h-[32px]" alt="" />
                </div>
                <div class="ml-2">
                    <p class="text-base md:text-xl font-bold">{{ $jumlahmeninggals }}</p>
                    <p class="text-xs text-neutral-500">Total Proyek Gagal</p>
                </div>
            </div>
        </section>


        <section class="py-10 md:py-20 px-5 md:px-20 bg-green-800">
            <div class="text-center font-bold text-2xl md:text-5xl text-white">
                Mengapa Bergabung dengan Kami?
            </div>
            <div class="text-white text-center mt-4 leading-relaxed">
                Peternakan ngadas ini menggunakan jangka waktu tertentu, tergantung pemodal memilih hewan
                ternak yang didanai. Sesuai dengan dana pemodal untuk membeli sebuah hewan yang nantinya 
                akan di berikan kepada peternak yang berdampak di sekitar kita.
                Keuntungan menggunakan sistem peternakan ngadas ini memiliki keuntungan 140% dengan jangka waktu 2 Tahun lamanya.
            </div>
            <div class="text-white text-center w-full md:w-1/2 mx-auto leading-relaxed mt-4">

            </div>
            <div class="grid grid-cols-12 mt-10 gap-y-10">
                <div class="col-span-12 md:col-span-3">
                    <div class="bg-orange-500 rounded-full p-3 w-fit mx-auto">
                        <img src="https://cdn-icons-png.flaticon.com/512/220/220127.png" class="h-[32px]"
                            alt="" />
                        {{-- <i class="fa-light fa-cow"></i> --}}
                    </div>
                    <div class="text-white font-bold text-center mt-4 text-lg">
                        Pendanaan yang Berdampak
                    </div>
                    <div class="text-white text-center mt-4 leading-relaxed">
                        Memberi pendanaan kepada orang di lingkungan sekitar kita
                        yang kekurangan modal untuk membeli hewan ternak
                    </div>
                </div>
                <div class="col-span-12 md:col-span-3">
                    <div class="bg-green-500 rounded-full py-3 px-4 w-fit mx-auto">
                        <img src="https://igrow.asia/images/mengapa-item-2.png" class="h-[32px]" alt="" />
                    </div>
                    <div class="text-white font-bold text-center mt-4 text-lg">
                        Pendanaan ke Peternak
                    </div>
                    <div class="text-white text-center mt-4 leading-relaxed">
                        Memberi pendanaan kepada peternak yang kekurangan modal untuk membeli hewan ternak
                        setelah pemodal memberikan dana maka penyelenggara akan memberikan nama peternak dan
                        penyelengara akan menyiapkan hewan ternak yang akan di berikan kepada peternak
                    </div>
                </div>
                <div class="col-span-12 md:col-span-3">
                    <div class="bg-cyan-500 rounded-full p-3 w-fit mx-auto">
                        <img src="https://igrow.asia/images/mengapa-item-3.png" class="h-[32px]" alt="" />
                    </div>
                    <div class="text-white font-bold text-center mt-4 text-lg">
                        Pendanaan Berdampak
                    </div>
                    <div class="text-white text-center mt-4 leading-relaxed">
                        pendanaan ini akan berdampak kepada peternakan yang kekurangan dana.
                    </div>
                </div>
                <div class="col-span-12 md:col-span-3">
                    <div class="bg-blue-500 rounded-full p-3 w-fit mx-auto">
                        <img src="https://igrow.asia/images/mengapa-item-4.png" class="h-[32px]" alt="" />
                    </div>
                    <div class="text-white font-bold text-center mt-4 text-lg">
                        Ketahanan Pakan Ternak dan penggemukan
                    </div>
                    <div class="text-white text-center mt-4 leading-relaxed">
                        Memberikan pakan ternak berupa rumput-rumputan yang mengambil dari alam, serta menggemukan hewan dengan rumput-rumputan alami.
                    </div>
                </div>
            </div>
        </section>


        <section class="w-full bg-white pt-7 pb-7 md:pt-20 md:pb-24 tails-selected-element" contenteditable="true">
            <div
                class="box-border flex flex-col items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:flex-row max-w-7xl lg:px-16 mb-24">

                <!-- Image -->
                <div
                    class="box-border relative w-full max-w-md px-4 mt-5 mb-4 -ml-5 text-center bg-no-repeat bg-contain border-solid md:ml-0 md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 xl:pl-10">
                    <img src="{{url('/')}}/gambar/pengadas.jpeg"
                        class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20">
                </div>

                <!-- Content -->
                <div class="box-border order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none">
                    <h2
                        class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                        Ini adalah peternak Peternak
                    </h2>

                    <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                        <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                            <span
                                class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-green-300 rounded-full"
                                data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Peternak
                            mempunyai lahan.
                        </li>
                        <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                            <span
                                class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-green-300 rounded-full"
                                data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Peternaka
                            mempunyai keahlian beternak
                        </li>
                        <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                            <span
                                class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-green-300 rounded-full"
                                data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Peternak
                            mempunyai kandang
                        </li>
                        <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                            <span
                                class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-green-300 rounded-full"
                                data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Peternak
                            menyiapkan peralatan beternak
                        </li>
                    </ul>
                </div>
                <!-- End  Content -->
            </div>
            <div
                class="box-border flex flex-col items-center content-center px-8 mx-auto mt-2 leading-6 text-black border-0 border-gray-300 border-solid md:mt-20 xl:mt-0 md:flex-row max-w-7xl lg:px-16">

                <!-- Content -->
                <div class="box-border w-full text-black border-solid md:w-1/2 md:pl-6 xl:pl-32">
                    <h2
                        class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                        Ini adalah pemodal
                    </h2>

                    <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                        <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                            <span
                                class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-green-300 rounded-full"
                                data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Pemodal
                            ingin mempuyai hewan ternak
                        </li>
                        <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                            <span
                                class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-green-300 rounded-full"
                                data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Pemodal
                            tidak mempunyai lahan
                        </li>
                        <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                            <span
                                class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-green-300 rounded-full"
                                data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Pemodal
                            tidak mempuyai keahlian beternak
                        </li>
                        <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                            <span
                                class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-green-300 rounded-full"
                                data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Pemodal
                            mempunyai uang atau hewan
                        </li>
                        <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                            <span
                                class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-green-300 rounded-full"
                                data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Tidak
                            mempuyai waktu serta melihat keadaan hewan
                        </li>
                    </ul>
                </div>
                <!-- End  Content -->

                <!-- Image -->
                <div
                    class="box-border relative w-full max-w-md px-4 mt-10 mb-4 text-center bg-no-repeat bg-contain border-solid md:mt-0 md:max-w-none lg:mb-0 md:w-1/2">
                    <img src="{{url('/')}}/gambar/pemodal.png"
                        class="pl-4 sm:pr-10 xl:pl-10 lg:pr-32">
                </div>
            </div>
        </section>


        <section class="py-24 bg-green-800 tails-selected-element" contenteditable="true">
            <div class="px-8 mx-auto max-w-7xl lg:px-16">
                {{-- <h2 class="mb-4 text-xl font-bold md:text-3xl">Frequently Asked Questions</h2> --}}
                <div class="grid grid-cols-1 gap-0 text-white md:grid-cols-2 md:gap-16">
                    <div>
                        <h5 class="mt-10 mb-3 font-semibold text-white-900">Tugas Peternak :</h5>
                        <p>

                    <ul class="list-decimal px-4 leading-relaxed space-y-4">
                        <li>
                            Memelihara sapi dengan baik.
                        </li>
                            
                        <li>
                             Mencari pakan ternak .
                        </li>   

                        <li>
                            Memberikan pakan ternak.
                        </li>

                        <li>
                            Membrikan kondisi hewan secara berkala melewati websait kepada pemodal.
                        </li>

                        <li>
                             Jika hewan sakit segera menginformasikan kondisi hewan melewati konfirmasi pendanaan agar
                            penangan lebih cepat oleh penyelengara.
                        </li>

                        <li>
                            Menyiapkan peralatan bertenak dan kendang.
                        </li>

                        </p>
                <br>

                        <h5 class="mt-10 mb-3 font-semibold text-white-900">Keuntungan Pemdoal :</h5>
                        
                        <ul class="list-decimal px-4 leading-relaxed space-y-4">
                        <li>
                            Tidak menyewa tanah.
                        </li>
                        <li>
                            Tidak membeli pakan ternak.
                        </li>
                        <li>
                            Tidak membuat kandang.
                        </li>
                        <li>
                            Tidak membayar tenanga kerja peternak.
                        </li>
                        <li>
                            Mengetahui kondisi hewan setiiap bulan, tampa melihat kelokasi peternakan.
                        </li>


                    </div>
                    <div class="">
                        <h5 class="mt-10 mb-3 font-semibold text-white-900">Cara mendanai proyek :</h5>
                        <p class="">


                <ul class="list-decimal px-4 leading-relaxed space-y-4">
                        <li>
                            Pilihlah proyek pendanaan
                        </li>
                           Website peternakan ngadas menampilkan sistem persetujuan yang akan berjalan dengan jangka waktu 2 tahun. Proyek pendanaan Memiliki perbedaan pada target bobot hewan dan harga anak sapi sesuai umur anak sapi.<br>
                        <li>
                            Pendanaan disalurkan
                        </li>
                            Seletah mendapatkan dana penyelenggara akan memproses persaluran penerima dana dan
                            menenyiapkan hewan ternak untuk di berikan kepada peternak nantinya.<br>
                        <li>
                            Pantau perkembangan
                        </li>
                            Pemantauan keadaan hewan bisa di lihat melalui Riwayat hewan yang di berikan oleh peternak
                            setiap bulannya.<br>
                        <li>
                            Transaksi dan bagi hasil
                        </li>
                            Pendanaan dan bagi hasil akan melewati transfer antar bank.<br>

                        <h5 class="mt-10 mb-3 font-semibold text-white-900">Pelayaan :</h5>
                        <p class="">

                <ul class="list-decimal px-4 leading-relaxed space-y-4">
                    <li>
                            Register
                        </li>
                            Setelah melakukan register penguna hasrus menunggu 24 jam setelah mendaftar sebagi anggota kami. Lewat dari 24 jam maka data anda tidak di terima oleh penyelenggara karena tidak sesuai.<br>
                        </p>
                    <li>
                            Proyek Pendanaan
                        </li>
                            Setelah melakukan pendanaan penguna hasrus menunggu 24 jam setelah pendanaan, penyelenggara akan membeli dan menyiapkan hewan ternak serta menyiapkan nama peternak yang mendapatkan pendanaan nantinya.<br>
                        </p>
                          
                    </div>
                   
            </div>
        </section>


        <section
            class="bg-[#e5e3d0] px-5 md:px-20 py-5 md:py-20 grid grid-cols-12 space-y-0 md:space-y-10 gap-y-10 md:gap-y-0">
            <div class="col-span-12">
                <div class="text-center text-2xl md:text-5xl font-bold">
                    Daftar Lebih Mudah Hanya Tiga Langkah
                </div>
            </div>
            <div class="col-span-12 md:col-span-4 text-center">
                <div class="bg-white w-fit rounded-full mx-auto p-1">
                    <img src="https://igrow.asia/images/icon-daftar-1.png" class="h-[24px]" alt="" />
                </div>
                <div class="font-bold my-4">Lengkapi Data Diri</div>
                <div class="w-3/4 md:w-1/2 mx-auto">
                    Data Anda dijamin aman dan digunakan dengan sebagaimana mestinya
                </div>
            </div>
            <div class="col-span-12 md:col-span-4 text-center">
                <div class="bg-white w-fit rounded-full mx-auto p-1">
                    <img src="https://igrow.asia/images/icon-daftar-2.png" class="h-[24px]" alt="" />
                </div>
                <div class="font-bold my-4">Lengkapi Data Rekening</div>
                <div class="w-3/4 md:w-1/2 mx-auto">
                    Informasi keuangan meliputi nomor rekening.
                </div>
            </div>
            <div class="col-span-12 md:col-span-4 text-center">
                <div class="bg-white w-fit rounded-full mx-auto p-1">
                    <img src="https://igrow.asia/images/icon-daftar-3.png" class="h-[24px]" alt="" />
                </div>
                <div class="font-bold my-4">Lengkapi Data</div>
                <div class="w-3/4 md:w-1/2 mx-auto">
                    Anda wajib mengunggah KTP 
                </div>
            </div>
            <div class="col-span-12 md:col-span-12">
                 <a href="{{ url('/register_user') }}"
                    class="text-white bg-[#176149] block w-fit mx-auto rounded-md px-3 py-3 font-bold">Daftar
                    Sekarang</a>
        </section>

        <section class="grid grid-cols-12 px-5 md:px-20 py-5 md:py-10 bg-green-800 gap-x-5 gap-y-10 md:gap-y-0">
            <div class="col-span-12 md:col-span-6 space-y-4 text-white text-sm leading-relaxed">
                 <div class="font-bold"><i> Mengetahui Berat Hewan : </i></div>

                <p>
                    Dengan Menggunakan Meteran<br><br>

                    Prediksi berat badan sapi Bali paling akurat menggunakan timbangan, namun jika tidak ada timbangan
                    bisa menggunakan dengan mengukur “Lingkar Dada” menggunakan pita ukur.<br>

                </p>
                <a href="https://imgbb.com/"><img src="https://i.ibb.co/cbvH7VH/Picture1.png" alt="Picture1"
                        border="0" /></a>
                <p>
                    Contoh Cara Membaca Tabel:<br>
                    Jika lingkar dada menunjukkan angka 155 cm, maka cari angka 150 pada sisi kiri tabel dan cari angka
                    5 pada sisi atas, kemudian ditarik garis sampai bertemu antara garis datar dengan garis menurun,
                    maka ditemukan angka 224, artinya sapi dengan lingkar dada 155 cm memiliki bobot badan sekitar 224
                    kg.<br>

                </p>
                {{-- <p>
                    Isi dan materi yang tersedia pada situs iGrow dimaksudkan untuk
                    memberikan informasi dan tidak dianggap sebagai sebuah penawaran,
                    permohonan, undangan, saran, maupun rekomendasi untuk menginvestasikan
                    sekuritas, produk pasar modal, atau jasa keuangan lainnya. Perusahaan
                    dalam memberikan jasanya hanya terbatas pada fungsi administratif.
                </p>
                <p>
                    Pendanaan dan pinjaman yang ditempatkan di rekening iGrow adalah tidak
                    dan tidak akan dianggap sebagai simpanan yang diselenggarakan oleh
                    Perusahaan seperti diatur dalam Peraturan Perundang - Undangan tentang
                    Perbankan di Indonesia. Perusahaan atau setiap Direktur, Pegawai,
                    Karyawan, Wakil, Afiliasi, atau Agen - Agennya tidak memiliki tanggung
                    jawab terkait dengan setiap gangguan atau masalah yang terjadi atau
                    yang dianggap terjadi yang disebabkan oleh minimnya persiapan atau
                    publikasi dari materi yang tercantum pada situs Perusahaan.
                </p> --}}
            </div>
            <div class="col-span-12 md:col-span-6 text-white text-sm">
                <div class="font-bold"><i>PERHATIAN RESIKO : </i></div>
                <div class="">
                    <ul class="list-decimal px-4 leading-relaxed space-y-4">
                        <li>
                            Layanan pinjam meminjam berbasis teknologi antara pemberi pinjaman dengan penerima
                            pinjaman, sehingga segala risiko yang timbul dari kesepakatan tersebut ditanggung sepenuhnya
                            oleh masing - masing pihak.
                        </li>
                        <li>
                            Tidak adanya pengembalian uang baik salah pengiriman nomil maupun pembatalan trnsaksi
                            proyek pendanaan .
                        </li>
                        <li>
                            Resiko jika hewan ternak mati dengan penjelasan dan butipemodal dengan peternak mengalami
                            kerugian yang sama.
                        </li>
                       
                        <div class="font-bold my-4">BAGI HASIL DAN KONTRAK :</div>

                          <ul class="list-decimal px-4 leading-relaxed space-y-4">
                        <li>
                            Hewan ternak sapi bali, jenis jantan yang akan dijual dengan bobot yang sudah di pilih oleh pemodal. Dengan jangka waktu memelihara hewan terna 2 tahun lamanya.
                        </li>
                         <div class="font-bold my-4">Bagi hasil di bagi 4:</div>
                          <p>1. Pemodal mendapatkan modal Kembali.<br>
                            2. Pemodal mendapatkan 45% dari sisa penjualan<br>
                            3. Pengadas atau peternak mendapatkan 45% dari sisa penjualan<br>
                            4. Penyelenggara mendapatkan 10% dari sisa penjualan<br></p>
                        </br>
                        </p>
                        </br>
                        </li>


                    </ul>
                </div>

            </div>
        </section>


        <section
            class="bg-[#e5e3d0] px-5 md:px-20 py-5 md:py-20 grid grid-cols-12 space-y-0 md:space-y-10 gap-y-10 md:gap-y-0">
            <div class="col-span-12">
                <div class="text-center text-2xl md:text-5xl font-bold">
                    Hubungi Kami
                </div>
            </div>
            <div class="col-span-12 md:col-span-4 text-center">
                <div class="bg-white w-fit rounded-full mx-auto p-1">
                    <img src="{{url('/')}}/gambar/lokasi.png" class="h-[24px]" alt="" />
                </div>
                <div class="font-bold my-4">Alamat</div>
                <div class="w-3/4 md:w-1/2 mx-auto">
                    JL. Tauku Uamar No.55 Kediri, Kecamatan Kediri, Kabupaten Tabanaan
                </div>
            </div>
            <div class="col-span-12 md:col-span-4 text-center">
                <div class="bg-white w-fit rounded-full mx-auto p-1">
                    <img src="{{url('/')}}/gambar/tlff.png" class="h-[24px]" alt="" />
                </div>
                <div class="font-bold my-4">Telepon</div>
                <div class="w-3/4 md:w-1/2 mx-auto">
                    O895355541127
                </div>
            </div>
            <div class="col-span-12 md:col-span-4 text-center">
                <div class="bg-white w-fit rounded-full mx-auto p-1">
                    <img src="{{url('/')}}/gambar/gamail.png" class="h-[24px]" alt="" />
                   
                </div>
                <div class="font-bold my-4">Gmail</div>
                <div class="w-3/4 md:w-1/2 mx-auto">
                    peternakanngadas@gmail.com 
                </div>
            </div>

    </main>


</body>

</html>
