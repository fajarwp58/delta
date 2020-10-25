<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Hewan;
<<<<<<< HEAD
use App\JenisHewan;
use App\Layanan;
use App\Message;
use App\User;
use App\RiwayatPemeriksaan;
use Illuminate\Support\Facades\DB;
=======
use App\Layanan;
use App\Message;
use App\User;
use App\Transaksi;
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
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

<<<<<<< HEAD
        $pendapatan = RiwayatPemeriksaan::where('clinical_sign', 'LIKE', "$tanggal%")->sum('total_harga');
=======
        $pendapatan = Transaksi::where('waktu', 'LIKE', "$tanggal%")->sum('total_harga');
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02

        $data_pendapatan[] = (int) $pendapatan;

        $tanggal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal)));
      }
      //dd($pendapatan);

        $data = User::all();
        $user = $data->count();
        $layanan = Layanan::all()->count();
        $totalbookinghariini = Booking::whereDate('tanggal_booking', Carbon::today())->count();

<<<<<<< HEAD
        $totaltransaksihariini = RiwayatPemeriksaan::whereDate('clinical_sign', Carbon::today())->sum('total_harga');
=======
        $totaltransaksihariini = Transaksi::whereDate('waktu', Carbon::today())->sum('total_harga');
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
        $totalchat = Message::where('to',Auth::user()->user_id)->where('read',0)->count();
        $hewan_saya = Hewan::where('user_id',Auth::user()->user_id)->count();
        $hewan = Hewan::all()->count();

<<<<<<< HEAD
        $now = Carbon::now()->year;
        $kucing = DB::table('transaksi_pemeriksaan AS a')
        ->join('hewan AS b', 'a.kode_hewan', '=', 'b.kode')
        ->where('b.jenis_hewan_id', '=', 'JH001')
        ->count();
        $anjing = DB::table('transaksi_pemeriksaan AS a')
        ->join('hewan AS b', 'a.kode_hewan', '=', 'b.kode')
        ->where('b.jenis_hewan_id', '=', 'JH002')
        ->count();
        $oranghutan = DB::table('transaksi_pemeriksaan AS a')
        ->join('hewan AS b', 'a.kode_hewan', '=', 'b.kode')
        ->where('b.jenis_hewan_id', '=', 'JH003')
        ->count();
        $kelinci = DB::table('transaksi_pemeriksaan AS a')
        ->join('hewan AS b', 'a.kode_hewan', '=', 'b.kode')
        ->where('b.jenis_hewan_id', '=', 'JH004')
        ->count();

=======
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
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
<<<<<<< HEAD
            'kucing'=>$kucing,
            'anjing'=>$anjing,
            'oranghutan'=>$oranghutan,
            'kelinci'=>$kelinci,
            'now'=>$now,
=======
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
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
<<<<<<< HEAD

=======
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
}
