<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class welcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hewans = DB::table('hewans')
            ->get();
        $jumlahberjalan = DB::table('hewans')
            ->where('status_hewan', '=', 2)
            ->get();
        $jumlahbelumberjalan = DB::table('hewans')
            ->where('status_hewan', '=', 0)
            ->get();
        $jumlahmeninggal = DB::table('hewans')
            ->where('status_hewan', '=', 5)
            ->get();
        $pemodals = DB::table('users')
            ->where('role_id', '=', 3)
            ->get();
        $pengadas = DB::table('users')
            ->where('role_id', '=', 2)
            ->get();
        $jumahpenjualan = DB::table('laporans')
            ->where('id_pemodal', '!=', null)
            ->get();
        $jum = 0;
        $keuntungan = 0;
        foreach ($jumahpenjualan as $key => $val) {
            $jum = $jum + $val->jumlah;
            $keuntungan = $keuntungan + ($val->jumlah * 10 / 100);
        }
        $jumlahhewans = count($hewans);
        $jumlahpengadas = count($pemodals);
        $jumlahpemodal = count($pengadas);
        $jumlahberjalans = count($jumlahberjalan);
        $jumlahbelumberjalans = count($jumlahbelumberjalan);
        $jumlahmeninggals = count($jumlahmeninggal);
        return view('welcome', compact('jumlahhewans', 'jumlahpengadas', 'jumlahpemodal', 'jumlahberjalans', 'jumlahbelumberjalans', 'jumlahmeninggals', 'jum', 'keuntungan'));
    }
}
