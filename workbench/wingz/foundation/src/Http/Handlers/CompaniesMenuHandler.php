<?php namespace Wingz\Foundation\Http\Handlers;

use Orchestra\Contracts\Auth\Guard;
use Orchestra\Foundation\Support\MenuHandler;

class CompaniesMenuHandler extends MenuHandler
{
    /**
     * Menu configuration.
     *
     * @var array
     */
    protected $menu = [
        'id'    => 'companies',
        'title' => 'companies',
        'link'  => 'orchestra::wingz/companies',
        'icon'  => null,
    ];

    /**
     * Get position.
     *
     * @return string
     */
    public function getPositionAttribute()
    {
        return $this->handler->has('wingz') ? '^:wingz' : '>:home';

    }

    /**
     * Check whether the menu should be displayed.
     *
     * @param  \Orchestra\Contracts\Auth\Guard  $auth
     *
     * @return bool
     */
    public function authorize(Guard $auth)
    {
        return ! $auth->guest();
    }
}
