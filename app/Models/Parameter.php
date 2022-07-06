<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parameter extends Model
{
    //
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parameters';

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

    public static function getPriceRating($data_field = 'code', $data_key)
    {
        return self::where('code', 'price-rating')
            ->first();
    }
}
