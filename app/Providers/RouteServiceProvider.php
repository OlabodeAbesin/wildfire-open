<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapInfluencerRoutes();

        $this->mapAgencyRoutes();

        $this->mapBrandRoutes();

        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => ['web', 'admin', 'auth:admin'],
            'prefix' => 'admin',
            'as' => 'admin.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "brand" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapBrandRoutes()
    {
        Route::group([
            'middleware' => ['web', 'brand', 'auth:brand'],
            'prefix' => 'brand',
            'as' => 'brand.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/brand.php');
        });
    }

    /**
     * Define the "agency" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAgencyRoutes()
    {
        Route::group([
            'middleware' => ['web', 'agency', 'auth:agency'],
            'prefix' => 'agency',
            'as' => 'agency.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/agency.php');
        });
    }

    /**
     * Define the "influencer" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapInfluencerRoutes()
    {
        Route::group([
            'middleware' => ['web', 'influencer', 'auth:influencer'],
            'prefix' => 'influencer',
            'as' => 'influencer.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/influencer.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
