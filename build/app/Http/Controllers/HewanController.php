<?php

namespace App\Http\Controllers;
use App\Hewan;
use App\JenisHewan;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;

class HewanController extends Controller
{
    public function index(){
        $pin = mt_rand(1000000, 9999999);
        $AWAL = 'REG';

        $idmodal = $AWAL .str_shuffle($pin);

        return view ('hewan' ,['idmodal'=>$idmodal]);
    }

    public function data()
    {
        $hewan = Hewan::with(['users', 'jenis_hewan'])->where('user_id',Auth::User()->user_id)->get();
        return DataTables::of($hewan)
        ->editColumn('jenis_kelamin', function ($hewan) {
            if($hewan->jenis_kelamin == 1)
                return 'Jantan';

                else
                    return 'Betina';
                })
            ->toJson();
    }

    public function create(Request $request){
        request()->validate([
            'jenis_hewan_id' => ['required', 'string', 'max:255'],
            'nama_hewan' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
        ],
            [
                'jenis_hewan_id.required'=> 'pilih jenis hewan anda',
                'nama_hewan.required'=> 'masukan nama hewan anda',
                'jenis_kelamin.required'=> 'masukan jenis kelamin hewan anda',
            ]);


         $hewan = new Hewan;
         $hewan->kode = $request->kode;
         $hewan->user_id = $request->user_id;
         $hewan->jenis_hewan_id = $request->jenis_hewan_id;
         $hewan->jenis_kelamin = $request->jenis_kelamin;
         $hewan->ket = $request->ket;
         $hewan->nama_hewan = $request->nama_hewan;

         $hewan->save();

    }

    public function update(Request $request,$id){

        $hewan = Hewan::where('kode',$id)->first();
        $hewan->nama_hewan = $request->nama_hewan;
        $hewan->jenis_hewan_id = $request->jenis_hewan_id;
        $hewan->jenis_kelamin = $request->jenis_kelamin;
        $hewan->ket = $request->ket;
        $hewan->update();
    }

    public function delete($id)
    {

      Hewan::where('kode', $id)->delete();

    }

    public function listjenis(){
        $jenis = JenisHewan::all();
        return json_encode($jenis);
    }
}
