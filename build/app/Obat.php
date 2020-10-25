<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'kode_obat';
    protected $fillable = [
        'nama','jenis', 'harga', 'jumlah',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function riwayat_pemeriksaan()
    {
        return $this->belongsToMany('App\RiwayatPemeriksaan','transaksi_obat','kode_obat','kode_transaksi');
    }
}
