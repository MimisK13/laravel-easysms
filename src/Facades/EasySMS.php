<?php

namespace Mimisk13\LaravelEasySMS\Facades;

use Illuminate\Support\Facades\Facade;

class EasySMS extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'easysms';
    }
}
