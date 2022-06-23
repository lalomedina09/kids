<?php

namespace App\Repositories;

use \Illuminate\Http\UploadedFile;

use App\Models\Video;

class VideoRepository
{
    /**
     * Save video on storage
     *
     * @param  array  $params
     * @param  \App\Models\Video  $video
     * @return \App\Models\Video
     */
    public function save($params, Video $video=null) : Video
    {
        $video = ($video) ?: new Video;

        $video->fill($params);
        $video->save();

        $video->categories()->sync($params['categories']);
        if (array_has($params, 'tags')) {
            $video->saveTags($params['tags']);
        }

        if (array_has($params, 'featured_image')
            && $params['featured_image'] instanceof UploadedFile
            && $file = $params['featured_image']) {
                $video->saveFeaturedImage($file);
        }

        return $video;
    }
}
