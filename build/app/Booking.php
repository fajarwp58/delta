<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'booking_id';
    protected $fillable = [
        'kode_hewan', 'waktu_booking_id', 'status', 'tanggal_booking',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function hewan() {
        return $this->belongsTo('App\Hewan', 'kode_hewan', 'kode');
    }

    public function waktu_booking() {
        return $this->belongsTo('App\WaktuBooking', 'waktu_booking_id', 'waktu_booking_id');
    }
}
