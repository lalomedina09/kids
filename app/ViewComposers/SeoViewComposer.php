<?php

namespace App\ViewComposers;

use Illuminate\View\View;

use App\Helpers\Helpers;
use App\Models\User;

class SeoViewComposer
{

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $seoable = request()->seoable;

        $default_title = config('money.seo.title');
        $default_description = config('money.seo.description');
        $default_author = config('money.seo.author');
        $default_image = config('app.url') . '/favicon/mstile-310x310.png';
        $default_keywords = config('money.seo.keywords');

        $title = ($seoable) ? $seoable->seo()->title . ' | ' . config('app.name') : $default_title;
        $description = ($seoable) ? $seoable->seo()->description : $default_description;
        $author = ($seoable) ? $seoable->seo()->author : $default_author;
        $image = ($seoable) ? $seoable->seo()->image : $default_image;
        $keywords = ($seoable) ? $seoable->seo()->keywords : $default_keywords;

        $metadata = [
            'name' => config('money.seo.name'),
            'title' => $title ?? $default_title,
            'description' => $description ?? $default_description,
            'author' => $author ?? $default_author,
            'image' => $image ?? $default_image,
            'url' => request()->url(),
            'keywords' => ($keywords) ? $default_keywords . ',' . $keywords : $default_keywords,
            'twitter' => [
                'card' => 'summary_large_image',
                'site' => config('money.users.twitter'),
                'creator' => config('money.users.twitter')
            ]
        ];

        array_walk_recursive($metadata, function (&$value, $key) {
            $value = html_entity_decode($value);
        });

        $view->with([
            'metadata' => Helpers::toObject($metadata)
        ]);
    }
}
