<?php

namespace App\Models;

use App\Models\Traits\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, hasOne, hasMany};
//use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use QD\QDPlay\Course;

class PlayBundleCourse extends Model
{
    use Presentable, SoftDeletes;

    protected $table = 'play_bundle_course';

    protected $fillable = [
        'id', 'course_id', 'course_bundle_id',
    ];

    protected $dates = [
        'updated_at', 'deleted_at'
    ];

    protected $guarded = [
        'id', 'course_id', 'course_bundle_id'
    ];

    public function course()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

    public function courseBundle()
    {
        // 'foreign_key' , 'local_key'
        return $this->hasOne(PlayCourseBundle::class, 'id', 'course_bundle_id');
    }
}
