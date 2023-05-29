<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Kalnoy\Nestedset\NodeTrait;

use App\Models\Presenters\CategoryPresenter;
use App\Models\Traits\{ Presentable, Sluggable };

//use QD\Advice\Models\Traits\AdviceCategoryTrait;
//use QD\Products\Models\Traits\ProductCategoryTrait;

class TsCategory extends Model
{

    use Presentable, Sluggable;
    use SoftDeletes;
    use NodeTrait;

    //use AdviceCategoryTrait, ProductCategoryTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ts_categories';

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
        'name', 'translate_en', ' slug', 'code', 'lang'
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
     * Return the childs if it has a parent
     * @param  string|int  $parent_id
     * @return \App\Models\Category
     */
    public static function getManyChilds($parent_id)
    {
        return self::where('parent_id', $parent_id)->get();
    }

    public function getDateHuman($date)
    {
        return $newDate = Carbon::parse($date)->diffForHumans();
    }
}
