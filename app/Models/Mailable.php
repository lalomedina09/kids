<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\{ Morphable, TranslatesDates };

class Mailable extends Model
{

    use Morphable, TranslatesDates;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mailables';

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
        //
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        //
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        //
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        //
    ];

    /**
     * Default values for attributes
     *
     * @var array
     */
    protected $attributes = [
        //
    ];

    /**
     * Morph field
     *
     * @var string
     */
    const MORPH_FIELD = 'mailable_type';

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function mailable()
    {
        return $this->morphTo();
    }

}
