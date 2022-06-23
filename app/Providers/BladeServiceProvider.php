<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('money', function ($amount) {
            return "<?php echo '$' . number_format($amount,2,'.',',') . ' pesos'; ?>";
        });
        /*
        Blade::directive('bookmarked', function ($bookmarkable) {
            (
                (auth()->check()) ? (
                    ($bookmarkable->bookmarkedBy(auth()->user())) ? 'fa-bookmark' : 'fa-bookmark-o'
                ) : 'fa-bookmark-o'
            );
            return "<?php echo ((auth()->check()) ? ((true) ? 'fa-bookmark text-danger' : 'fa-bookmark-o') : 'fa-bookmark-o'); ?>";
        });

        Blade::directive('liked', function ($likeable) {
            (
                (auth()->check()) ? (
                    ($likeable->likedBy(auth()->user())) ? 'fa-heart' : 'fa-heart-o'
                ) : 'fa-heart-o'
            );
            return "<?php echo ((auth()->check()) ? ((true) ? 'fa-heart text-danger' : 'fa-heart-o') : 'fa-heart-o'); ?>";
        });
        */
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        //

    }

}
