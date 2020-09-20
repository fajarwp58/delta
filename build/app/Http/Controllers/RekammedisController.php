<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Hewan;
use App\RiwayatPemeriksaan;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RekammedisController extends Controller
{
    public function index(){
        return view('rekammedis');
    }

    public function datahewan(){
        $hewan = Booking::with('hewan')->whereIn('status',[2,3])->whereDate('tanggal_booking', Carbon::today())->get();

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

    public function view($id)
    {
        $hewan = Hewan::with('users','jenis_hewan')->where('kode',$id)->first();
        $rekammedis = Transaksi::with('riwayat_pemeriksaan','layanan','obat')
        ->orderBY('waktu', 'DESC')
        ->where('kode_hewan',$id)
        ->get();

        // $rekammedis = DB::table('riwayat_pemeriksaan')
        // ->join('transaksi','transaksi.kode_transaksi','=','riwayat_pemeriksaan.kode_transaksi')
        // ->join('layanan','layanan.kode_layanan','=','transaksi_layanan.kode_layanan')
        // ->where('kode_hewan','=',$id)
        // ->get();
        //dd($rekammedis);

        return view('viewRMedis', compact('hewan','rekammedis'));
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

        $transaksi = new Transaksi;
        $transaksi->kode_transaksi = $reqruest->kode_transaksi;
        $transaksi->dokter_id = $reqruest->dokter_id;
        $transaksi->kode_hewan = $reqruest->no_reg;
        $transaksi->waktu = Carbon::now();

        $transaksi->save();

        $rekammedis = new RiwayatPemeriksaan;
        $rekammedis->riwayat_pemeriksaan_id = $reqruest->riwayat_pemeriksaan_id;
        $rekammedis->no_reg = $reqruest->no_reg;
        $rekammedis->kode_transaksi = $reqruest->kode_transaksi;
        $rekammedis->suhu = $reqruest->suhu;
        $rekammedis->berat_badan = $reqruest->berat_badan;
        $rekammedis->clinical_sign = $reqruest->clinical_sign;
        $rekammedis->anamnesa = $reqruest->anamnesa;
        $rekammedis->diagnosa = $reqruest->diagnosa;
        $rekammedis->pragnosa = $reqruest->pragnosa;
        $rekammedis->terapi = $reqruest->terapi;

        $rekammedis->save();

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
