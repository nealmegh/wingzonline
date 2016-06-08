<?php namespace Wingz\Renters\Facades;

use Illuminate\Support\Facades\Facade;

class Renters extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wingz.renters';
    }
}
