<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    use HasFactory;

    protected $primaryKey = 'airplane_id';
    protected $table = 'airplane';
    protected $fillable = [
        'capacity',
        'name',
        'type_id'
    ];

    public function airplanes()
    {
        return $this->belongsTo(Airline::class, 'airline_id');
    }

    public function type()
    {
        return $this->belongsTo(AirplaneType::class, 'type_id');
    }

}
