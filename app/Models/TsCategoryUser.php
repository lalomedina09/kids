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
        'name', 'percent'
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
