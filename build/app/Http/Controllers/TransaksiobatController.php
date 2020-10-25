<?php

namespace App\Http\Controllers;

use App\Obat;
use App\RiwayatPemeriksaan;
use App\TransaksiObat;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class TransaksiobatController extends Controller
{
    public function index(){
        $transaksi = RiwayatPemeriksaan::orderBY('clinical_sign','DESC')->first();
        return view('dokterobat', compact('transaksi'));
    }

    public function dataObat()
    {
        $obat = Obat::all();
        return DataTables::of($obat)
        ->editColumn('harga', function ($obat) {
            return 'Rp. '.format_uang($obat->harga);
        })
        ->toJson();
    }

    public function dataKeranjang()
    {
        $transaksi = RiwayatPemeriksaan::orderBY('clinical_sign','DESC')->first();
        $obatKeranjang = TransaksiObat::with('obat')
        ->where('kode_transaksi',$transaksi->transaksi_pemeriksaan_id)->get();

        return DataTables::of($obatKeranjang)->toJson();
    }

    public function store(Request $request)
    {
        //$produk = Produk::where('kode_produk', '=', $request['kode'])->first();
        foreach($request['kode_obat'] as $kode_obat){
            $detail = new TransaksiObat;
        $detail->kode_transaksi = $request->kode_transaksi;
        $detail->kode_obat = $kode_obat;
        $detail->save();
        }

        return redirect('dokterobat');
    }

    public function update(Request $request){
        $transaksiobat = RiwayatPemeriksaan::where('transaksi_pemeriksaan_id',$request->kodetransaksi)->first();
        $transaksiobat->total_harga = $request->total + $request->totallayanan;
        $transaksiobat->update();

        // foreach($request['cara_pakai'] as $cara_pakai){
        //     $transaksi = TransaksiObat::where('kode_transaksi',$request->kodetransaksi)->first();
        //     $transaksi->cara_pakai = $cara_pakai;
        //     $transaksi->update();
        // }


        return redirect('transaksilainnya')->with(['success' => 'Transaksi berhasil di simpan']);
    }

    public function carapakai(Request $request, $id){
        $transaksi = TransaksiObat::where('kode_obat',$request->kodeobat)->first();
        $transaksi->cara_pakai = $request->cara_pakai;
        $transaksi->update();
    }

    public function delete($id)
    {

      TransaksiObat::where('kode_obat', $id)->delete();

    }
}
