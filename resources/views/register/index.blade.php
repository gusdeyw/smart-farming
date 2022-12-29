<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register_user.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="mt-4">
                <x-jet-label for="role_id" value="{{ __('Register as:') }}" />
                <select name="role_id" x-model="role_id"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="2">Pemodal</option>
                    <option value="3">Pengadas</option>
                </select>
            </div>

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="tgl_lahir" value="{{ __('Tanggal Lahir') }}" />
                <x-jet-input id="tgl_lahir" class="block mt-1 w-full" type="date" name="tgl_lahir" :value="old('tgl_lahir')"
                    required />
            </div>
            <div class="mt-4">
                <x-jet-label for="alamat" value="{{ __('Alamat') }}" />
                <x-jet-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')"
                    required />
            </div>
            <div class="mt-4">
                <x-jet-label for="no_telp" value="{{ __('No Telp') }}" />
                <x-jet-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')"
                    required />
            </div>
            <div class="mt-4">
                <x-jet-label for="nama_ibu_kandung" value="{{ __('Nama Ibu Kandung') }}" />
                <x-jet-input id="nama_ibu_kandung" class="block mt-1 w-full" type="text" name="nama_ibu_kandung"
                    :value="old('nama_ibu_kandung')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="bank" value="{{ __('Bank') }}" />
                <x-jet-input id="bank" class="block mt-1 w-full" type="text" name="bank" :value="old('bank')"
                    required />
            </div>
            <div class="mt-4">
                <x-jet-label for="no_rekening" value="{{ __('No Rekening') }}" />
                <x-jet-input id="no_rekening" class="block mt-1 w-full" type="text" name="no_rekening"
                    :value="old('no_rekening')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="sts_tempat_tinggal" value="{{ __('Status Tempat Tinggal') }}" />
                <x-jet-input id="sts_tempat_tinggal" class="block mt-1 w-full" type="text" name="sts_tempat_tinggal"
                    required />
            </div>
            <div class="mt-4">
                <x-jet-label for="foto_ktp" value="{{ __('Foto KTP') }}" />
                <x-jet-input :value="old('foto_ktp')" id="foto_ktp" class="block mt-1 w-full" type="file" name="foto_ktp"
                    required />
            </div>
            <div class="mt-4">
                <x-jet-label for="foto_npwp" value="{{ __('Foto NPWP') }}" />
                <x-jet-input :value="old('foto_npwp')" id="foto_npwp" class="block mt-1 w-full" type="file"
                    name="foto_npwp" required />
            </div>
            <div class="mt-4" x-show="role_id == 2">
                <x-jet-label for="pendapatan" value="{{ __('Pendapatan') }}" />
                <x-jet-input id="pendapatan" class="block mt-1 w-full" type="text" name="pendapatan" />
            </div>

            <div class="mt-4" x-show="role_id == 3">
                <x-jet-label for="alamat_tanah" value="{{ __('Alamat Tanah') }}" />
                <x-jet-input id="alamat_tanah" class="block mt-1 w-full" type="text" name="alamat_tanah" />
            </div>
            <div class="mt-4" x-show="role_id == 3">
                <x-jet-label for="keahlian" value="{{ __('Keahlian') }}" />
                <x-jet-input id="keahlian" class="block mt-1 w-full" type="text" name="keahlian" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
