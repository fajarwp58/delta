<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Hewan;
use App\User;
use App\Transaksi;
use App\TransaksiLayanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = User::all();
        $user = $data->count();

        $totalbookinghariini = Booking::whereDate('tanggal_booking', Carbon::today())->count();

        $totaltransaksihariini = Transaksi::whereDate('waktu', Carbon::today())->sum('total_harga');

        $hewan = Hewan::all()->count();

        return view('home',[
            'user'=>$user,
            'totalbookinghariini'=>$totalbookinghariini,
            'totaltransaksihariini'=>$totaltransaksihariini,
            'hewan'=>$hewan
        ]);
    }

    public function alljenis(){
        $operasi = TransaksiLayanan::where('kode_layanan', 'LYN-9Y61')->count();
        $potong = TransaksiLayanan::where('kode_layanan', 'LYN-6Q51')->count();

        $jumlah_jenis = array(
            'potong'=>$operasi,
            'operasi'=>$potong,
        );
        return $jumlah_jenis;

    }
}
