<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hewan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->id == 2) {
            $hewans = DB::table('hewans')
                ->get();
            $jumlahberjalan = DB::table('hewans')
                ->where('status_hewan', '=', 2)
                ->where('id_pemodal', '=', 2)
                ->get();
            $jumlahbelumberjalan = DB::table('hewans')
                ->where('status_hewan', '=', 0)
                ->where('id_pemodal', '=', 2)
                ->get();
            $jumlahmeninggal = DB::table('hewans')
                ->where('status_hewan', '=', 5)
                ->where('id_pemodal', '=', 2)
                ->get();
            $pemodals = DB::table('users')
                ->where('role_id', '=', 3)
                ->get();
            $pengadas = DB::table('users')
                ->where('role_id', '=', 2)
                ->get();
            $jumahpenjualan = DB::table('laporans')
                ->where('id_pemodal', '!=', null)
                ->get();
            $jum = 0;
            $keuntungan = 0;
            foreach ($jumahpenjualan as $key => $val) {
                $jum = $jum + $val->jumlah;
                $keuntungan = $keuntungan + $jum;
            }
            $jumlahhewans = count($hewans);
            $jumlahpengadas = count($pemodals);
            $jumlahpemodal = count($pengadas);
            $jumlahberjalans = count($jumlahberjalan);
            $jumlahbelumberjalans = count($jumlahbelumberjalan);
            $jumlahmeninggals = count($jumlahmeninggal);
        } else if (auth()->user()->id == 3) {
            $hewans = DB::table('hewans')
                ->get();
            $jumlahberjalan = DB::table('hewans')
                ->where('status_hewan', '=', 2)
                ->where('id_pemodal', '=', 3)
                ->get();
            $jumlahbelumberjalan = DB::table('hewans')
                ->where('status_hewan', '=', 0)
                ->where('id_pemodal', '=', 3)
                ->get();
            $jumlahmeninggal = DB::table('hewans')
                ->where('status_hewan', '=', 5)
                ->where('id_pemodal', '=', 3)
                ->get();
            $pemodals = DB::table('users')
                ->where('role_id', '=', 3)
                ->get();
            $pengadas = DB::table('users')
                ->where('role_id', '=', 2)
                ->get();
            $jumahpenjualan = DB::table('laporans')
                ->where('id_pemodal', '!=', null)
                ->get();
            $jum = 0;
            $keuntungan = 0;
            foreach ($jumahpenjualan as $key => $val) {
                $jum = $jum + $val->jumlah;
                $keuntungan = $keuntungan + $jum;
            }
            $jumlahhewans = count($hewans);
            $jumlahpengadas = count($pemodals);
            $jumlahpemodal = count($pengadas);
            $jumlahberjalans = count($jumlahberjalan);
            $jumlahbelumberjalans = count($jumlahbelumberjalan);
            $jumlahmeninggals = count($jumlahmeninggal);
        } else {
            $hewans = DB::table('hewans')
                ->get();
            $jumlahberjalan = DB::table('hewans')
                ->where('status_hewan', '=', 2)
                ->get();
            $jumlahbelumberjalan = DB::table('hewans')
                ->where('status_hewan', '=', 0)
                ->get();
            $jumlahmeninggal = DB::table('hewans')
                ->where('status_hewan', '=', 5)
                ->get();
            $pemodals = DB::table('users')
                ->where('role_id', '=', 3)
                ->get();
            $pengadas = DB::table('users')
                ->where('role_id', '=', 2)
                ->get();
            $jumahpenjualan = DB::table('laporans')
                ->where('id_pemodal', '!=', null)
                ->get();
            $jum = 0;
            $keuntungan = 0;
            foreach ($jumahpenjualan as $key => $val) {
                $jum = $jum + $val->jumlah;
                $keuntungan = $keuntungan + ($val->jumlah * 10 / 100);
            }
            $jumlahhewans = count($hewans);
            $jumlahpengadas = count($pemodals);
            $jumlahpemodal = count($pengadas);
            $jumlahberjalans = count($jumlahberjalan);
            $jumlahbelumberjalans = count($jumlahbelumberjalan);
            $jumlahmeninggals = count($jumlahmeninggal);
        }

        return view('dashboard', compact('jumlahhewans', 'jumlahpengadas', 'jumlahpemodal', 'jumlahberjalans', 'jumlahbelumberjalans', 'jumlahmeninggals', 'jum', 'keuntungan'));
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
        $model = new Hewan;
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