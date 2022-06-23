<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Kalnoy\Nestedset\NodeTrait;

use App\Models\Presenters\CategoryPresenter;
use App\Models\Traits\{ Presentable, Sluggable };

use QD\Advice\Models\Traits\AdviceCategoryTrait;
use QD\Products\Models\Traits\ProductCategoryTrait;

class Category extends Model
{

    use Presentable, Sluggable;
    use SoftDeletes;
    use NodeTrait;

    use AdviceCategoryTrait, ProductCategoryTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'parent_id', '_lft', '_rgt'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', ' slug', 'code', 'lang'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'parent_id', '_lft', '_rgt', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        '_lft' => 'integer',
        '_right' => 'integer',
        'parent_id' => 'integer'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'label'
    ];

    /**
     * Define the sluggable model-specific configurations.
     *
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
        'mutable' => false
    ];

    /**
     * The model presenter full class path.
     *
     * @var string
     */
    protected $presenter = CategoryPresenter::class;

    /**
     * @return string
     */
    public function getRouteKey() : string
    {
        return $this->slug;
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getLabelAttribute()
    {
        return __($this->lang);
    }

    /*
    |--------------------------------------------------------------------------
    | Static functions
    |--------------------------------------------------------------------------
    */

    /**
     * Return categories query
     *
     * @param  mixed  $data_key
     * @param  string  $data_field
     * @return Illuminate\Database\Query\Builder
     */
    public static function getAsQuery($data_key, $data_field='code')
    {
        return self::where($data_field, $data_key)
            ->first()
            ->children();
    }

    /**
     * Return an array of available categories by field and key
     *
     * @param  string|int  $data_key
     * @param  string  $data_field
     * @param  boolean  $selectable
     * @param  boolean  $all_option
     * @return \Illuminate\Support\Collection
     */
    public static function get($data_key, $data_field='code', $selectable=false, $all_option=false)
    {
        $collection = self::getAsQuery($data_key, $data_field)->get();
        if (!$collection->isEmpty() && $selectable) {
            $collection = $collection->pluck('name', 'id');
            $collection = ($all_option) ? $collection->prepend(__('All'), '*') : $collection;
        }
        return $collection;
    }

    /**
     * Return a root category if exists
     *
     * @param  string|int  $category_id
     * @return \App\Models\Category
     */
    public static function getRoot($category_id)
    {
        $category = self::whereIsRoot()
            ->where('id', $category_id)
            ->first();
        return $category;
    }

    /**
     * Return the child only if it has a parent
     *
     * @param  string|int  $child_id
     * @param  string|int  $parent_id
     * @return \App\Models\Category
     */
    public static function getChild($child_id, $parent_id)
    {
        return self::where('id', $child_id)
            ->where('parent_id', $parent_id)
            ->first();
    }

    /**
     * Return all root categories
     *
     * @param  boolean  $selectable
     * @param  boolean  $all_option
     * @return array|\Illuminate\Support\Collection
     */
    public static function getRoots($selectable=false, $all_option=false)
    {
        $categories = self::roots()->get();
        if (!$categories->isEmpty() && $selectable) {
            $categories = $categories->pluck('name', 'id');
            $categories = ($all_option) ? $categories->prepend(__('All'), '*') : $categories;
            $categories = $categories->toArray();
        }
        return $categories;
    }

    /**
     * Return the hierarchy of all the categories
     *
     * @param  boolean  $to_array
     * @return array|\Illuminate\Support\Collection
     */
    public static function getHierarchy($to_array=false)
    {
        $data = self::roots()
            ->get()
            ->transform(function ($category, $key) {
                return $category->getDescendantsAndSelf()
                    ->toHierarchy()
                    ->first();
            });
        return ($to_array) ? $data->toArray() : $data;
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->morphedByMany(Article::class, 'categorizable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function podcasts()
    {
        return $this->morphedByMany(Podcast::class, 'categorizable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos()
    {
        return $this->morphedByMany(Video::class, 'categorizable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagged_articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagged_podcasts()
    {
        return $this->morphedByMany(Podcast::class, 'taggable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagged_videos()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }

}
