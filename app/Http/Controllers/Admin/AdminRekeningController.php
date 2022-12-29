<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class AdminRekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekenings = DB::table('rekenings')
            ->get();
        return view('admin.rekenings.index', compact('rekenings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Rekening();
        return view(
            'admin.rekenings.create',
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
        $model = new Rekening;
        $model->nama_bank = $request->nama_bank;
        $model->nama_rekening = $request->nama_rekening;
        $model->no_rekening = $request->no_rekening;

        $model->save();

        return redirect()->route('admin.rekenings.index')
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
        $model = Rekening::find($id);
        return view(
            'admin.rekenings.edit',
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

        $model = Rekening::find($id);
        $model->nama_bank = $request->nama_bank;
        $model->nama_rekening = $request->nama_rekening;
        $model->no_rekening = $request->no_rekening;

        $model->save();

        return redirect()->route('admin.rekenings.index')
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
        $model = Rekening::find($id);
        $model->delete();
        return redirect()->route('admin.rekenings.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
