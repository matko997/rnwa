<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $primaryKey = 'flight_id';
    protected $table = 'flight';
    protected $fillable = [
        'from',
        'to',
        'departure',
        'arrival',
        'airline_id',
        'airplane_id'
    ];

    public function source()
    {
        return $this->belongsTo(Airport::class, 'from');
    }

    public function destination()
    {
        return $this->belongsTo(Airport::class, 'to');
    }

    public function airplane()
    {
        return $this->belongsTo(Airplane::class,'airplane_id');
    }

    public function airline()
    {
        return $this->belongsTo(Airline::class,'airline_id');
    }
}
