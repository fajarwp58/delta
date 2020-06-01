<?php

namespace App\Http\Controllers;

use App\Kandang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class KandangController extends Controller
{
    public function index(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(10000, 99999)
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters2[rand(0, strlen($characters) - 1)];
        $AWAL = 'KANDANG';

        $idmodal = $AWAL .'-'.str_shuffle($pin);

        return view ('kandang' ,['idmodal'=>$idmodal]);
    }

    public function data()
    {
        $kandang = Kandang::all();
        return DataTables::of($kandang)->toJson();
    }

    public function create(Request $request){

         $kandang = new Kandang;
         $kandang->kode_kandang = $request->kode_kandang;

         $kandang->save();

    }

    public function delete($id)
    {

      Kandang::where('id', $id)->delete();

    }

    public function printBarcode(Request $request)
    {
        $datakandang = array();
        foreach($request['id'] as $id){
            $kandang = Kandang::find($id);
            $datakandang[] = $kandang;
        }

        $no = 1;
        $pdf = PDF::loadView('barcodekandang', compact('datakandang', 'no'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

}
