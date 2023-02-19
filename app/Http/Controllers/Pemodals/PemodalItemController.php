<?php

namespace App\Http\Controllers\Pemodals;

use App\Models\Hewan;
use App\Models\Group_hewan;
use App\Models\Pembagian;
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
        $hewans = DB::table('group_hewans')
            ->where('status_group', '=', 0)
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
        // $model->id_hewan = $request->id_hewan;
        $model->id_group = $request->id_group;
        if ($request->file('bukti_transaksi')) {
            $file = $request->file('bukti_transaksi');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('bukti_transaksi', $nama_file);
            $model->bukti_transaksi = $nama_file;
        }
        $model->save();
        $jumlah_setor = 0;
        $persentase = 0;
        $grup = 0;
        $mod = Group_hewan::find($request->id_group);
        $modalGroup = $mod->modal_group;
        $getter = DB::table('pembagians')
            ->selectRaw('COUNT(*) as count')
            ->where('id_group', '=', $request->id_group)
            ->get();
        $getGroup = $getter[0]->count;
        if ($getGroup == 0) {
            $jumlah_setor = $request->jumlah_bayar;
            $count1 = $request->jumlah_bayar / $modalGroup;
            $count2 = $count1 * 100;
            $persentase = number_format($count2, 0);
            $grup = 1;
        } else {
            $getTotal = DB::table('pembagians')
                ->selectRaw('sum(jumlah_setor) as count')
                ->where('id_group', '=', $request->id_group)
                ->get();
            $getLastGroup = DB::table('pembagians')
                ->select("grup")
                ->where('id_group', '=', $request->id_group)
                ->orderByDesc("grup")
                ->limit(1)
                ->get();
            $jumlah_perlu = ($getLastGroup[0]->grup * $modalGroup) - $getTotal[0]->count;
            if ($jumlah_perlu == 0) {
                $jumlah_setor = $request->jumlah_bayar;
                $count1 = $request->jumlah_bayar / $modalGroup;
                $count2 = $count1 * 100;
                $persentase = number_format($count2, 0);
                $grup = $getLastGroup[0]->grup + 1;
            } else if ($jumlah_perlu >= $request->jumlah_bayar) {
                $jumlah_setor = $request->jumlah_bayar;
                $count1 = $request->jumlah_bayar / $modalGroup;
                $count2 = $count1 * 100;
                $persentase = number_format($count2, 0);
                $grup = $getLastGroup[0]->grup;
            } else if ($jumlah_perlu < $request->jumlah_bayar) {
                $has = $request->jumlah_bayar - $jumlah_perlu;
                $jumlah_setor = $request->jumlah_bayar - $has;
                $count1 = $jumlah_setor / $modalGroup;
                $count2 = $count1 * 100;
                $persentase = number_format($count2, 0);
                $grup = $getLastGroup[0]->grup;

                $jumlah_setor1 = $has;
                $count11 = $has / $modalGroup;
                $count21 = $count11 * 100;
                $persentase1 = number_format($count21, 0);
                $grup1 = $getLastGroup[0]->grup + 1;
                $modelpembagian1 = new Pembagian;
                $modelpembagian1->jumlah_setor = $jumlah_setor1;
                $modelpembagian1->persentase = $persentase1;
                $modelpembagian1->grup = $grup1;
                $modelpembagian1->id_pemodal = auth()->user()->id;
                $modelpembagian1->id_group = $request->id_group;
                $modelpembagian1->save();
            }
        }

        $modelpembagian = new Pembagian;
        $modelpembagian->jumlah_setor = $jumlah_setor;
        $modelpembagian->persentase = $persentase;
        $modelpembagian->grup = $grup;
        $modelpembagian->id_pemodal = auth()->user()->id;
        $modelpembagian->id_group = $request->id_group;
        $modelpembagian->save();

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

        $model = Group_hewan::find($id);
        $pemodals = DB::table('pembagians')
            ->select('pembagians.*', 'pa.name as nama_pemodal')
            ->join('users as pa', 'pa.id', '=', 'pembagians.id_pemodal')
            ->where('id_group', '=', $id)
            ->get();
        $totalDanaTerkumpul = 0;
        foreach ($pemodals as $key => $val) {
            $totalDanaTerkumpul = $totalDanaTerkumpul + $val->jumlah_setor;
        }
        $pemodals1 = DB::table('pembagians')
            ->where('id_group', '=', $id)
            ->orderByDesc('grup')
            ->limit(1)
            ->get();
        if (count($pemodals1) != 0) {
            $grupNow = $pemodals1[0]->grup;
            if (($grupNow * $model->modal_group) - $totalDanaTerkumpul != 0) {
                $grupNow = $grupNow - 1;
            }
        } else {
            $grupNow = 0;
        }

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
                'rek',
                'totalDanaTerkumpul',
                'grupNow',
                'pemodals',
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