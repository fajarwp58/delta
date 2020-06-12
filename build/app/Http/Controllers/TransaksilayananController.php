<?php

namespace App\Http\Controllers;

use App\Layanan;
use App\TransaksiLayanan;
use App\Transaksi;
use Illuminate\Http\Request;


class TransaksilayananController extends Controller
{
    public function index(){
        $transaksi = Transaksi::orderBY('waktu','DESC')->first();
        return view('dokterlayanan', compact('transaksi'));
    }

    public function listlayanan(){
        $layanan = Layanan::with('penyakit')->get();
        return json_encode($layanan);
    }

    public function create(Request $request){
        $size = count(collect($request)->get('kode_layanan'));
        dd($size);

        for ($i = 0; $i < $size; $i++) {
            $transaksilayanan = new TransaksiLayanan;
            $transaksilayanan->kode_transaksi = $request->kode_transaksi;
            $transaksilayanan->kode_layanan = $request->kode_layanan[$i];

            $transaksilayanan->save();
        }

        return redirect('rekammedis');
    }
}
