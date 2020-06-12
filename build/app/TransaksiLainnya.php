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

    public function transaksi() {
        return $this->belongsTo('App\Transaksi', 'kode_transaksi', 'kode_transaksi');
    }
}
