<?php

namespace App\Models\Traits;

use Date;

trait Viewable
{

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePopular($query)
    {
        return $query->published()
            ->withCount('likes')
            ->orderBy('views_count', 'desc')
            ->orderBy('likes_count', 'desc');
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \App\Models\User  $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecommended($query, $user=null)
    {
        if (!$user) {
            return $query->popular();
        }

        $user_interests = $user->interests;
        if ($user_interests->isEmpty()) {
            return $query->popular();
        }

        $model = $query->getModel();
        // Recommendations by interests first
        $recommendations = $model->select(['id'])
            ->whereHas('tags', function ($tags_query) use ($user_interests) {
                $tags_query->whereIn('category_id', $user_interests->pluck('id')->all());
            })
            ->published()
            ->inRandomOrder()
            ->limit(100)
            ->get();

        if (!$recommendations->isEmpty()) {
            $ids = implode(',', $recommendations->pluck('id')->all());
            return $query->orderByRaw("FIELD(id,{$ids}) DESC");
        }

        // Recommendations by interests categories fallback
        $user_categories = $user->getCategoriesFromInterests()->pluck('id')->all();
        return $query->popular()
            ->whereHas('categories', function ($categories_query) use ($user_categories) {
                $categories_query->whereIn('category_id', $user_categories);
            });
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTrending($query)
    {
        $min_date = Date::now()->sub('6 months');
        return $query->popular()->recent($min_date);
    }

    /*
    |--------------------------------------------------------------------------
    | Public methods
    |--------------------------------------------------------------------------
    */

    /**
     * Check viewable
     *
     * @return boolean
     */
    public function checkViewable()
    {
        $setViewableSession = function ($key, $now) {
            session([
                $key => [
                    'id' => $this->getKey(),
                    'ex' => $now + 3600 // 30 minutes
                ]
            ]);
            $this->increment('views_count');
        };

        if (auth()->check() && auth()->user()->hasRole('staff')) {
            return false;
        }

        if (!session()->has('viewables')) {
            session(['viewables' => []]);
        }

        $now = Date::now()->timestamp;

        $viewable_class = $this::MORPH_CLASS;
        $viewable_key = "viewables.{$viewable_class}";
        if (!session()->has($viewable_key)) {
            $setViewableSession($viewable_key, $now);
            return;
        }

        $viewable_id = session("{$viewable_key}.id");
        $viewable_ex = session("{$viewable_key}.ex");
        if ($viewable_id !== $this->getKey() || $viewable_ex < $now) {
            $setViewableSession($viewable_key, $now);
            return;
        }
    }

}
