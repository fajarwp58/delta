<?php

namespace App\Http\Controllers;

use App\Layanan;
use App\Penyakit;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(100, 999)
            . $characters[rand(0, strlen($characters) - 1)];
        $AWAL = 'LYN';

        $idmodal = $AWAL .'-'.str_shuffle($pin);

        return view ('layanan' ,['idmodal'=>$idmodal]);
    }

    public function data()
    {
        $layanan = Layanan::with('penyakit')->get();

        return DataTables::of($layanan)
        ->editColumn('harga', function ($layanan) {
            return 'Rp. '.format_uang($layanan->harga);
        })
        ->toJson();
    }

    public function create(Request $request){
        request()->validate([
            'kode_penyakit' => ['required'],
            'nama' => ['required', 'string', 'max:255'],
            'harga' => ['required'],
        ],
            [
                'kode_penyakit.required'=> 'Pilih penyakit',
                'harga.required'=> 'Masukan harga obat',
                'nama.required'=> 'Masukan nama obat',
            ]);


         $layanan = new Layanan;
         $layanan->kode_layanan = $request->kode_layanan;
         $layanan->kode_penyakit = $request->kode_penyakit;
         $layanan->nama = $request->nama;
         $layanan->harga = $request->harga;

         $layanan->save();

    }

    public function update(Request $request,$id){

        $layanan = Layanan::where('kode_layanan',$id)->first();
        $layanan->kode_penyakit = $request->kode_penyakit;
        $layanan->harga = $request->harga;
        $layanan->nama = $request->nama;

        $layanan->update();
    }

    public function delete($id)
    {

      Layanan::where('kode_layanan', $id)->delete();

    }

    public function listpenyakit(){
        $penyakit = Penyakit::all();
        return json_encode($penyakit);
    }
}
