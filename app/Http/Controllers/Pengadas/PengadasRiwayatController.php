<?php

namespace App\Http\Controllers\Pengadas;

use App\Models\Hewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Riwayat_hewan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\File;

class PengadasRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hewans = DB::table('riwayat_hewans')
            ->where('id_pengadas', '=', auth()->user()->id)
            ->get();
        return view('pengadas.riwayats.index', compact('hewans'));
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
        $model = new Riwayat_hewan;
        $model->tgl_riwayat = $request->tgl_riwayat;
        $model->kondisi_hewan = $request->kondisi_hewan;
        $model->status_jual = $request->status_jual;
        $model->berat_hewat = $request->berat_hewan;
        $model->id_pemodal = $request->id_pemodal;
        $model->id_hewan = $request->id_hewan;
        $model->id_pengadas = $request->id_pengadas;
        if ($request->file('foto_kondisi')) {
            $file = $request->file('foto_kondisi');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('update_photo_hewan', $nama_file);
            $model->foto_kondisi = $nama_file;
        }

        $model->save();

        return redirect()->route('pengadas.hewans.index')
            ->with('success', 'Data berhasil disimpan');
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
            'pengadas.hewans.create',
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
