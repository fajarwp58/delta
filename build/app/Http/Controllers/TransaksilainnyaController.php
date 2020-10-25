<?php

namespace App\Http\Controllers;

use App\Hewan;
use App\RiwayatPemeriksaan;
use App\TransaksiLainnya;
use App\TransaksiLayanan;
use App\TransaksiObat;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

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

    public function download()
    {
        $awal = date('Y-m-d', mktime(0,0,0, date('m'), 1, date('Y')));
        $akhir = date('Y-m-d');
        return view('downloadlaporan', compact('awal', 'akhir'));
    }

    protected function getData($awal, $akhir){
        $no = 0;
        $data = array();
        $pendapatan = 0;
        $total_pendapatan = 0;
        while(strtotime($awal) <= strtotime($akhir)){
          $tanggal = $awal;
          $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

          $pendapatan = RiwayatPemeriksaan::where('clinical_sign', 'LIKE', "$tanggal%")->sum('total_harga');

          //$pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
          $total_pendapatan += $pendapatan;

          $no ++;
          $row = array();
          $row[] = $no;
          $row[] = tanggal_indonesia($tanggal, false);
          $row[] = format_uang($pendapatan);
          $data[] = $row;
        }
        $data[] = array("", "Total Pendapatan", format_uang($total_pendapatan));

        return $data;
      }

    public function listData($awal, $akhir)
    {
        $data = $this->getData($awal, $akhir);

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function refresh(Request $request)
    {
        $awal = $request['awal'];
        $akhir = $request['akhir'];
        return view('downloadlaporan', compact('awal', 'akhir'));
    }

    public function exportPDF($awal, $akhir){
        $tanggal_awal = $awal;
        $tanggal_akhir = $akhir;
        $data = $this->getData($awal, $akhir);

        $pdf = PDF::loadView('laporanpdf', compact('tanggal_awal', 'tanggal_akhir', 'data'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream();
    }

    public function data()
    {
        $transaksi = RiwayatPemeriksaan::with(['users','hewan','obat','layanan'])->orderBY('clinical_sign','DESC')->get();
        return DataTables::of($transaksi)
        ->editColumn('total_harga', function ($transaksi) {
            return 'Rp. '.format_uang($transaksi->total_harga);
        })
        ->toJson();
    }

    public function dataHistory()
    {
        $transaksi = DB::table('transaksi_pemeriksaan')
        ->join('hewan','hewan.kode','=','transaksi_pemeriksaan.kode_hewan')
        ->join('users','users.user_id','=','hewan.user_id')
        ->where('users.user_id','=',Auth()->user()->user_id)
        ->orderBy('clinical_sign','desc')
        ->get();
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
      RiwayatPemeriksaan::where('transaksi_pemeriksaan_id', $id)->delete();

    }

    public function create(Request $request)
    {
        $transaksilainnya = new TransaksiLainnya;
        $transaksilainnya->kode_lainnya = $request->kode_lainnya;
        $transaksilainnya->kode_transaksi = $request->kode_transaksi;
        $transaksilainnya->nama = $request->nama;
        $transaksilainnya->harga = $request->harga;

        $transaksilainnya->save();

        $transaksi = RiwayatPemeriksaan::where('transaksi_pemeriksaan_id',$request->kode_transaksi)->first();
        $transaksi->total_harga = $transaksi->total_harga + $request->harga;

        $transaksi->update();

        return redirect('transaksilainnya')->with(['success' => 'Berhasil menyimpan layanan tambahan']);
    }

    public function cetak($id)
    {
        $transaksi = RiwayatPemeriksaan::with('users','hewan','obat','layanan')->where('transaksi_pemeriksaan_id',$id)->first();
        $pemilik = DB::table('transaksi_pemeriksaan')
        ->join('hewan','hewan.kode','=','transaksi_pemeriksaan.kode_hewan')
        ->join('users','users.user_id','=','hewan.user_id')
        ->where('transaksi_pemeriksaan_id','=',$transaksi->transaksi_pemeriksaan_id)
        ->get();
        $layanan = DB::table('transaksi_layanan')
        ->join('layanan','layanan.kode_layanan','=','transaksi_layanan.kode_layanan')
        ->where('transaksi_layanan.kode_transaksi','=',$transaksi->transaksi_pemeriksaan_id)
        ->get();
        $obat = DB::table('transaksi_obat')
        ->join('obat','obat.kode_obat','=','transaksi_obat.kode_obat')
        ->where('transaksi_obat.kode_transaksi','=',$transaksi->transaksi_pemeriksaan_id)
        ->get();
        $lainlain = DB::table('transaksi_lainnya')
        ->join('transaksi_pemeriksaan','transaksi_pemeriksaan.transaksi_pemeriksaan_id','=','transaksi_lainnya.kode_transaksi')
        ->where('transaksi_lainnya.kode_transaksi','=',$transaksi->transaksi_pemeriksaan_id)
        ->get();
        $tgltransaksi = Carbon::parse($transaksi->clinical_sign)->format('d/m/Y');
        //dd($pemilik);

        return view('cetakTransaksi', compact('transaksi','pemilik','layanan','obat','lainlain','tgltransaksi'));
    }

}
