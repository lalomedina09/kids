<?php

namespace App\Repositories;

use \Illuminate\Http\UploadedFile;

use App\Jobs\SaveUploadedPodcast;
use App\Models\Podcast;

class PodcastRepository
{
    /**
     * Save podcast on storage
     *
     * @param  array  $params
     * @param  \App\Models\Podcast  $podcast
     * @return \App\Models\Podcast
     */
    public function save($params, Podcast $podcast=null) : Podcast
    {
        $podcast = ($podcast) ?: new Podcast;

        $podcast->fill($params);
        $podcast->save();

        $podcast->categories()->sync($params['categories']);
        if (array_has($params, 'tags')) {
            $podcast->saveTags($params['tags']);
        }

        if (array_has($params, 'featured_image')
            && $params['featured_image'] instanceof UploadedFile
            && $file = $params['featured_image']) {
                $podcast->saveFeaturedImage($file);
        }

        if (array_has($params, 'audio_file')
            && $params['audio_file'] instanceof UploadedFile
            && $file = $params['audio_file']) {
                SaveUploadedPodcast::dispatch($podcast, $params['audio_file']);
        }

        return $podcast;
    }
}
