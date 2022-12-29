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
            <i class="fa-regular fa-cow"></i> Aplikasi Pengadas
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
                    <div x-ref="panel" x-show="open" x-transition.origin.top.left
                        x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none"
                        class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md">
                        <a href="#"
                            class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                            Menu
                        </a>

                        <a href="#"
                            class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                            Menu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <header class="bg-gradient-to-b from-white to-neutral-100 grid grid-cols-12 items-center">
        <div class="col-span-12 md:col-span-6 py-5 md:py-10 px-5 md:px-20">
            <div class="">
                <h1 class="text-2xl md:text-5xl font-bold leading-relaxed">
                    Pendanaan Pertanian Aman dan Berdampak
                </h1>
                <p class="font-semibold my-4">
                    Mulai pendanaan pertanian yang aman, sekaligus berdampak kepada
                    masyarakat dan lingkungan.
                </p>
            </div>
            <div class="space-x-2 md:space-x-5 mt-8">
                <a href="#" class="text-xs md:text-base bg-[#176149] px-10 py-3 text-white rounded-md">Memulai</a>
                <a href="#"
                    class="text-xs md:text-base px-10 py-3 text-black hover:text-white hover:bg-[#176149] transition ease-in-out duration-300 rounded-md">Pelajari
                    Lebih Lanjut</a>
            </div>
            <div class="block md:flex space-y-2 mt-8 space-x-0 md:space-x-5">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 mr-2">
                        <path fill-rule="evenodd"
                            d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-bold text-sm md:text-base">Pendanaan Berasuransi</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 mr-2">
                        <path fill-rule="evenodd"
                            d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-bold text-sm md:text-base">Berdampak Lingkungan</span>
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
                    <span class="font-bold text-sm md:text-base">Memberdayakan Petani</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 mr-2">
                        <path fill-rule="evenodd"
                            d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-bold text-sm md:text-base">Mendukung Ketahanan Pangan</span>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6">
            <img src="https://img.freepik.com/premium-photo/holstein-cow-standing_191971-14134.jpg?w=2000"
                alt="" />
        </div>
    </header>
    <main>

        <section class="py-10 grid grid-cols-12">
            <div class="col-span-12">
                <h2 class="text-2xl md:text-5xl text-center font-bold">
                    Pendanaan Pertanian Lebih Mudah Bersama Kami
                </h2>
                <p class="text-center text-neutral-600 text-lg mt-3">
                    Pendanaan Pertanian Lebih Mudah Bersama Kami
                </p>
            </div>
        </section>
        <section class="py-10 md:py-20 px-5 md:px-20 bg-green-800">
            <div class="text-center font-bold text-2xl md:text-5xl text-white">
                Mengapa Bergabung dengan Kami?
            </div>
            <div class="text-white text-center w-full md:w-1/2 mx-auto leading-relaxed mt-4">

            </div>
            <div class="grid grid-cols-12 mt-10 gap-y-10">
                <div class="col-span-12 md:col-span-3">
                    <div class="bg-orange-500 rounded-full p-3 w-fit mx-auto">
                        <img src="https://igrow.asia/images/mengapa-item-1.png" class="h-[32px]" alt="" />
                    </div>
                    <div class="text-white font-bold text-center mt-4 text-lg">
                        Pendanaan Berdampak
                    </div>
                    <div class="text-white text-center mt-4 leading-relaxed">
                        Pemberi pendanaan ikut berdampak terhadap lingkungan dan sosial
                        disamping mendapatkan margin
                    </div>
                </div>
                <div class="col-span-12 md:col-span-3">
                    <div class="bg-green-500 rounded-full py-3 px-4 w-fit mx-auto">
                        <img src="https://igrow.asia/images/mengapa-item-2.png" class="h-[32px]" alt="" />
                    </div>
                    <div class="text-white font-bold text-center mt-4 text-lg">
                        Pendanaan Berdampak
                    </div>
                    <div class="text-white text-center mt-4 leading-relaxed">
                        Pemberi pendanaan ikut berdampak terhadap lingkungan dan sosial
                        disamping mendapatkan margin
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
                        Pemberi pendanaan ikut berdampak terhadap lingkungan dan sosial
                        disamping mendapatkan margin
                    </div>
                </div>
                <div class="col-span-12 md:col-span-3">
                    <div class="bg-blue-500 rounded-full p-3 w-fit mx-auto">
                        <img src="https://igrow.asia/images/mengapa-item-4.png" class="h-[32px]" alt="" />
                    </div>
                    <div class="text-white font-bold text-center mt-4 text-lg">
                        Pendanaan Berdampak
                    </div>
                    <div class="text-white text-center mt-4 leading-relaxed">
                        Pemberi pendanaan ikut berdampak terhadap lingkungan dan sosial
                        disamping mendapatkan margin
                    </div>
                </div>
            </div>
        </section>




        <section
            class="bg-[#e5e3d0] px-5 md:px-20 py-5 md:py-20 grid grid-cols-12 space-y-0 md:space-y-10 gap-y-10 md:gap-y-0">
            <div class="col-span-12">
                <div class="text-center text-2xl md:text-5xl font-bold">
                    Daftar lebih mudah hanya tiga langkah
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
                <div class="font-bold my-4">Lengkapi Data Diri</div>
                <div class="w-3/4 md:w-1/2 mx-auto">
                    Informasi keuangan meliputi nomor rekening dan ahli waris Anda
                </div>
            </div>
            <div class="col-span-12 md:col-span-4 text-center">
                <div class="bg-white w-fit rounded-full mx-auto p-1">
                    <img src="https://igrow.asia/images/icon-daftar-3.png" class="h-[24px]" alt="" />
                </div>
                <div class="font-bold my-4">Lengkapi Data Diri</div>
                <div class="w-3/4 md:w-1/2 mx-auto">
                    Anda wajib mengunggah KTP dan NPWP untuk danai proyek
                </div>
            </div>
            <div class="col-span-12 md:col-span-12">
                <a href=""
                    class="text-white bg-[#176149] block w-fit mx-auto rounded-md px-3 py-3 font-bold">Daftar
                    Sekarang</a>
            </div>
        </section>
        <section class="grid grid-cols-12 py-10 px-5 md:px-20 gap-y-10">
            <div class="col-span-12 md:col-span-6">
                <div class="text-2xl font-bold text-center mb-5">
                    Telah Berizin dan Diawasi oleh
                </div>
                <div>
                    <img src="https://igrow.asia/images/ojk-home-footer.png" class="mx-auto h-[75px]"
                        alt="" />
                </div>
            </div>
            <div class="col-span-12 md:col-span-6">
                <div class="text-2xl font-bold text-center mb-5">
                    Anggota Terdaftar Dari
                </div>
                <div>
                    <img src="https://igrow.asia/images/afpi-home-footer.png" class="mx-auto h-[75px]"
                        alt="" />
                </div>
            </div>
        </section>
    </main>


</body>

</html>
