<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Hewan;
use App\User;
use App\Transaksi;
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
}
