<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Booking;
use App\Hewan;
use App\WaktuBooking;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $waktu_booking = WaktuBooking::where('status_waktu', 1)->orderBY('jam','ASC')->get();
        $total_wb = WaktuBooking::where('status_waktu', 1)->count();

        //dd($jam);
        return view('booking',compact('waktu_booking','total_wb'));
    }

    public function dataBooking(){
        $booking = Booking::all();
        $now = Carbon::parse()->format('Y-m-d');
        return view('databooking', compact('booking','now'));
    }

    public function databookingUser(){
        $booking = Booking::all();
        $now = Carbon::parse()->format('Y-m-d');
        return view('databookinguser', compact('booking','now'));
    }

    public function data()
    {
        $booking = DB::table('booking')
        ->join('waktu_booking','waktu_booking.waktu_booking_id','=','booking.waktu_booking_id')
        ->join('hewan','hewan.kode','=','booking.kode_hewan')
        ->join('users','users.user_id','=','hewan.user_id')
        ->get();
        return DataTables::of($booking)
        ->editColumn('status', function ($booking) {
            if($booking->status == 1)
                return 'Tidak Disetujui';

                else
                    return 'Disetujui';
                })
            ->toJson();
    }

    public function dataUser()
    {
        $booking = DB::table('booking')
        ->join('waktu_booking','waktu_booking.waktu_booking_id','=','booking.waktu_booking_id')
        ->join('hewan','hewan.kode','=','booking.kode_hewan')
        ->join('users','users.user_id','=','hewan.user_id')
        ->where('users.user_id','=',Auth::User()->user_id)
        ->get();
        return DataTables::of($booking)
        ->editColumn('status', function ($booking) {
            if($booking->status == 1)
                return 'Tidak Disetujui';

                else
                    return 'Disetujui';
                })
            ->toJson();
    }

    public function addbooking($id)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000, 9999)
            . $characters[rand(0, strlen($characters) - 1)];
        $AWAL = 'BKG';

        $idmodal = $AWAL .'-'.str_shuffle($pin);
        $waktu_booking = WaktuBooking::where('waktu_booking_id',$id)->first();
        $now = Carbon::parse()->format('Y-m-d');

        return view('addbooking', compact('idmodal','waktu_booking','now'));
    }

    public function listhewan(){
        $hewan = Hewan::where('user_id',Auth::User()->user_id)
        ->get();
        return json_encode($hewan);
    }

    public function listwaktu(){
        $waktu_booking = WaktuBooking::where('status_waktu',1)
        ->get();
        return json_encode($waktu_booking);
    }

    public function create(Request $request){

        $booking = new Booking;
        $booking->booking_id = $request->booking_id;
        $booking->kode_hewan = $request->kode_hewan;
        $booking->waktu_booking_id = $request->waktu_booking_id;
        $booking->tanggal_booking = $request->tanggal_booking;
        $booking->status = $request->status;

        $booking->save();

        $waktu_booking = WaktuBooking::where('waktu_booking_id', $request->waktu_booking_id)->first();
        $waktu_booking->status_waktu = $request->status_waktu;

        $waktu_booking->update();

        return redirect('booking/databookinguser')->with(['success' => 'Booking Berhasil']);

    }

    public function update(Request $request,$id){

        $booking = Booking::where('waktu_booking_id',$id)->first();
        $booking->status = $request->statuss;
        $booking->update();

        $waktu_booking = WaktuBooking::where('waktu_booking_id',$id)->first();
        $waktu_booking->status_waktu = 1;
        $waktu_booking->update();
    }

    public function delete($id)
    {

      Booking::where('booking_id', $id)->delete();

    }
}
