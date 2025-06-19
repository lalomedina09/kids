<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\{ Presentable, TranslatesDates };

class Itinerary extends Model
{
    use Presentable, TranslatesDates;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'course_id',
        'start',
        'end',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start', 'end'];

    /**
     * The model presenter full class path.
     *
     * @var string
     */
    protected $presenter = Presenters\ItineraryPresenter::class;

    /*
    |--------------------------------------------------------------------------
    | Eloquent Model Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Define a one-to-many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course() : BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
