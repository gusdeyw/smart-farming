<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hewan;
use App\Models\Group_hewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\File;

class AdminGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hewans = DB::table('group_hewans')
            ->select('*')
            ->get();
        return view('admin.groups.index', compact('hewans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Group_hewan();
        return view(
            'admin.groups.create',
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
        $model = new Group_hewan;
        $model->nama_group = $request->nama_hewan;
        $model->jenis_group = $request->jenis_hewan;
        $model->harga_group = $request->harga_hewan;
        $model->modal_group = $request->modal_hewan;
        $model->kontrak_group = $request->kontrak_hewan;
        $model->banyak_sapi = $request->banyak_hewan;
        $model->target_berat_group = $request->target_berat_hewan;
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('photo_hewan_group', $nama_file);
            $model->gambar_group = $nama_file;
        }

        $model->save();

        return redirect()->route('admin.groups.index')
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
        $model = Group_hewan::find($id);
        return view(
            'admin.groups.edit',
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

        $model = Group_hewan::find($id);
        $model->nama_group = $request->nama_hewan;
        $model->jenis_group = $request->jenis_hewan;
        $model->harga_group = $request->harga_hewan;
        $model->modal_group = $request->modal_hewan;
        $model->kontrak_group = $request->kontrak_hewan;
        $model->banyak_sapi = $request->banyak_hewan;
        $model->target_berat_group = $request->target_berat_hewan;
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('photo_hewan_group', $nama_file);
            $model->gambar_group = $nama_file;
        }

        $model->save();

        return redirect()->route('admin.groups.index')
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
        $model = Group_hewan::find($id);
        $model->delete();
        return redirect()->route('admin.groups.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function detail($id)
    {
        $model = Group_hewan::find($id);
        ddd($model);
        // $model->delete();
        // return view('admin.groups.index', compact('hewans'));
    }
}