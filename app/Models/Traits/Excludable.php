<?php

namespace App\Models\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

trait Excludable
{
    /**
     * Exclude the provided elements from the query results.
     *
     * @param  Builder  $query
     * @param  mixed  $excluded
     * @param  string  $column
     *
     * @return Builder
     */
    public function scopeExclude($query, $excluded, $column = 'id')
    {
        if ($excluded instanceof Collection) {
            $excluded = $excluded->pluck($column)->toArray();
        }

        if ($excluded instanceof Model) {
            $excluded = $excluded->getAttribute($column);
        }

        $excluded = is_array($excluded) ? $excluded : [$excluded];

        $excluded = array_filter($excluded);

        if (empty($excluded)) {
            return $query;
        }

        return $query->whereNotIn($column, $excluded);
    }
}
