<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'kode_layanan';
    protected $fillable = [
        'kode_penyakit', 'nama', 'harga',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function penyakit() {
        return $this->belongsTo('App\Penyakit', 'kode_penyakit', 'kode_penyakit');
    }

<<<<<<< HEAD
    public function riwayat_pemeriksaan()
    {
        return $this->belongsToMany('App\RiwayatPemeriksaan','transaksi_layanan','kode_layanan','kode_transaksi');
=======
    public function transaksi()
    {
        return $this->belongsToMany('App\Transaksi','transaksi_layanan','kode_layanan','kode_transaksi');
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
    }
}
