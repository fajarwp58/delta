<?php

namespace App\Http\Controllers;

use App\Obat;
use App\Transaksi;
use App\TransaksiObat;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class TransaksiobatController extends Controller
{
    public function index(){
        $transaksi = Transaksi::orderBY('waktu','DESC')->first();
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
        $transaksi = Transaksi::orderBY('waktu','DESC')->first();
        $obatKeranjang = TransaksiObat::with('obat')
        ->where('kode_transaksi',$transaksi->kode_transaksi)->get();

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
        $transaksiobat = Transaksi::where('kode_transaksi',$request->kodetransaksi)->first();
        $transaksiobat->total_harga = $request->total + $request->totallayanan;
        $transaksiobat->update();

        return redirect('transaksilainnya')->with(['success' => 'Transaksi berhasil di simpan']);
    }

    public function delete($id)
    {

      TransaksiObat::where('kode_obat', $id)->delete();

    }
}
