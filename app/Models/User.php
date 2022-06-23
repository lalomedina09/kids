<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Mail\Auth\Mailer;
use App\Models\Presenters\UserPresenter;
use App\Models\Traits\{ Hashable, Metadatable, Presentable, TranslatesDates };

use QD\Advice\Models\Traits\AdviceUserTrait;
use QD\Comm\Models\Traits\CommUserTrait;
use QD\Marketplace\Models\Traits\OrderUserTrait;

use Spatie\MediaLibrary\HasMedia\{ HasMedia, HasMediaTrait };
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{

    use Notifiable, SoftDeletes;
    use HasMediaTrait, HasRoles;
    use Hashable, Presentable, TranslatesDates;
    use Metadatable;

    use AdviceUserTrait;
    use CommUserTrait;
    use OrderUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'first_login', 'last_login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'metadata'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'email_verified_at', 'first_login', 'last_login', 'deleted_at'
    ];

    /**
     * The attributes that should be cast to native types.
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
        'hashid', 'full_name', 'profile_key', 'profile_photo_url'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'metadata', 'calendar'
    ];

    /**
     * The model presenter full class path.
     *
     * @var string
     */
    protected $presenter = UserPresenter::class;

    /**
     * Metadata class
     *
     * @var string
     */
    protected $meta_class = UserMetadata::class;

    /**
     * Profile roles
     *
     * @var string
     */
    const PROFILE_ROLES = [
        'author', 'advisor'
    ];

    /**
     * Payment roles
     *
     * @var string
     */
    const PAYMENT_ROLES = [
        'advisor'
    ];

    /**
     * Morph class
     *
     * @var string
     */
    const MORPH_CLASS = 'user';

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Fullname accessor
     *
     * @return void
     */
    public function getFullnameAttribute()
    {
        $fullname = "{$this->name} {$this->last_name}";
        return ucwords(strtolower(trim($fullname)));
    }

    /**
     * Profile key accessor
     *
     * @return void
     */
    public function getProfileKeyAttribute()
    {
        return ($this->hasMeta('blog', 'username')) ? $this->getMeta('blog', 'username') : $this->id;
    }

    /**
     * Profile photo accessor
     *
     * @return void
     */
    public function getProfilePhotoUrlAttribute()
    {
        return $this->present()->profile_photo;
    }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Include only users with guest profile permissions
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHasGuestProfile($query)
    {
        return $query->role(User::PROFILE_ROLES);
    }

    /**
     * Find a user by unique id or username metadata
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeByIdOrUsername($query, $key)
    {
        return $query->where('id', $key)
            ->orWhereHas('metadata', function ($meta_query) use ($key) {
                $meta_query->where('scope', 'blog')
                    ->where('key', 'username')
                    ->where('value', $key);
            });
    }

    /*
    |--------------------------------------------------------------------------
    | Static methods
    |--------------------------------------------------------------------------
    */

    /**
     * Return user valid interests
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getValidInterests()
    {
        $categories = Category::get('main');
        return $categories->pluck('children')->flatten();
    }

    /*
    |--------------------------------------------------------------------------
    | Public methods
    |--------------------------------------------------------------------------
    */

    /**
     * Send the password reset notification.
     *
     * @override \Illuminate\Auth\Passwords\CanResetPassword
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        Mailer::sendResetPasswordMail($this, $token);
    }

    /**
     * Get user categories from interests
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCategoriesFromInterests()
    {
        return $this->interests->each->parent->pluck('parent')->unique();
    }

    /**
     * Check if the user is a site administrator.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    /**
     * Check if the user has profile permissions.
     *
     * @return bool
     */
    public function hasProfileRoles()
    {
        return $this->hasAnyRole(User::PROFILE_ROLES);
    }

    /**
     * Check if the user has payment permissions.
     *
     * @return bool
     */
    public function hasPaymentRoles()
    {
        return $this->hasAnyRole(User::PAYMENT_ROLES);
    }


    // ---------- Media Collections ----------

    /**
     * Register the media collections.
     *
     * @return void
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('profile_photo')->singleFile();
    }

    /**
     * Save media file
     *
     * @param  \Illuminate\Http\UploadedFile
     * @return void
     */
    public function saveProfilePhoto($file)
    {
        $this->addMedia($file)->toMediaCollection('profile_photo', config('money.filesystem.disk'));
        $this->save();
    }

    /**
     * Sync relationships after update roles
     *
     * @return void
     */
    public function syncRolesRelationships()
    {
        $this->syncAdviceRolesRelationships(); // From AdviceUserTrait
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function interests()
    {
        return $this->belongsToMany(Category::class, 'interest_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function newsletter()
    {
        return $this->hasOne(Newsletter::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function exercises()
    {
        return $this->hasMany(ExerciseAnswer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function podcasts()
    {
        return $this->hasMany(Podcast::class, 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos()
    {
        return $this->hasMany(Video::class, 'author_id');
    }

}
