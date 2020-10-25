<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiLainnya extends Model
{
    protected $table = 'transaksi_lainnya';
    protected $primaryKey = 'kode_lainnya';
    protected $fillable = [
        'kode_transaksi', 'nama', 'harga',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

<<<<<<< HEAD
    public function riwayat_pemeriksaan() {
        return $this->belongsTo('App\RiwayatPemeriksaan', 'kode_transaksi', 'transaksi_pemeriksaan_id');
=======
    public function transaksi() {
        return $this->belongsTo('App\Transaksi', 'kode_transaksi', 'kode_transaksi');
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
    }
}
