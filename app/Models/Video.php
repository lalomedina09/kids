<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{ Model, SoftDeletes };
use Illuminate\Database\Eloquent\Relations\{ BelongsTo, MorphToMany };

use Spatie\MediaLibrary\HasMedia\{ HasMedia, HasMediaTrait };

use App\Contracts\Models\{ Bookmarkable, Likeable, Viewable };
use App\Helpers\Helpers;
use App\Models\Presenters\VideoPresenter;
use App\Models\Traits\{ Bookmarkable as BookmarkTrait, Likeable as LikeTrait, Viewable as ViewTrait };
use App\Models\Traits\{ Authorable, Categorizable, Hashable, Interactable, Searchable, Taggable };
use App\Models\Traits\{ Excludable, Presentable, Publishable, Sluggable, TranslatesDates };

class Video extends Model
            implements Bookmarkable, HasMedia, Likeable, Viewable
{

    use HasMediaTrait, SoftDeletes;
    use BookmarkTrait, LikeTrait, ViewTrait;
    use Authorable, Categorizable, Hashable, Interactable, Searchable, Taggable;
    use Excludable, Presentable, Publishable, Sluggable, TranslatesDates;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'url', 'body', 'excerpt', 'author_id', 'published_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at', 'deleted_at'
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
     * The model presenter full class path.
     *
     * @var string
     */
    protected $presenter = VideoPresenter::class;

    /**
     * Morph class
     *
     * @var string
     */
    const MORPH_CLASS = 'video';

    /*
    |--------------------------------------------------------------------------
    | Categorizable trait
    |--------------------------------------------------------------------------
    */

    const CATEGORIES_CLASS = 'main';

    /*
    |--------------------------------------------------------------------------
    | Full text search
    |--------------------------------------------------------------------------
    */

    protected $searchable = [
        'title',
        'excerpt'
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessor
    |--------------------------------------------------------------------------
    */

    /**
     * @return void
     */
    public function getVideoIdAttribute()
    {
        $value = $this->url;
        if (!is_null($value)) {
            $query = parse_url($value, PHP_URL_QUERY);
            if (!is_null($query)) {
                parse_str($query, $q);
                return array_has($q, 'v') ? $q['v'] : null;
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Public methods
    |--------------------------------------------------------------------------
    */

    /**
     * Format and return SEO data
     *
     * @return \stdClass
     */
    public function seo()
    {
        $keywords = $this->categories->map(function ($category) {
            return $category->name;
        })->all();

        $keywords = ($keywords) ? implode(',', $keywords) : null;

        return Helpers::toObject([
            'title' => $this->present()->title,
            'description' => $this->present()->excerpt,
            'author' => $this->author->present()->fullname,
            'image' => $this->present()->featured_image,
            'keywords' => $keywords
        ]);
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
}
