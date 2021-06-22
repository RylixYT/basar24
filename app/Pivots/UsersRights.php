<?php

namespace App\Pivots;

use App\Models\Right;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UsersRights extends Pivot
{



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function right()
    {
        return $this->belongsTo(Right::class);
    }
}
