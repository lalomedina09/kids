<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use App\ViewComposers\{ AuthorViewComposer, CategoryViewComposer, SeoViewComposer };

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        /*
        View::composer(
            ['layouts.app', 'layouts.landing', 'layouts.landingb', 'layouts.error', 'auth.register', 'articles.categories', 'articles.index', 'articles.tag', 'home.index', 'search.index'],
            CategoryViewComposer::class
        );

        View::composer(
            [
                'dashboard.articles.create', 'dashboard.articles.edit',
                'dashboard.videos.create', 'dashboard.videos.edit',
                'dashboard.podcasts.create', 'dashboard.podcasts.edit'
            ],
            AuthorViewComposer::class
        );

        View::composer(
            ['layouts.base', 'layouts.base-v2-redesign'],
            SeoViewComposer::class
        );

        View::composer('*', function ($view) {
            $view->with('auser', auth()->user());
        });
        */
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
