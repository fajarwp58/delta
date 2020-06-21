<?php

namespace App\Http\Controllers;

use App\Layanan;
use App\TransaksiLayanan;
use App\TransaksiObat;
use App\Transaksi;
use App\Obat;
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

    public function listobat(){
        $obat = Obat::all();
        return json_encode($obat);
    }

    public function create(Request $request){
        $size = count(collect($request)->get('kode_layanan'));
        $size2 = count(collect($request)->get('kode_obat'));
        //dd($size);

        for ($i = 0; $i < $size; $i++) {
            $transaksilayanan = new TransaksiLayanan;
            $transaksilayanan->kode_transaksi = $request->kode_transaksi;
            $transaksilayanan->kode_layanan = $request->kode_layanan[$i];

            $transaksilayanan->save();
        }

        for ($u = 0; $u < $size2; $u++) {
            $transaksiobat = new TransaksiObat;
            $transaksiobat->kode_transaksi = $request->kode_transaksi;
            $transaksiobat->kode_obat = $request->kode_obat[$u];

            $transaksiobat->save();
        }

        return redirect('transaksilainnya')->with(['success' => 'Layanan berhasil di simpan']);
    }
}
