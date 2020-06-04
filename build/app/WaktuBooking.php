<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaktuBooking extends Model
{
    protected $table = 'waktu_booking';
    protected $primaryKey = 'waktu_booking_id';
    protected $fillable = [
        'jam', 'status_waktu',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function hewan()
    {
        return $this->belongsToMany('App\Hewan','booking','waktu_booking_id','kode');
    }

}
