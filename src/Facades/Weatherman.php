<?php

namespace Manford\Weatherman\Facades;

use Illuminate\Support\Facades\Facade;

class Weatherman extends Facade
{
    /**
     * Get a weatherman instance for the default connection.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'weatherman';
    }
}