<?php

namespace App\Models\Traits;

use App\Models\User;

trait Authorable
{
    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Writter accessor
     *
     * @return mixed
     */
    public function getOwnerAttribute()
    {
        return ($this->author->hasRole('staff')) ? User::first() : $this->author;
    }

    /*
    |--------------------------------------------------------------------------
    | Public functions
    |--------------------------------------------------------------------------
    */

    /**
     * Check if content is from a guest writter
     *
     * @return mixed
     */
    public function isGuestContent()
    {
        return $this->owner->getKey() != $this->author->getKey();
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}