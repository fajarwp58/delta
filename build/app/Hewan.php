<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    protected $table = 'hewan';
    protected $primaryKey = 'kode';
    protected $fillable = [
        'user_id', 'jenis_hewan_id', 'nama_hewan', 'jenis_kelamin', 'ket',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function users() {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }
    public function jenis_hewan() {
        return $this->belongsTo('App\JenisHewan', 'jenis_hewan_id', 'jenis_hewan_id');
    }
}
