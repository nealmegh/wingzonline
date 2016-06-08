<?php namespace Wingz\Instructors;

use Orchestra\Foundation\Support\Providers\ModuleServiceProvider;

class InstructorsServiceProvider extends ModuleServiceProvider
{
    /**
     * The application or extension namespace.
     *
     * @var string|null
     */
    protected $namespace = 'Wingz\Instructors\Http\Controllers';

    /**
     * The application or extension group namespace.
     *
     * @var string|null
     */
    protected $routeGroup = 'wingz/instructors';

    /**
     * The fallback route prefix.
     *
     * @var string
     */
    protected $routePrefix = 'instructors';
    

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

        $acl->make('wingz/instructors')->attach($memory);
//        $view->composer('orchestra/foundation::dashboard.index', Dashboard::class);

        $this->addConfigComponent('wingz/instructors', 'wingz/instructors', "{$path}/config");
        $this->addViewComponent('wingz/instructors', 'wingz/instructors', "{$path}/views");
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
