<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table = 'penyakit';
    protected $primaryKey = 'kode_penyakit';
    protected $fillable = [
        'jenis_penyakit_id', 'nama',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function jenis_penyakit() {
        return $this->belongsTo('App\JenisPenyakit', 'jenis_penyakit_id', 'jenis_penyakit_id');
    }

<<<<<<< HEAD
    // public function riwayat_pemeriksaan() {
    //     return $this->hasMany('App\RiwayatPemeriksaan', 'kode_penyakit', 'kode_penyakit');
    // }

=======
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
}
