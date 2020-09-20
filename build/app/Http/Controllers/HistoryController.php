<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transaksi;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('transaksi')
        ->join('hewan','hewan.kode','=','transaksi.kode_hewan')
        ->join('users','users.user_id','=','hewan.user_id')
        ->where('users.user_id','=',Auth()->user()->user_id)
        ->orderBy('waktu','desc')
        ->get();
        //dd($transaksi);

        return view('historytransaksi', compact('transaksi'));
    }
}
