<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatPemeriksaan extends Model
{
    protected $table = 'riwayat_pemeriksaan';
    protected $primaryKey = 'riwayat_pemeriksaan_id';
    protected $fillable = [
        'no_reg', 'suhu', 'berat_badan', 'anamnesa', 'clinical_sign', 'diagnosa', 'pragnosa', 'terapi'
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function hewan() {
        return $this->belongsTo('App\Hewan', 'no_reg', 'kode');
    }

}