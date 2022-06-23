<?php

namespace App\Helpers;

class EmbedVideo
{
    /**
     * Return the embed html code of the video
     *
     * @param  string $video_url
     * @return string
     */
    public static function getEmbedVideoCode($video_url)
    {
        $video_params = self::parseVideoUrl($video_url);
        if (!$video_params) {
            return null;
        }

        $player = ($video_params['provider'] === 'youtube') ? 'www.youtube.com/embed' : 'player.vimeo.com/video';
        $code = $video_params['code'];
        return <<<EMBED
<div class="embed-responsive embed-responsive-16by9">
    <iframe src="//{$player}/{$code}"
        width="640" height="480"
        class="embed-responsive-item"
        frameborder="0"
        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>
    </iframe>
</div>
EMBED;
    }

    /*
    ==================================================
    STATIC FUNCTIONS
    ==================================================
    */

    /**
     * Parse the video url and obtains the provider and
     * video code
     *
     * @param string $video_url
     * @return array|boolean
     */
    public static function parseVideoUrl($video_url)
    {
        /*
            Regex matches:
            $matches[0] = Full URL
            $matches[1] = http or https
            $matches[2] = www. or empty
            $matches[3] = domain (youtube.com, youtu.be, vimeo.com)
            $matches[4] = be.com or .be, vimeo empty
            $matches[5] = watch?v= on youtube, empty on vimeo
            $matches[6] = video id
        */
        $matches = [];
        preg_match(env('VIDEO_URL_REGEX', ""), $video_url, $matches);
        if (empty($matches)) {
            return null;
        }

        $provider = $matches[3];
        if ($provider === 'youtu.be' || $provider === 'youtube.com') {
            $provider = 'youtube';
        } elseif ($provider === 'vimeo.com') {
            $provider = 'vimeo';
        } else {
            return null;
        }

        return  [
            'url' => $matches[0],
            'code' => $matches[6],
            'provider' => $provider
        ];
    }
}
