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

    public function transaksi() {
        return $this->belongsTo('App\Transaksi', 'kode_transaksi', 'kode_transaksi');
    }
}
