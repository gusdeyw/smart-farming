<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'tgl_lahir' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'string', 'max:255'],
            'nama_ibu_kandung' => ['required', 'string', 'max:255'],
            'bank' => ['required', 'string', 'max:255'],
            'no_rekening' => ['required', 'string', 'max:255'],
            'sts_tempat_tinggal' => ['required', 'string', 'max:255'],
            'foto_ktp' => ['required', 'string', 'max:255'],
            'foto_npwp' => ['required', 'string', 'max:255'],
            'pendapatan' => ['required', 'string', 'max:255'],
            'alamat_tanah' => ['required', 'string', 'max:255'],
            'keahlian' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'tgl_lahir' => $input['tgl_lahir'],
            'alamat' => $input['alamat'],
            'no_telp' => $input['no_telp'],
            'nama_ibu_kandung' => $input['nama_ibu_kandung'],
            'bank' => $input['bank'],
            'no_rekening' => $input['no_rekening'],
            'sts_tempat_tinggal' => $input['sts_tempat_tinggal'],
            'foto_ktp' => $input['foto_ktp'],
            'foto_npwp' => $input['foto_npwp'],
            'pendapatan' => $input['pendapatan'],
            'alamat_tanah' => $input['alamat_tanah'],
            'keahlian' => $input['keahlian'],
            'role' => $input['role'],
        ]);
    }
}
