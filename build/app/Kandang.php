<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandang extends Model
{
    protected $table = 'kandang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_kandang',
    ];

    public $timestamps = false;
}
