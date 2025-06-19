<?php

namespace App\Models\Traits;

use App\Models\Like;
use App\Models\User;

trait Likeable
{
    /**
     * Save like on storage
     *
     * @param  App\Models\User  $user
     * @return App\Models\Like
     */
    public function saveLike(User $user) : Like
    {
        $like = $this->likeOf($user, true);
        if (!$like instanceof Like) {
            $like = new Like;
            $like->user()->associate($user);
            $like->likeable()->associate($this);
            $like->push();
        } else if ($like->trashed()) {
            $like->restore();
        } else {
            $like->delete();
        }
        return $like;
    }

    /**
     * Check liked by user
     *
     * @param  \App\Models\User  $user
     * @return boolean
     */
    public function likedBy($user)
    {
        if (!$user instanceof User) {
            return null;
        }
        return $this->likes()->where('user_id', $user->getKey())->exists();
    }

    /**
     * Get like by user
     *
     * @param \App\Models\User $user
     * @param boolean $with_trashed
     * @return \App\Models\Like
     */
    public function likeOf(User $user, $with_trashed=false)
    {
        if (!$user instanceof User) {
            return null;
        }

        $like = $this->likes();
        if ($with_trashed) {
            $like = $like->withTrashed();
        }
        $like = $like->where('user_id', $user->getKey())->first();
        return $like;
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }
}
