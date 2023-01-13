<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\File;

class AdminHewanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hewans = DB::table('hewans')
            ->select('*', 'pa.name as nama_pemodal', 'po.name as nama_pengadas', 'hewans.id as IDhewan')
            ->join('users as pa', 'pa.id', '=', 'hewans.id_pemodal')
            ->join('users as po', 'po.id', '=', 'hewans.id_pengadas')
            ->get();
        return view('admin.hewans.index', compact('hewans'));
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
