<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatPemeriksaan extends Model
{
    protected $table = 'transaksi_pemeriksaan';
    protected $primaryKey = 'transaksi_pemeriksaan_id';
    protected $fillable = [
        'dokter_id','kode_hewan','kode_penyakit', 'suhu', 'berat_badan', 'anamnesa', 'clinical_sign', 'diagnosa', 'pragnosa', 'terapi', 'total_harga'
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function hewan() {
        return $this->belongsTo('App\Hewan', 'kode_hewan', 'kode');
    }

    public function users() {
        return $this->belongsTo('App\User', 'dokter_id', 'user_id');
    }

    public function transaksi_lainnya() {
        return $this->hasMany('App\TransaksiLainnya', 'transaksi_pemeriksaan_id', 'kode_transaksi');
    }

    public function obat()
    {
        return $this->belongsToMany('App\Obat','transaksi_obat','kode_transaksi','kode_obat');
    }

    public function layanan()
    {
        return $this->belongsToMany('App\Layanan','transaksi_layanan','kode_transaksi','kode_layanan');
    }

    // public function penyakit() {
    //     return $this->belongsTo('App\Penyakit', 'kode_penyakit', 'kode_transaksi');
    // }


}
