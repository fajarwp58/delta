<?php

namespace App\Http\Controllers;

use App\Obat;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(100, 999)
            . $characters[rand(0, strlen($characters) - 1)];
        $AWAL = 'OBT';

        $idmodal = $AWAL .'-'.str_shuffle($pin);

        return view ('obat' ,['idmodal'=>$idmodal]);
    }

    public function data()
    {
        $obat = Obat::all();

        return DataTables::of($obat)
        ->editColumn('harga', function ($obat) {
            return 'Rp. '.format_uang($obat->harga);
        })
        ->toJson();
    }

    public function create(Request $request){
        request()->validate([
            'harga' => ['required'],
            'nama' => ['required', 'string', 'max:255'],
        ],
            [
                'harga.required'=> 'Masukan harga obat',
                'nama.required'=> 'Masukan nama obat',
            ]);


         $obat = new Obat;
         $obat->kode_obat = $request->kode_obat;
         $obat->nama = $request->nama;
         $obat->harga = $request->harga;

         $obat->save();

    }

    public function update(Request $request,$id){

        $obat = Obat::where('kode_obat',$id)->first();
        $obat->harga = $request->harga;
        $obat->nama = $request->nama;

        $obat->update();
    }

    public function delete($id)
    {

      Obat::where('kode_obat', $id)->delete();

    }


}
