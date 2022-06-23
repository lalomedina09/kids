<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{ Model, SoftDeletes };

use App\Models\Presenters\PagePresenter;
use App\Models\Traits\{ Presentable, Sluggable, TranslatesDates };

class Page extends Model
{

    use SoftDeletes;
    use Presentable, Sluggable, TranslatesDates;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
    ];

    /**
     * Define the sluggable model-specific configurations.
     *
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'title',
        'save_to' => 'slug',
        'mutable' => false
    ];

    /**
     * The model presenter full class path.
     *
     * @var string
     */
    protected $presenter = PagePresenter::class;

}
