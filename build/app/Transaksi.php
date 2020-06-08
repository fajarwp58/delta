<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'kode_transaksi';
    protected $fillable = [
        'dokter_id', 'waktu', 'deposit',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function users() {
        return $this->belongsTo('App\User', 'dokter_id', 'user_id');
    }

    public function obat()
    {
        return $this->belongsToMany('App\Obat','transaksi_obat','kode_transaksi','kode_obat');
    }
}