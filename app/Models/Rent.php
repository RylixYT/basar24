<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $guarded = ['id'];

    function owner()
    {
        return $this->hasOne(Customer::class, "id", "owner_id");
    }

    function customer()
    {
        return $this->hasOne(Customer::class, "id", "customer_id");
    }
}
