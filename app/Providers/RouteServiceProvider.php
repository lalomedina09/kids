<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

use Illuminate\Http\Response;

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
        $this->mapDashboardRoutes();
        $this->mapLandingRoutes();
        $this->mapWebRoutes();
        $this->mapToolsRoutes();
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
             ->namespace("{$this->namespace}\Api")
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "dashboard" routes for the application.
     *
     * @return void
     */
    protected function mapDashboardRoutes()
    {
        Route::prefix('dashboard')
            ->name('dashboard.')
            ->middleware('dashboard')
            ->namespace("{$this->namespace}\Dashboard")
            ->group(base_path('routes/dashboard.php'));
    }

    /**
     * Define the "landing" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapLandingRoutes()
    {
        Route::middleware('web')
             ->namespace("{$this->namespace}\Landing")
             ->group(base_path('routes/landing.php'));
    }

    /**
     * Define the "tools" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapToolsRoutes()
    {
        Route::middleware('web')
             ->namespace("{$this->namespace}\Tools")
             ->group(base_path('routes/tools.php'));
    }
}
