<?php

namespace RealSocius\CrudGenerator\Facades;

use Illuminate\Support\Facades\Facade;

class CrudGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CrudGenerator';
    }
}
