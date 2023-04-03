<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, hasOne, hasMany};
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QzQuestion extends Model
{
    use Presentable, SoftDeletes;

    protected $fillable = [
        'question', 'comments'
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'quiz_id'
    ];
    //protected $presenter = Presenters\ContactPresenter::class;

    public function quiz()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(Quiz::class, 'id', 'quiz_id');
    }

    public function options()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasMany(QzOption::class, 'question_id', 'id');
    }

}
