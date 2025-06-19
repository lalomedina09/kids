<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo, MorphTo };
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Contracts\Models\Likeable;
use App\Helpers\InteractableCode;
use App\Models\Traits\Morphable;

use Exception;

class Like extends Model
{

    use Morphable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'likes';

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'likeable_id' => 'integer'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'likeable'
    ];

    /**
     * Morph field
     *
     * @var string
     */
    const MORPH_FIELD = 'likeable_type';

    /*
    |--------------------------------------------------------------------------
    | Static methods
    |--------------------------------------------------------------------------
    */

    /**
     * Validate likeable code
     *
     * @param  string  $code
     * @return App\Contracts\Models\Likeable
     */
    public static function validateLikeableCode($code)
    {
        list($hashid, $morph_class, $timestamp) = InteractableCode::decode($code);
        $class = self::translateMorphKey($morph_class);
        if (!class_exists($class) || !(new $class instanceof Likeable)) {
            throw new Exception("Class {$class} does not implements App\Contracts\Models\Likeable contract");
        }
        return $class::byHashid($hashid)->first();
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function likeable()
    {
        return $this->morphTo();
    }

    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
