<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hewan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminPengadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->where('role_id', '=', 3)
            ->get();
        return view('admin.pengadas.index', compact('users'));
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
        $hewans = DB::table('hewans')
            ->where('id_pengadas', '=', $id)
            ->get();
        $jumlahhewan = count($hewans);
        $hewans = DB::table('riwayat_hewans')
            ->select('berat_hewat')
            ->where('id_pengadas', '=', $id)
            ->get();
        $a = array();
        foreach ($hewans as $key => $value) {
            array_push($a, number_format($value->berat_hewat));
        }
        $average = array_sum($a) / count($a);
        return view(
            'admin.pengadas.detail',
            compact(
                'jumlahhewan',
                'average'
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