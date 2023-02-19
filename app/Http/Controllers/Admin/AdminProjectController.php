<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hewan;
use App\Models\Group_hewan;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\File;

class AdminProjectController extends Controller
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
        return view('admin.project.index', compact('hewans'));
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
        $grupNow = $pemodals1[0]->grup;
        if (($grupNow * $model->modal_group) - $totalDanaTerkumpul != 0) {
            $grupNow = $grupNow - 1;
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
            'admin.project.create',
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