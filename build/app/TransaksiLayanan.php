<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiLayanan extends Model
{
    protected $table = 'transaksi_layanan';
    protected $fillable = [
        'kode_layanan', 'kode_transaksi'
    ];

    public $timestamps = false;

    public function layanan() {
        return $this->belongsTo('App\Layanan', 'kode_layanan', 'kode_layanan');
    }

<<<<<<< HEAD
    public function riwayat_pemeriksaan() {
        return $this->belongsTo('App\RiwayatPemeriksaan', 'kode_transaksi', 'transaksi_pemeriksaan_id');
=======
    public function transaksi() {
        return $this->belongsTo('App\Transaksi', 'kode_transaksi', 'kode_transaksi');
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
    }
}
