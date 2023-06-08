<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, hasOne, hasMany};
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TsCategoryUser extends Model
{
    use Presentable, SoftDeletes;

    protected $table = 'ts_categories_users';

    protected $fillable = [
        'name', 'percent', 'created_by_app'
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'user_id', 'ts_category_id'
    ];

    public function user()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function category()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(TsCategory::class, 'id', 'ts_category_id');
    }

    public static function getChild($child_id, $parent_id)
    {
        return self::where('id', $child_id)
            ->where('parent_id', $parent_id)
            ->first();
    }

    public static function getManyChilds($parent_id)
    {
        return self::where('parent_id', $parent_id)->get();
    }
}
