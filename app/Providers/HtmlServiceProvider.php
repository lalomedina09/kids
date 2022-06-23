<?php

namespace App\Providers;

use App\Support\Html\FormMacros;
use App\Support\Html\LinkFacade;
use App\Support\Html\LinkBuilder;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param \App\Support\Html\FormMacros $form
     */
    public function boot(FormMacros $form)
    {
        $form->mapFormMacros();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerLinkBuilder();

        $this->app->alias('link', LinkBuilder::class);

        AliasLoader::getInstance()->alias('Link', LinkFacade::class);
    }

    /**
     * Register the link builder instance.
     *
     * @return void
     */
    protected function registerLinkBuilder()
    {
        $this->app->singleton('link', function ($app) {
            return new LinkBuilder($app['url'], $app['view']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['link', LinkBuilder::class];
    }
}
