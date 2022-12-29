<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hewan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\File;

class RegisterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Hewan();
        return view(
            'admin.hewans.create',
            compact(
                'model'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new User;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->password = Hash::make($request->password);
        $model->tgl_lahir = $request->tgl_lahir;
        $model->alamat = $request->alamat;
        $model->no_telp = $request->no_telp;
        $model->nama_ibu_kandung = $request->nama_ibu_kandung;
        $model->bank = $request->bank;
        $model->no_rekening = $request->no_rekening;
        $model->sts_tempat_tinggal = $request->sts_tempat_tinggal;
        $model->role_id = $request->role_id;
        $model->pendapatan = $request->pendapatan ?? null;
        $model->keahlian = $request->keahlian ?? null;
        $model->alamat_tanah = $request->alamat_tanah ?? null;
        if ($request->file('foto_ktp')) {
            $file = $request->file('foto_ktp');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('photo_ktp', $nama_file);
            $model->foto_ktp = $nama_file;
        }
        if ($request->file('foto_npwp')) {
            $file = $request->file('foto_npwp');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('photo_npwp', $nama_file);
            $model->foto_npwp = $nama_file;
        }

        $model->save();

        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Hewan::find($id);
        return view(
            'admin.hewans.edit',
            compact(
                'model'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $model = Hewan::find($id);
        $model->nama_hewan = $request->nama_hewan;
        $model->jenis_hewan = $request->jenis_hewan;
        $model->harga_hewan = $request->harga_hewan;
        $model->modal_hewan = $request->modal_hewan;
        $model->kontrak_hewan = $request->kontrak_hewan;
        $model->target_berat_hewan = $request->target_berat_hewan;
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('photo_hewan', $nama_file);
            $model->gambar = $nama_file;
        }

        $model->save();

        return redirect()->route('admin.hewans.index')
            ->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Hewan::find($id);
        $model->delete();
        return redirect()->route('admin.hewans.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
