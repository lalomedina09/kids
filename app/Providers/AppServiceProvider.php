<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

use App\Models\{ Article, Course, Cover, Download, Podcast, Speaker, User, Video };

use Date;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerSharedVariables();
        $this->registerMorphMap();

        $this->cacheJsonFiles();

        Date::serializeUsing(function ($carbon) {
            return $carbon->format('Y-m-d H:i:s');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHasher();
    }

    /**
     * Register hasher
     *
     * @return void
     */
    private function registerHasher()
    {
        $this->app->singleton('QDHasher', function ($app) {
            return new \Hashids\Hashids(config('app.key'));
        });
    }

    /**
     * Register shared variables
     *
     * @return void
     */
    protected function registerSharedVariables()
    {
        config([
            'money.modules.blog' => [
                'name' => 'messages.app.name',
                'route' => 'dashboard.articles.index',
                'pattern' => 'dashboard/blog*',
                'permission' => 'blog.articles.index'
            ]
        ]);
    }

    /**
     * Register morph map
     *
     * @return void
     */
    private function registerMorphMap()
    {
        Relation::morphMap([
            Article::MORPH_CLASS => Article::class,
            Course::MORPH_CLASS => Course::class,
            Cover::MORPH_CLASS => Cover::class,
            Download::MORPH_CLASS => Download::class,
            Podcast::MORPH_CLASS => Podcast::class,
            Speaker::MORPH_CLASS => Speaker::class,
            User::MORPH_CLASS => User::class,
            Video::MORPH_CLASS => Video::class
        ]);
    }

    /**
     * Cache states
     *
     * @return void
     */
    private function cacheJsonFiles()
    {
        $files = [
            'states.json' => storage_path('app/json'),
            'bank_keys.json' => storage_path('app/json'),
            'bank_names.json' => storage_path('app/json'),
            'payment_methods.json' => storage_path('app/cfdi'),
            'payment_types.json' => storage_path('app/cfdi'),
            'usage.json' => storage_path('app/cfdi'),
            'countries.json' => storage_path('app/json'),
        ];

        foreach ($files as $filename => $filepath) {
            $file = "{$filepath}/{$filename}";
            $md5_cache_key = "{$filename}.md5";
            $md5_cache_value = cache()->get($md5_cache_key);
            $md5_current_value = md5_file($file);

            if ($md5_cache_value === $md5_current_value) {
                continue;
            }

            cache()->forget($md5_cache_key);
            cache()->forget($filename);

            cache()->forever($md5_cache_key, $md5_current_value);
            $file_contents = file_get_contents($file);
            $file_decoded = json_decode($file_contents);
            cache()->forever($filename, collect($file_decoded));
        }
    }
}
