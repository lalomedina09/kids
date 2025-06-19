<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
class SocialPost extends Model
{
    use SoftDeletes;

    protected $table = 'social_post';

    protected $fillable = [
        'red_social', 'type', 'code', 'site', 'site', 'description'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];
}
