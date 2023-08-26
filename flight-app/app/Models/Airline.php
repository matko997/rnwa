<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    protected $primaryKey = 'airline_id';
    protected $table = 'airline';
    protected $fillable = [
        'iata',
        'airlinename',
        'base_airport',
        'airline_id'
    ];

    public function airports()
    {
        return $this->belongsTo(Airport::class,'base_airport');
    }
}
