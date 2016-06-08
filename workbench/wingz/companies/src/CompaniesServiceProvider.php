<?php namespace Wingz\Companies;

use Orchestra\Foundation\Support\Providers\ModuleServiceProvider;

class CompaniesServiceProvider extends ModuleServiceProvider
{
    /**
     * The application or extension namespace.
     *
     * @var string|null
     */
    protected $namespace = 'Wingz\Companies\Http\Controllers';

    /**
     * The application or extension group namespace.
     *
     * @var string|null
     */
    protected $routeGroup = 'wingz/companies';

    /**
     * The fallback route prefix.
     *
     * @var string
     */
    protected $routePrefix = 'companies';
    

    /**
     * Boot extension components.
     *
     * @return void
     */
    protected function bootExtensionComponents()
    {
        $path = realpath(__DIR__.'/../resources');

        $acl    = $this->app->make('orchestra.acl');
        $memory = $this->app->make('orchestra.platform.memory');
        $view   = $this->app->make('view');

        $acl->make('wingz/companies')->attach($memory);
//        $view->composer('orchestra/foundation::dashboard.index', Dashboard::class);

        $this->addConfigComponent('wingz/companies', 'wingz/companies', "{$path}/config");
        $this->addViewComponent('wingz/companies', 'wingz/companies', "{$path}/views");
    }

    /**
     * Boot extension routing.
     *
     * @return void
     */
    protected function loadRoutes()
    {
        $path = realpath(__DIR__);

        $this->loadFrontendRoutesFrom("{$path}/Http/frontend.php");
        $this->loadBackendRoutesFrom("{$path}/Http/backend.php", "{$this->namespace}\Admin");
    }
}
