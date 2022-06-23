<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{

    /*
    |--------------------------------------------------------------------------
    | Query scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Scope a query that matches a full text search of term.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $term
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFullTextSearch(Builder $query, string $term) : Builder
    {
        $columns = implode(',', $this->searchable);
        $wildcards = $this->fullTextWildcards($term);

        return $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)" , [$wildcards]);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch(Builder $query, string $search) : Builder
    {
        return $query->where('title', 'LIKE', "%{$search}%");
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Replaces spaces with full text search wildcards
     *
     * @param  string $term
     * @return string
     */
    private function fullTextWildcards($term)
    {
        // removing symbols used by MySQL
        $reserved_symbols = ['-', '+', '<', '>', '@', '(', ')', '~', '*', '"'];
        $term = str_replace($reserved_symbols, '', $term);

        $tokens = explode(' ', $term);

        $filtered = array_where($tokens, function ($word, $key) {
            return strlen($word) > 2;
        });

        $formatted = array_map(function ($word) {
            return "{$word}*";
        }, $filtered);

        $search_query = implode(' ', $formatted);

        return $search_query;
    }
}
