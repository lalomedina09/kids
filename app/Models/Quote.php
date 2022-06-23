<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{ Model, SoftDeletes };

use App\Models\Traits\{ Presentable, TranslatesDates };

class Quote extends Model
{

    use SoftDeletes;
    use Presentable, TranslatesDates;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quotes';

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The model presenter full class path.
     *
     * @var string
     */
    protected $presenter = Presenters\QuotePresenter::class;

}
