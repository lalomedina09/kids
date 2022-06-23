<?php

namespace App\Repositories;

use \Illuminate\Http\UploadedFile;

use App\Models\Course;

class CourseRepository
{
    /**
     * Save course on storage
     *
     * @param  array  $params
     * @param  \App\Models\Course  $course
     * @return \App\Models\Course
     */
    public function save($params, Course $course=null) : Course
    {
        $course = ($course) ?: new Course;
        $course->fill($params);
        $course->featured = (array_has($params, 'featured') && $params['featured']);
        $course->online_sell = (array_has($params, 'online_sell') && $params['online_sell']);
        $course->save();

        if (array_has($params, 'featured_image')
            && $params['featured_image'] instanceof UploadedFile
            && $file = $params['featured_image']) {
                $course->saveFeaturedImage($file);
        }

        if (array_has($params, 'slider_image')
            && $params['slider_image'] instanceof UploadedFile
            && $file = $params['slider_image']) {
                $course->saveSliderImage($file);
        }

        if (array_has($params, 'thumbnail_image')
            && $params['thumbnail_image'] instanceof UploadedFile
            && $file = $params['thumbnail_image']) {
                $course->saveThumbnailImage($file);
        }

        return $course;
    }
}
