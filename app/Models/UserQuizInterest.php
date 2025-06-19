<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, hasOne, hasMany};
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserQuizInterest extends Model
{
    use Presentable, SoftDeletes;

    protected $fillable = [
        ''
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'user_id', 'quiz_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class, 'id', 'quiz_id');
    }

    //Comment reference
    // 'foreign_key' , 'local_key'
}
