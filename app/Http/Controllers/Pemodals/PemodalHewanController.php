<?php

namespace App\Http\Controllers\Pemodals;

use App\Models\Hewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PemodalHewanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hewans = DB::table('hewans')
            ->select('*', 'po.name as nama_pengadas', 'hewans.id as IDhewan')
            ->join('users as po', 'po.id', '=', 'hewans.id_pengadas')
            ->where('hewans.id_pemodal', '=', auth()->user()->id)
            ->where('status_hewan', '>', 1)
            ->get();
        return view('pemodal.hewans.index', compact('hewans'));
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
        //
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

        $usernya = Hewan::find($id);
        // $user->update($request->all());
        if ($usernya->status == 1) {
            $usernya->status = 0;
        } else {
            $usernya->status = 1;
        }
        $usernya->save();
        return redirect()->route('admin.users.index')
            ->with('success', 'Hewan updated successfully');
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