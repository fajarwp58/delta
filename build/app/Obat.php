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

<<<<<<< HEAD
    public function riwayat_pemeriksaan()
    {
        return $this->belongsToMany('App\RiwayatPemeriksaan','transaksi_obat','kode_obat','kode_transaksi');
=======
    public function transaksi()
    {
        return $this->belongsToMany('App\Transaksi','transaksi_obat','kode_obat','kode_transaksi');
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
    }
}
