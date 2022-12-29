<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hewan;
use Illuminate\Support\Facades\DB;

class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.transaksis
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = DB::table('transaksis')
            ->get();
        return view('admin.transaksis.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = Transaksi::find($request->id_transaksi);
        $transaksi->status_transaksi = 2;
        $transaksi->save();

        $hewan = Hewan::find($request->id_hewan);
        $hewan->id_pengadas = $request->id;
        $hewan->status_hewan = 2;
        $hewan->save();

        return redirect()->route('admin.transaksis.index')
            ->with('success', 'Pengadas berhasil ditambahkan.');
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
        $users = DB::table('users')
            ->where('role_id', '=', 3)
            ->get();
        $model = Transaksi::find($id);
        $hewans = Hewan::find($model->id_hewan);
        return view(
            'admin.transaksis.create',
            compact(
                'model',
                'users',
                'hewans'
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

        $transnya = Transaksi::find($id);
        $transnya->status_transaksi = 1;
        $transnya->save();
        return redirect()->route('admin.transaksis.index')
            ->with('success', 'Transaksi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
