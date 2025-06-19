<?php

namespace App\Models\Traits;

use Illuminate\Support\Collection;

use App\Models\Category;

trait Taggable
{
    /* A tag is a subcategory of a category on the group 'Main' */

    /*
    |--------------------------------------------------------------------------
    | Public methods
    |--------------------------------------------------------------------------
    */

    /**
     * Return the model valid subcategories.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getTags()
    {
        return $this->categories()
            ->get()
            ->each->category->load('children')
            ->pluck('children')
            ->flatten();
    }

    /**
     * Return categorizable first category
     *
     * @param  array  $tags
     * @return \Illuminate\Support\Collection
     */
    public function saveTags($tags)
    {
        $valid_tags = $this->getTags()->pluck('id')->all();
        $filtered_tags = array_filter($tags, function ($tag) use ($valid_tags) {
            return in_array($tag, $valid_tags);
        });
        $this->tags()->sync($filtered_tags);
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tags()
    {
        return $this->morphToMany(Category::class, 'taggable');
    }
}

