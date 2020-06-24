<?php

namespace App\Http\Controllers;

use App\Hewan;
use App\RiwayatPemeriksaan;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RekammedisController extends Controller
{
    public function index(){
        return view('rekammedis');
    }

    public function datahewan(){
        $hewan = Hewan::with('users','jenis_hewan')->get();

        return DataTables::of($hewan)
        ->editColumn('jenis_kelamin', function ($hewan) {
            if($hewan->jenis_kelamin == 1)
                return 'Jantan';

                else
                    return 'Betina';
                })
                ->tojson();
    }

    public function data(){
        $rekammedis = RiwayatPemeriksaan::with('hewan')->get();

        return DataTables::of($rekammedis)->tojson();
    }

    public function cetakRm($id){
        return view('cetakRm');
    }

    public function addrekammedis($id){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(10000, 99999)
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters1[rand(0, strlen($characters1) - 1)];
        $AWAL = 'RM';
        $idmodal = $AWAL .'-'.str_shuffle($pin);

        $pin2 = mt_rand(10000, 99999);
        $AWAL2 = 'INV';
        $idmodal2 = $AWAL2 .'-'.str_shuffle($pin2);

        $hewan = Hewan::with('users','jenis_hewan')->where('kode',$id)->first();
        $now = Carbon::parse()->format('Y-m-d');
        return view('addrekammedis', compact('hewan', 'idmodal', 'now' , 'idmodal2'));
    }

    public function create(Request $reqruest){
        $rekammedis = new RiwayatPemeriksaan;
        $rekammedis->riwayat_pemeriksaan_id = $reqruest->riwayat_pemeriksaan_id;
        $rekammedis->no_reg = $reqruest->no_reg;
        $rekammedis->suhu = $reqruest->suhu;
        $rekammedis->berat_badan = $reqruest->berat_badan;
        $rekammedis->clinical_sign = $reqruest->clinical_sign;
        $rekammedis->anamnesa = $reqruest->anamnesa;
        $rekammedis->diagnosa = $reqruest->diagnosa;
        $rekammedis->pragnosa = $reqruest->pragnosa;
        $rekammedis->terapi = $reqruest->terapi;

        $rekammedis->save();

        $transaksi = new Transaksi;
        $transaksi->kode_transaksi = $reqruest->kode_transaksi;
        $transaksi->dokter_id = $reqruest->dokter_id;
        $transaksi->kode_hewan = $reqruest->no_reg;
        $transaksi->waktu = Carbon::now();

        $transaksi->save();

        return redirect('dokterlayanan')->with(['success' => 'Rekam Medis berhasil di simpan']);

    }

    public function update(Request $request,$id){

        $rekammedis = RiwayatPemeriksaan::where('riwayat_pemeriksaan_id',$id)->first();
        $rekammedis->anamnesa = $request->anamnesa;
        $rekammedis->pragnosa = $request->pragnosa;
        $rekammedis->diagnosa = $request->diagnosa;
        $rekammedis->terapi = $request->terapi;

        $rekammedis->update();
    }

    public function delete($id)
    {

      RiwayatPemeriksaan::where('riwayat_pemeriksaan_id', $id)->delete();

    }
}
