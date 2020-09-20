<?php

namespace App\Http\Controllers;

use App\WaktuBooking;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WakbookingController extends Controller
{
    public function index(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(10, 99)
            . $characters[rand(0, strlen($characters) - 1)];
        $AWAL = 'WB';

        $idmodal = $AWAL .'-'.str_shuffle($pin);

        return view ('waktubooking' ,['idmodal'=>$idmodal]);
    }

    public function data()
    {
        $wakbooking = WaktuBooking::all();
        return DataTables::of($wakbooking)
        ->editColumn('status_waktu', function ($wakbooking) {
            if($wakbooking->status_waktu == 1)
                return 'Tersedia';

                elseif($wakbooking->status_waktu == 2)
                    return 'Tidak Tersedia';

                elseif($wakbooking->status_waktu == 3)
                    return 'Datang';

                    else
                        return 'Dibatalkan';
                })
            ->toJson();
    }

    public function create(Request $request){
        request()->validate([
            'jam' => ['required'],
            'jam_akhir' => ['required'],
            'status_waktu' => ['required'],
        ],
            [
                'jam.required'=> 'masukan jam awal waktu booking',
                'jam_akhir.required'=> 'masukan jam akhir waktu booking',
                'status_waktu.required'=> 'masukan status waktu booking',
            ]);


         $wakbooking = new WaktuBooking;
         $wakbooking->waktu_booking_id = $request->waktu_booking_id;
         $wakbooking->jam_awal = $request->jam;
         $wakbooking->jam_akhir = $request->jam_akhir;
         $wakbooking->status_waktu = $request->status_waktu;

         $wakbooking->save();

    }

    public function update(Request $request,$id){

        $wakbooking = WaktuBooking::where('waktu_booking_id',$id)->first();
        $wakbooking->jam_awal = $request->jam;
        $wakbooking->jam_akhir = $request->jam_akhir;
        $wakbooking->status_waktu = $request->status_waktu;

        $wakbooking->update();
    }

    public function delete($id)
    {

      WaktuBooking::where('waktu_booking_id', $id)->delete();

    }

}
