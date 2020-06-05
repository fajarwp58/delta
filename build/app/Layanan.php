<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'kode_layanan';
    protected $fillable = [
        'kode_penyakit', 'nama', 'harga',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function penyakit() {
        return $this->belongsTo('App\Penyakit', 'kode_penyakit', 'kode_penyakit');
    }
}
