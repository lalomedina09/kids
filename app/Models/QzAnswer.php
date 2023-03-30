<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, hasOne, hasMany};
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QzAnswer extends Model
{
    use Presentable, SoftDeletes;

    protected $fillable = [
        'comments'
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'user_id', 'quiz_id', 'qz_question_id', 'qz_option_id'
    ];

    public function user()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function quiz()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(Quiz::class, 'id', 'quiz_id');
    }

    public function question()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(QzQuestion::class, 'id', 'qz_question_id');
    }

    public function option()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(QzOption::class, 'id', 'qz_option_id');
    }
}
