<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\{BelongsTo, MorphToMany};


use Carbon\Carbon;

class ArticleAdvertising extends Model

{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'articles_advertising';

    protected $guarded = [
        'id',
        'article_id',
        'updated_by'
    ];

    protected $fillable = [
        'article_id',
        'updated_by',
        'cover_desktop',
        'cover_movil',
        'published_at',
        'published_at_expired',
        'updated_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
        'updated_at',
        'deleted_at'
    ];


}

