<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{ Builder, Model, SoftDeletes };
use Illuminate\Database\Eloquent\Relations\{ HasMany, BelongsTo, BelongsToMany, MorphMany };

use Spatie\MediaLibrary\HasMedia\{ HasMedia, HasMediaTrait };

use App\Helpers\Helpers;
use App\Models\Presenters\CoursePresenter;
use App\Models\Traits\{ CourseWebinar, Excludable, Presentable, Publishable, Searchable, Sluggable, TranslatesDates };

use QD\Marketplace\Contracts\Orderable;
use QD\Marketplace\Models\Traits\OrderCourseTrait;

use Date;

class Course extends Model
    implements HasMedia, Orderable
{

    use SoftDeletes;
    use HasMediaTrait;
    use CourseWebinar;
    use Excludable, Presentable, Publishable, Searchable, Sluggable, TranslatesDates;
    use OrderCourseTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'subtitle', 'body', 'excerpt', 'category_id', 'city', 'venue', 'address', 'enrollment_url', 'webinar_id', 'webinar_password', 'price', 'start_event', 'end_event', 'published_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at', 'start_event', 'end_event', 'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'featured' => 'boolean',
        'price' => 'decimal:2',
        'online_sell' => 'boolean'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'event_date'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'media'
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
     * The model presenter
     *
     * @var string
     */
    protected $presenter = CoursePresenter::class;

    /**
     * Morph class
     *
     * @var string
     */
    const MORPH_CLASS = 'course';

    /*
    |--------------------------------------------------------------------------
    | Full text search
    |--------------------------------------------------------------------------
    */

    protected $searchable = [
        'title',
        'subtitle',
        'excerpt'
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * @used-by \App\Models\Course::$appends
     * @return string
     */
    protected function getEventDateAttribute() : string
    {
        return $this->present()->event_date;
    }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    */

    /**
     * Mutate enrollment_url
     *
     * @return void
     */
    public function setEnrollmentUrlAttribute($value)
    {
        $this->attributes['enrollment_url'] = trim($value, '/');
    }

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Scope a query
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured(Builder $query) : Builder
    {
        return $query->where('featured', 1);
    }

    /*
    |--------------------------------------------------------------------------
    | Public methods
    |--------------------------------------------------------------------------
    */

    /**
     * @return string
     */
    public function getRouteKey() : string
    {
        return $this->slug;
    }

    /**
     * Return the model valid categories.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getCategories()
    {
        return Category::get('courses');
    }

   /**
     * Format and return SEO data
     *
     * @return \stdClass
     */
    public function seo()
    {
        return Helpers::toObject([
            'title' => $this->title,
            'description' => $this->present()->excerpt,
            'author' => 'Querido Dinero',
            'image' => $this->present()->thumbnail,
            'keywords' => null
        ]);
    }

    /**
     * Course is available
     *
     * @return boolean
     */
    public function isAvailable()
    {
        return ($this->start_event) ? $this->start_event->gt(Date::now()) : true;
    }

    /**
     * Online Enabled
     *
     * @return boolean
     */
    public function onlineSellEnabled()
    {
        return (
            $this->online_sell &&
            $this->isAvailable() &&
            ($this->enrollment_url || $this->webinar_id)
        );
    }

    // ---------- Media collections ----------

    /**
     * Register the media collections.
     *
     * @return void
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('featured_image')->singleFile();
        $this->addMediaCollection('slider_image')->singleFile();
        $this->addMediaCollection('thumbnail_image')->singleFile();
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

    /**
     * Save media file
     *
     * @param  \Illuminate\Http\UploadedFile
     * @return void
     */
    public function saveSliderImage($file)
    {
        $this->addMedia($file)->toMediaCollection('slider_image', config('money.filesystem.disk'));
        $this->save();
    }

    /**
     * Save media file
     *
     * @param  \Illuminate\Http\UploadedFile
     * @return void
     */
    public function saveThumbnailImage($file)
    {
        $this->addMedia($file)->toMediaCollection('thumbnail_image', config('money.filesystem.disk'));
        $this->save();
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function speakers() : BelongsToMany
    {
        return $this->belongsToMany(Speaker::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itineraries() : HasMany
    {
        return $this->hasMany(Itinerary::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materials() : HasMany
    {
        return $this->hasMany(Material::class);
    }

    /**
     * Scope a query to only include Business type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function content() : HasMany
    {
        return $this->materials()->where('type', '=', 'content');
    }

    /**
     * Scope a query to only include Business type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function extra() : HasMany
    {
        return $this->materials()->where('type', '!=', 'content');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function contacts() : MorphMany
    {
        return $this->morphMany(Contact::class, 'contactable');
    }
}
