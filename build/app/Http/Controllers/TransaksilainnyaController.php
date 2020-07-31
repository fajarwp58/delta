<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\TransaksiLainnya;
use App\TransaksiLayanan;
use App\TransaksiObat;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function create(Request $request)
    {
        $transaksilainnya = new TransaksiLainnya;
        $transaksilainnya->kode_lainnya = $request->kode_lainnya;
        $transaksilainnya->kode_transaksi = $request->kode_transaksi;
        $transaksilainnya->nama = $request->nama;
        $transaksilainnya->harga = $request->harga;

        $transaksilainnya->save();

        $transaksi = Transaksi::where('kode_transaksi',$request->kode_transaksi)->first();
        $transaksi->total_harga = $transaksi->total_harga + $request->harga;

        $transaksi->update();

        return redirect('transaksilainnya')->with(['success' => 'Berhasil menyimpan layanan tambahan']);
    }

    public function cetak($id)
    {
        $transaksi = Transaksi::with('users','hewan','obat','layanan','transaksi_lainnya')->where('kode_transaksi',$id)->first();
        $pemilik = DB::table('transaksi')
        ->join('hewan','hewan.kode','=','transaksi.kode_hewan')
        ->join('users','users.user_id','=','hewan.user_id')
        ->where('kode_transaksi','=',$transaksi->kode_transaksi)
        ->get();
        $layanan = DB::table('transaksi_layanan')
        ->join('layanan','layanan.kode_layanan','=','transaksi_layanan.kode_layanan')
        ->where('transaksi_layanan.kode_transaksi','=',$transaksi->kode_transaksi)
        ->get();
        $obat = DB::table('transaksi_obat')
        ->join('obat','obat.kode_obat','=','transaksi_obat.kode_obat')
        ->where('transaksi_obat.kode_transaksi','=',$transaksi->kode_transaksi)
        ->get();
        $lainlain = DB::table('transaksi_lainnya')
        ->join('transaksi','transaksi.kode_transaksi','=','transaksi_lainnya.kode_transaksi')
        ->where('transaksi_lainnya.kode_transaksi','=',$transaksi->kode_transaksi)
        ->get();
        $tgltransaksi = Carbon::parse($transaksi->waktu)->format('d/m/Y');
        //dd($pemilik);

        return view('cetakTransaksi', compact('transaksi','pemilik','layanan','obat','lainlain','tgltransaksi'));
    }

}
