<?php

namespace Modules\Users\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Users\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public
    function boot()
    {
        $this->map();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public
    function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected
    function mapWebRoutes()
    {
        app()->router->group([
            'namespace' => $this->moduleNamespace
        ], function ($router) {
            require module_path('Users', '/Routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected
    function mapApiRoutes()
    {
        app()->router->group([
            'namespace' => $this->moduleNamespace,
            'prefix' => 'api'
        ], function ($router) {
            require module_path('Users', '/Routes/api.php');
        });
    }
}
