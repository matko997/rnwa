<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'flight_id',
        'seat',
        'passenger_id',
        'price',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id');
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'passenger_id');
    }
}
