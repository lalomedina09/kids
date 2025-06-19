<?php

namespace App\Models\Traits;

use App\Models\Bookmark;
use App\Models\User;

trait Bookmarkable
{
    /**
     * Save bookmark on storage
     *
     * @param  App\Models\User  $user
     * @return App\Models\Bookmark
     */
    public function saveBookmark(User $user) : Bookmark
    {
        $bookmark = $this->bookmarkOf($user, true);
        if (!$bookmark instanceof Bookmark) {
            $bookmark = new Bookmark;
            $bookmark->user()->associate($user);
            $bookmark->bookmarkable()->associate($this);
            $bookmark->push();
        } else if ($bookmark->trashed()) {
            $bookmark->restore();
        } else {
            $bookmark->delete();
        }
        return $bookmark;
    }

    /**
     * Check bookmarked by user
     *
     * @param \App\Models\User $user
     * @return boolean
     */
    public function bookmarkedBy($user)
    {
        if (!$user instanceof User) {
            return null;
        }
        return $this->bookmarks()->where('user_id', $user->getKey())->exists();
    }

    /**
     * Get bookmark by user
     *
     * @param \App\Models\User $user
     * @param boolean $with_trashed
     * @return \App\Models\Bookmark
     */
    public function bookmarkOf(User $user, $with_trashed=false)
    {
        if (!$user instanceof User) {
            return null;
        }

        $bookmark = $this->bookmarks();
        if ($with_trashed) {
            $bookmark = $bookmark->withTrashed();
        }
        $bookmark = $bookmark->where('user_id', $user->getKey())->first();
        return $bookmark;
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function bookmarks()
    {
        return $this->morphMany('App\Models\Bookmark', 'bookmarkable');
    }
}
