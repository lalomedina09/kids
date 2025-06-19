<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{ Model, SoftDeletes };

use App\Helpers\InteractableCode;
use App\Models\Presenters\RatePresenter;
use App\Models\Traits\{ Formatable, Morphable, Presentable, TranslatesDates };

use Exception;

class Rate extends Model
{
    use SoftDeletes;
    use Formatable, Morphable, Presentable, TranslatesDates;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rates';

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
    protected $fillable = [
        'title', 'comment', 'rate'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'rate' => 'integer',
        'user_id' => 'integer',
        'rateable_id' => 'integer'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'rateable'
    ];

    /**
     * The model presenter
     *
     * @var string
     */
    protected $presenter = RatePresenter::class;

    /**
     * Morph field
     *
     * @var string
     */
    const MORPH_FIELD = 'rateable_type';

    /*
    |--------------------------------------------------------------------------
    | Static methods
    |--------------------------------------------------------------------------
    */

    /**
     * Validate rateable code
     *
     * @param  string  $code
     * @return App\Contracts\Models\Rateable
     */
    public static function validateRateableCode($code)
    {
        list($hashid, $morph_class, $timestamp) = InteractableCode::decode($code);
        $class = self::translateMorphKey($morph_class);
        if (!class_exists($class) || !(new $class instanceof Rateable)) {
            throw new Exception("Class {$class} does not implements App\Contracts\Models\Rateable contract");
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
    public function rateable()
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
