<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, hasOne, hasMany};
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TsBudget extends Model
{
    use Presentable, SoftDeletes;

    protected $fillable = [
        'type_move', 'amount_real', 'amount_estimated'
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'user_id', 'ts_category_user_id'
    ];

    public function user()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function customCategory()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(TsCategoryUser::class, 'id', 'ts_category_user_id');
    }
    /*
    public function question()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(QzQuestion::class, 'id', 'question_id');
    }

    public function option()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(QzOption::class, 'id', 'option_id');
    }

    //Relation for get quiz
    public function getQuizzesAnswers()
    {
        //dd('llego al modelo curso');
        return $this->morphMany('App\Models\Quiz', 'quizzesable');
    }
    */
    //terminan pruebas
}
