<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rentable extends Model
{
    protected $guarded = ['id'];

    function car()
    {
        return $this->hasOne(Vehicle::class, "model", "name");
    }

    function owner()
    {
        return $this->hasOne(Customer::class, "id", "owner_id");
    }

    function customer()
    {
        return $this->hasOne(Customer::class, "id", "customer_id");
    }
}
