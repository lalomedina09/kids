<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IntegrationServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDemio();
        $this->registerZoom();
    }

    /**
     * Register Demio
     *
     * @return void
     */
    private function registerDemio()
    {
        $this->app->singleton('DemioClient', function ($app) {
            return new \Demio\Client(
                config('services.demio.key'),
                config('services.demio.secret')
            );
        });

        $this->app->singleton('DemioConnector', function ($app) {
            return new \App\Integrations\Demio\DemioConnector;
        });
    }

    /**
     * Register Zoom
     *
     * @return void
     */
    private function registerZoom()
    {
        $this->app->bind('ZoomConnector', function ($app) {
            return new \App\Integrations\Zoom\ZoomConnector;
        });
    }

}
