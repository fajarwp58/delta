<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaktuBooking extends Model
{
    protected $table = 'waktu_booking';
    protected $primaryKey = 'waktu_booking_id';
    protected $fillable = [
        'jam_awal','jam_akhir', 'status_waktu',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function hewan()
    {
        return $this->belongsToMany('App\Hewan','booking','waktu_booking_id','kode');
    }

}
