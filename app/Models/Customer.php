<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['id'];

    function cars()
    {
        return $this->hasMany(Rentable::class, "owner_id", "id");
    }
}
