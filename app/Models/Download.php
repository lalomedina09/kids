<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\{ HasMedia, HasMediaTrait };

use App\Models\Traits\Sluggable;

use Exception;

class Download extends Model
               implements HasMedia
{

    use HasMediaTrait;
    use Sluggable;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'downloads';

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
        'name', 'description'
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
        'build_from' => 'name',
        'save_to' => 'slug',
    ];

    /**
     * Morph class
     *
     * @var string
     */
    const MORPH_CLASS = 'download';

    /**
     * Mime type guesses by extension
     *
     * @var array $mimes
     */
    public static $mimes = [
        // Documents
        'application/msword' => 'fa-file-word-o',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'fa-file-word-o',
        'application/vnd.ms-excel' => 'fa-file-excel-o',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'fa-file-excel-o',
        'application/vnd.ms-powerpoint' => 'fa-file-pdf-o',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'fa-file-pdf-o',
        'application/pdf' => 'fa-file-pdf-o',
        // Images
        'image/jpeg' => 'fa-file-image-o',
        'image/png' => 'fa-file-image-o',
        'image/gif' => 'fa-file-image-o',
        'image/bmp' => 'fa-file-image-o',
        'image/svg+xml' => 'fa-file-image-o',
        // Audio
        'audio/aac' => 'fa-file-audio-o',
        'audio/mp4' => 'fa-file-audio-o',
        'audio/mpeg' => 'fa-file-audio-o',
        'audio/ogg' => 'fa-file-audio-o',
        'audio/wav' => 'fa-file-audio-o',
        'audio/x-ms-wma' => 'fa-file-audio-o',
        // Video
        'video/3gpp' => 'fa-file-video-o',
        'video/ogg' => 'fa-file-video-o',
        'video/x-msvideo' => 'fa-file-video-o',
        'video/quicktime' => 'fa-file-video-o',
        'video/x-ms-wmv' => 'fa-file-video-o',
        'video/mp4' => 'fa-file-video-o',
        'video/x-flv' => 'fa-file-video-o',
        'video/webm' => 'fa-file-video-o',
        // Misc
        'text/plain' => 'fa-file-text-o',
        'application/zip' => 'fa-file-zip-o'
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getPayloadAttribute()
    {
        return $this->getFirstMedia('downloads');
    }

    public function getLinkAttribute()
    {
        return route('downloads.download', [$this->slug]);
    }

    public function getIconAttribute()
    {
        if (!array_has(self::$mimes, $this->payload->mime_type)) {
            return 'fa-file-o';
        }
        return self::$mimes[$this->payload->mime_type];
    }

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
        $this->addMediaCollection('payload')
            ->singleFile()
            ->acceptsFile(function (File $file) {
                return in_array($file->mimeType, array_keys(self::$mimes));
            });
    }

    /**
     * Save media file
     *
     * @param  \Illuminate\Http\UploadedFile
     * @return void
     */
    public function savePayload($file)
    {
        $this->addMedia($file)->toMediaCollection('downloads', config('money.filesystem.disk'));
        $this->save();
    }
}
