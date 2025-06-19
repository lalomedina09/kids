<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Kalnoy\Nestedset\NodeTrait;

class Option extends Model
{

    use SoftDeletes;
    use NodeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'options';

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
        'name', 'code', 'lang'
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
     * Return an array of available categories by field and key
     *
     * @param  string|int  $data_key
     * @param  string  $data_field
     * @param  boolean  $selectable
     * @param  boolean  $all
     * @return \Illuminate\Support\Collection
     */
    public static function get($data_key, $data_field='code', $selectable=false, $all=false)
    {
        $collection = self::where($data_field, $data_key)
            ->first()
            ->children()
            ->get();
        if (!$collection->isEmpty() && $selectable) {
            $collection = $collection->pluck('label', 'id');
            $collection = ($all) ? $collection->prepend(__('All'), '*') : $collection;
        }
        return $collection;
    }

    /**
     * Return the child only if it has a parent
     *
     * @param  string|int  $child_id
     * @param  string|int  $parent_id
     * @return \App\Models\Option
     */
    public static function getChild($child_id, $parent_id)
    {
        return self::where('id', $child_id)
            ->where('parent_id', $parent_id)
            ->first();
    }
}
