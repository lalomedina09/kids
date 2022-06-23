<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{ Model, SoftDeletes };
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Spatie\MediaLibrary\HasMedia\{ HasMedia, HasMediaTrait };

use App\Models\Presenters\SpeakerPresenter;
use App\Models\Traits\{ Presentable, Sluggable, TranslatesDates };

class Speaker extends Model implements HasMedia
{

    use HasMediaTrait, Presentable, Sluggable, SoftDeletes, TranslatesDates;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'profession', 'job', 'bio'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * Define the sluggable model-specific configurations.
     *
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
    ];

    /**
     * The model presenter full class path.
     *
     * @var string
     */
    protected $presenter = SpeakerPresenter::class;

    /**
     * Morph class
     *
     * @var string
     */
    const MORPH_CLASS = 'speaker';

    /*
    |--------------------------------------------------------------------------
    | Public methods
    |--------------------------------------------------------------------------
    */

    // ---------- Media collections ----------

    /**
     * Register the media collections.
     *
     * @return void
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('featured_image')->singleFile();
    }

    /**
     * Save media file
     *
     * @param  \Illuminate\Http\UploadedFile
     * @return void
     */
    public function saveFeaturedImage($file)
    {
        $this->addMedia($file)->toMediaCollection('featured_image', config('money.filesystem.disk'));
        $this->save();
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses() : BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }
}
