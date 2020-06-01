<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisHewan extends Model
{
    protected $table = 'jenis_hewan';
    protected $primaryKey = 'jenis_hewan_id';
    protected $fillable = [
        'nama',
    ];

    protected $keyType = 'string';

    public $timestamps = false;
}
