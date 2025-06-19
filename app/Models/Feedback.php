<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, MorphTo};
use Illuminate\Database\Eloquent\SoftDeletes;

//use App\Contracts\Models\Bookmarkable;
//use App\Helpers\InteractableCode;
use App\Models\Traits\Morphable;

use Exception;

class Feedback extends Model
{

    use Morphable, SoftDeletes;

    protected $table = 'feedbacks';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'comments'
    ];

    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    protected $casts = [
        //'user_id' => 'integer',
        'feedbacksable_id' => 'integer'
    ];

    protected $with = [
        'feedbacksable'
    ];

    const MORPH_FIELD = 'feedbacksable_type';

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function feedbacksable()
    {
        return $this->morphTo();
    }

}
