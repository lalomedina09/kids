<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, hasOne, hasMany};
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use Presentable;

    protected $fillable = [
        'name'
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'user_id'
    ];

    public function user()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'company_id', 'id');
    }
}

