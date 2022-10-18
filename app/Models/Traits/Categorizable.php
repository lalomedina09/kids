<?php

namespace App\Models\Traits;

use Illuminate\Support\Collection;

use App\Models\Category;

trait Categorizable
{

    /**
     * Return the model valid categories.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getCategories()
    {
        Category::get(self::CATEGORIES_CLASS)->where('exclusive', '!=', 1);
    }

    /*
    |--------------------------------------------------------------------------
    | Public methods
    |--------------------------------------------------------------------------
    */

    /**
     * Return categorizable first category
     *
     * @return \Illuminate\Support\Collection
     */
    public function category()
    {
        return $this->categories()->first();
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
