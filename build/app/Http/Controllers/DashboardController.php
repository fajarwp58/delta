<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Hewan;
use App\Layanan;
use App\Message;
use App\User;
use App\Transaksi;
use App\TransaksiLayanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
      $awal = date('Y-m-d', mktime(0,0,0, date('m'), 1, date('Y')));
      $akhir = date('Y-m-d');

      $tanggal = $awal;
      $data_tanggal = array();
      $data_pendapatan = array();

      while(strtotime($tanggal) <= strtotime($akhir)){
        $data_tanggal[] = (int)substr($tanggal,8,2);

        $pendapatan = Transaksi::where('waktu', 'LIKE', "$tanggal%")->sum('total_harga');

        $data_pendapatan[] = (int) $pendapatan;

        $tanggal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal)));
      }
      //dd($pendapatan);

        $data = User::all();
        $user = $data->count();
        $layanan = Layanan::all()->count();
        $totalbookinghariini = Booking::whereDate('tanggal_booking', Carbon::today())->count();

        $totaltransaksihariini = Transaksi::whereDate('waktu', Carbon::today())->sum('total_harga');
        $totalchat = Message::where('to',Auth::user()->user_id)->where('read',0)->count();
        $hewan_saya = Hewan::where('user_id',Auth::user()->user_id)->count();
        $hewan = Hewan::all()->count();

        return view('home',[
            'user'=>$user,
            'totalbookinghariini'=>$totalbookinghariini,
            'totaltransaksihariini'=>$totaltransaksihariini,
            'hewan'=>$hewan,
            'awal'=>$awal,
            'akhir'=>$akhir,
            'data_pendapatan'=>$data_pendapatan,
            'data_tanggal'=>$data_tanggal,
            'layanan'=>$layanan,
            'hewan_saya'=>$hewan_saya,
            'totalchat'=>$totalchat,
        ]);
    }

    // public function alljenis(){
    //     $operasi = TransaksiLayanan::where('kode_layanan', 'LYN-9Y61')->count();
    //     $potong = TransaksiLayanan::where('kode_layanan', 'LYN-6Q51')->count();

    //     $jumlah_jenis = array(
    //         'potong'=>$operasi,
    //         'operasi'=>$potong,
    //     );
    //     return $jumlah_jenis;

    // }
}
