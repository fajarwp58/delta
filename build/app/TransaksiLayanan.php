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

    public function riwayat_pemeriksaan() {
        return $this->belongsTo('App\RiwayatPemeriksaan', 'kode_transaksi', 'transaksi_pemeriksaan_id');
    }
}
