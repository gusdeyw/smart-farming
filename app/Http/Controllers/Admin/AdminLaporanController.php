<?php

namespace App\Http\Controllers\Admin;

use App\Models\Uang;
use App\Models\Hewan;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\File;

class AdminLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporans = DB::table('laporans')
            ->get();
        $uangs = DB::table('uangs')->latest()
            ->first();
        return view('admin.laporans.index', compact('laporans', 'uangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.laporans.create'
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
        $model = new Laporan;
        $model->jenis = $request->jenis;
        $model->keterangan = $request->keterangan;
        $model->jumlah = $request->jumlah;
        $model->save();

        $uangs = DB::table('uangs')
            ->latest()
            ->first();

        $money = new Uang;
        if ($request->jenis == "Cash Masuk") {
            $money->uang = $uangs->uang + $request->jumlah;
        } else if ($request->jenis == "Cash Keluar") {
            $money->uang = $uangs->uang - $request->jumlah;
        }

        $money->save();

        return redirect()->route('admin.laporans.index')
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
