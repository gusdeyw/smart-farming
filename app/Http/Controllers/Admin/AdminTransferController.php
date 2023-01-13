<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hewan;
use App\Models\Laporan;
use App\Models\Uang;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminTransferController extends Controller
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
            ->where('status_hewan', '=', 3)
            ->get();
        return view('admin.transfers.index', compact('hewans'));
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
        $hewans = Hewan::find($request->id_hewan);
        $jumlahbersih = $request->jumlah - $hewans->modal_hewan;

        $pembagian = $jumlahbersih * 45 / 100;

        $totaltransfer = $pembagian + $pembagian;

        $uang1 = DB::table('uangs')
            ->latest()
            ->first();
        $money1 = new Uang;
        $money1->uang = $uang1->uang + $jumlahbersih;
        $money1->save();

        $model = new Laporan;
        $model->jenis = $request->jenis;
        $model->keterangan = $request->keterangan;
        $model->jumlah = $pembagian;
        $model->id_pemodal = $request->id_pemodal;
        if ($request->file('bukti_pemodal')) {
            $file1 = $request->file('bukti_pemodal');
            $nama_file1 = time() . str_replace(" ", "", $file1->getClientOriginalName());
            $file1->move('bukti_transfer_penjualan', $nama_file1);
            $model->bukti_transfer = $nama_file1;
        }
        $model->save();

        $model1 = new Laporan;
        $model1->jenis = $request->jenis;
        $model1->keterangan = $request->keterangan;
        $model1->jumlah = $pembagian;
        $model1->id_pengadas = $request->id_pengadas;
        if ($request->file('bukti_pengadas')) {
            $file = $request->file('bukti_pengadas');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('bukti_transfer_penjualan', $nama_file);
            $model1->bukti_transfer = $nama_file;
        }
        $model1->save();

        $uangs = DB::table('uangs')
            ->latest()
            ->first();
        $money = new Uang;
        $money->uang = $uangs->uang - $totaltransfer;
        $money->save();

        $hewans->status_hewan = 4;
        $hewans->save();

        return redirect()->route('admin.transfers.index')
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
        $hewans = Hewan::find($id);
        $pemodals = User::find($hewans->id_pemodal);
        $pengadas = User::find($hewans->id_pengadas);
        return view('admin.transfers.create', compact('hewans', 'pemodals', 'pengadas'));
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

        $usernya = User::find($id);
        // $user->update($request->all());
        if ($usernya->status == 1) {
            $usernya->status = 0;
        } else {
            $usernya->status = 1;
        }
        $usernya->save();
        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully');
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
