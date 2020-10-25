<?php

namespace App\Http\Controllers;

use App\Layanan;
<<<<<<< HEAD
use App\Penyakit;
use App\RiwayatPemeriksaan;
use App\TransaksiLayanan;
=======
use App\TransaksiLayanan;
use App\Transaksi;
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;


class TransaksilayananController extends Controller
{
    public function index(){
<<<<<<< HEAD
        $transaksi = RiwayatPemeriksaan::orderBY('clinical_sign','DESC')->first();
=======
        $transaksi = Transaksi::orderBY('waktu','DESC')->first();
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
        return view('dokterlayanan', compact('transaksi'));
    }

    public function dataLayanan()
    {
<<<<<<< HEAD
        $layanan = Layanan::with('Penyakit')->get();
=======
        $layanan = Layanan::all();
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
        return DataTables::of($layanan)
        ->editColumn('harga', function ($layanan) {
            return 'Rp. '.format_uang($layanan->harga);
        })
        ->toJson();
    }

    public function dataKeranjang()
    {
<<<<<<< HEAD
        $transaksi = RiwayatPemeriksaan::orderBY('clinical_sign','DESC')->first();
        $layananKeranjang = TransaksiLayanan::with('layanan')
        ->where('kode_transaksi',$transaksi->transaksi_pemeriksaan_id)->get();
=======
        $transaksi = Transaksi::orderBY('waktu','DESC')->first();
        $layananKeranjang = TransaksiLayanan::with('layanan')
        ->where('kode_transaksi',$transaksi->kode_transaksi)->get();
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02

        return DataTables::of($layananKeranjang)->toJson();
    }

    public function store(Request $request)
    {
        //$produk = Produk::where('kode_produk', '=', $request['kode'])->first();
        foreach($request['kode_layanan'] as $kode_layanan){
            $detail = new TransaksiLayanan;
            $detail->kode_transaksi = $request->kode_transaksi;
            $detail->kode_layanan = $kode_layanan;
            $detail->save();
        }

        return redirect('dokterlayanan');
    }

    public function update(Request $request){
<<<<<<< HEAD
        $transaksilayanan = RiwayatPemeriksaan::where('transaksi_pemeriksaan_id',$request->kodetransaksi)->first();
=======
        $transaksilayanan = Transaksi::where('kode_transaksi',$request->kodetransaksi)->first();
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
        $transaksilayanan->total_harga = $request->total;
        $transaksilayanan->update();

        return redirect('dokterobat')->with(['success' => 'Layanan berhasil di simpan']);
    }

    public function delete($id)
    {

      TransaksiLayanan::where('kode_layanan', $id)->delete();

    }

}
