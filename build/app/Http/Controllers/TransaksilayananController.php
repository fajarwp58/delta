<?php

namespace App\Http\Controllers;

use App\Layanan;
use App\TransaksiLayanan;
use App\Transaksi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;


class TransaksilayananController extends Controller
{
    public function index(){
        $transaksi = Transaksi::orderBY('waktu','DESC')->first();
        return view('dokterlayanan', compact('transaksi'));
    }

    public function dataLayanan()
    {
        $layanan = Layanan::all();
        return DataTables::of($layanan)
        ->editColumn('harga', function ($layanan) {
            return 'Rp. '.format_uang($layanan->harga);
        })
        ->toJson();
    }

    public function dataKeranjang()
    {
        $transaksi = Transaksi::orderBY('waktu','DESC')->first();
        $layananKeranjang = TransaksiLayanan::with('layanan')
        ->where('kode_transaksi',$transaksi->kode_transaksi)->get();

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
        $transaksilayanan = Transaksi::where('kode_transaksi',$request->kodetransaksi)->first();
        $transaksilayanan->total_harga = $request->total;
        $transaksilayanan->update();

        return redirect('dokterobat')->with(['success' => 'Layanan berhasil di simpan']);
    }

    public function delete($id)
    {

      TransaksiLayanan::where('kode_layanan', $id)->delete();

    }

}
