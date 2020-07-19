<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\TransaksiLainnya;
use App\TransaksiLayanan;
use App\TransaksiObat;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class TransaksilainnyaController extends Controller
{
    public function index()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000, 9999)
            . $characters[rand(0, strlen($characters) - 1)];
        $AWAL = 'TLAIN';

        $idmodal = $AWAL .'-'.str_shuffle($pin);
        return view('transaksilainnya',['idmodal'=>$idmodal]);
    }

    public function data()
    {
        $transaksi = Transaksi::with(['users','hewan','obat','layanan'])->orderBY('waktu','DESC')->get();
        return DataTables::of($transaksi)
        ->editColumn('total_harga', function ($transaksi) {
            return 'Rp. '.format_uang($transaksi->total_harga);
        })
        ->toJson();
    }

    public function delete($id)
    {

      TransaksiObat::where('kode_transaksi', $id)->delete();
      TransaksiLainnya::where('kode_transaksi', $id)->delete();
      TransaksiLayanan::where('kode_transaksi', $id)->delete();
      Transaksi::where('kode_transaksi', $id)->delete();

    }

}
