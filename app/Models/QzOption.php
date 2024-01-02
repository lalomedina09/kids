<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, hasOne, hasMany};
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QzOption extends Model
{
    use Presentable, SoftDeletes;

    protected $fillable = [
        'option', 'is_correct', 'image'
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'qz_question_id'
    ];
    //protected $presenter = Presenters\ContactPresenter::class;

    public function question()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(QzQuestion::class, 'id', 'qz_question_id');
    }
}
