<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{ Model, SoftDeletes };
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Spatie\MediaLibrary\HasMedia\{ HasMedia, HasMediaTrait };

use App\Models\Presenters\CoverPresenter;
use App\Models\Traits\Presentable;

class Cover extends Model implements HasMedia
{

    use Presentable, SoftDeletes, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'url', 'color', 'category_id', 'position'
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
     * The model presenter
     *
     * @var string
     */
    protected $presenter = CoverPresenter::class;

    /**
     * Morph class
     *
     * @var string
     */
    const MORPH_CLASS = 'cover';

    /*
    |--------------------------------------------------------------------------
    | Static methods
    |--------------------------------------------------------------------------
    */

    /**
     * Find cover by position.
     *
     * @param  integer  $position
     * @return \App\Models\Cover $cover
     */
    public static function findByPosition($position)
    {
        return Cover::wherePosition($position)->first();
    }

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Define shown scope.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeShown($query)
    {
        return $query->where('position', '<=', 6)->where('position', '>', 0);
    }

    /**
     * Define hidden scope.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHidden($query)
    {
        return $query->whereRaw('covers.position NOT IN (1,2,3,4,5,6)')->orWhereNull('covers.position');
    }

    /*
    |--------------------------------------------------------------------------
    | Public methods
    |--------------------------------------------------------------------------
    */

    /**
     * Remove cover's position.
     *
     * @return bool true
     */
    public function removePosition()
    {
        return $this->update(['position' => null]);
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
