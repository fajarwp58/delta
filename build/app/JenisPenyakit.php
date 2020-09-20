<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPenyakit extends Model
{
    protected $table = 'jenis_penyakit';
    protected $primaryKey = 'jenis_penyakit_id';
    protected $fillable = [
        'nama',
    ];

    protected $keyType = 'string';

    public $timestamps = false;
}
