<?php

namespace App\Models\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;

use Date;

trait Publishable
{

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Check if content is published
     *
     * @return boolean
     */
    public function getIsPublishedAttribute()
    {
        return !is_null($this->published_at) && $this->published_at->lt(Date::now());
    }

    /*
    |--------------------------------------------------------------------------
    | Query scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Scope a query to only include published resources.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query) : Builder
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '<', Date::now());
    }

    /**
     * Scope a query by recent date
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  Date  $min_date
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecent(Builder $query, $min_date=null) : Builder
    {
        return $query->published()
            ->latest('published_at')
            ->when($min_date, function ($q, $min_date) {
                $q->where('published_at', '>=', $min_date);
            });
    }

}
