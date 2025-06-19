<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Traits\Morphable;

use Exception;

class Quiz extends Model
{

    use Morphable, SoftDeletes;

    protected $table = 'quizzes';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'title', 'type', 'comments', 'image'
    ];

    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    protected $casts = [
        //'user_id' => 'integer',
        'quizzesable_id' => 'integer'
    ];

    protected $with = [
        'quizzesable'
    ];

    const MORPH_FIELD = 'quizzesable_type';

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function quizzesable()
    {
        return $this->morphTo();
    }

    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /*
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }*/

    public function questions()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasMany(QzQuestion::class, 'quiz_id', 'id');
    }
}
