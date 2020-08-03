<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiObat extends Model
{
    protected $table = 'transaksi_obat';
    protected $fillable = [
        'kode_obat', 'kode_transaksi', 'cara_pakai',
    ];

    protected $keyType = 'string';
    protected $primaryKey = 'kode_obat';

    public $timestamps = false;

    public function obat() {
        return $this->belongsTo('App\Obat', 'kode_obat', 'kode_obat');
    }

    public function transaksi() {
        return $this->belongsTo('App\Transaksi', 'kode_transaksi', 'kode_transaksi');
    }

}
