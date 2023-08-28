<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $table = 'passenger';
    protected $primaryKey = 'passenger_id';
    protected $fillable = [
        'passportno',
        'firstname',
        'lastname'
    ];

    public function flights()
    {
        return $this->belongsToMany(Flight::class);
    }

}
