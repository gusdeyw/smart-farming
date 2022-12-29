<?php

namespace App\Http\Controllers\Pemodals;

use App\Models\Hewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rekening;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class PemodalItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hewans = DB::table('hewans')
            ->where('status_hewan', '=', 0)
            ->get();
        return view('pemodal.items.index', compact('hewans'));
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
        $model = new Transaksi;
        $model->tgl_transaksi = $request->tgl_transaksi;
        $model->jumlah_bayar = $request->jumlah_bayar;
        $model->nama_bank = $request->nama_bank;
        $model->nama_rekening = $request->nama_rekening;
        $model->nomor_bank = $request->nomor_bank;
        $model->id_pemodal = auth()->user()->id;
        $model->id_hewan = $request->id_hewan;
        if ($request->file('bukti_transaksi')) {
            $file = $request->file('bukti_transaksi');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('bukti_transaksi', $nama_file);
            $model->bukti_transaksi = $nama_file;
        }

        $model->save();

        $modelhewan = Hewan::find($request->id_hewan);
        $modelhewan->status_hewan = 1;
        $modelhewan->id_pemodal = auth()->user()->id;
        $modelhewan->save();

        return redirect()->route('pemodal.hewans.index')
            ->with('success', 'Hewan berhasil dimodalkan, Menunggu konfirmasi admin.');
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
        //
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
        $rek = Rekening::all();
        // $user->update($request->all());
        // if ($hewannya->status == 1) {
        //     $hewannya->status = 0;
        // } else {
        //     $hewannya->status = 1;
        // }
        // $hewannya->save();
        return view(
            'pemodal.items.create',
            compact(
                'model',
                'rek'
            )
        );
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
