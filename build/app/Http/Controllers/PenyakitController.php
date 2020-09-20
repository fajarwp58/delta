<?php

namespace App\Http\Controllers;

use App\JenisPenyakit;
use App\Penyakit;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(100, 999)
            . $characters[rand(0, strlen($characters) - 1)];
        $AWAL = 'PNY';

        $idmodal = $AWAL .'-'.str_shuffle($pin);

        return view ('penyakit' ,['idmodal'=>$idmodal]);
    }

    public function data()
    {
        $penyakit = Penyakit::with(['jenis_penyakit'])->get();
        return DataTables::of($penyakit)->toJson();
    }

    public function create(Request $request){
        request()->validate([
            'jenis_penyakit_id' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
        ],
            [
                'jenis_penyakit_id.required'=> 'pilih jenis penyakit anda',
                'nama.required'=> 'masukan nama penyakit',
            ]);


         $penyakit = new Penyakit;
         $penyakit->kode_penyakit = $request->kode_penyakit;
         $penyakit->jenis_penyakit_id = $request->jenis_penyakit_id;
         $penyakit->nama = $request->nama;

         $penyakit->save();

    }

    public function update(Request $request,$id){

        $penyakit = Penyakit::where('kode_penyakit',$id)->first();
        $penyakit->jenis_penyakit_id = $request->jenis_penyakit_id;
        $penyakit->nama = $request->nama;

        $penyakit->update();
    }

    public function delete($id)
    {

      Penyakit::where('kode_penyakit', $id)->delete();

    }

    public function listjenispenyakit(){
        $jenis = JenisPenyakit::all();
        return json_encode($jenis);
    }
}
