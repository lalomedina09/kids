<?php

namespace App\Models\Traits;

use Helpers;

trait Hashable
{

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Find user by hashid.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed  $hashid
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByHashid($query, $hashid)
    {
        $id = $this->extractHashedValue($hashid);
        return $query->where('id', $id);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Return a hash id
     *
     * @return string
     */
    public function getHashidAttribute() {
        $microtime = Helpers::getMicrotime();
        $id = $this->id;
        $hashid = "{$microtime}{$id}";
        return app()->make('QDHasher')->encode($hashid);
    }


    /*
    |--------------------------------------------------------------------------
    | Public methods
    |--------------------------------------------------------------------------
    */

    /**
     * Compare hashid with another
     * @param  string  $hashid
     * @return boolean
     */
    public function compareHashid($hashid)
    {
        $value = $this->extractHashedValue($hashid);
        return ($value === $this->id);
    }


    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Extract hashed value
     *
     * @param  string  $hashid
     * @return int|string
     */
    private function extractHashedValue($hashid)
    {
        $decoded = app()->make('QDHasher')->decode($hashid);
        if (empty($decoded)) {
            return false;
        }
        $value = $decoded[0];
        return (int) substr($value,16);
    }
}

