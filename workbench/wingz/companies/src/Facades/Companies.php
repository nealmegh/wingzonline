<?php namespace Wingz\Companies\Facades;

use Illuminate\Support\Facades\Facade;

class Companies extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wingz.companies';
    }
}
