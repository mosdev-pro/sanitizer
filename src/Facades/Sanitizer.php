<?php

namespace Mosdev\Sanitizer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mosdev\Sanitizer\Sanitizer
 */
class Sanitizer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mosdev\Sanitizer\Sanitizer::class;
    }
}
