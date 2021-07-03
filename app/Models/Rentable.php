<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rentable extends Model
{
    protected $guarded = ['id'];

    function car()
    {
        return $this->hasOne(Vehicle::class, "name", "model");
    }
}
