<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'kode_obat';
    protected $fillable = [
        'nama', 'harga',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function transaksi()
    {
        return $this->belongsToMany('App\Transaksi','transaksi_obat','kode_obat','kode_transaksi');
    }
}
