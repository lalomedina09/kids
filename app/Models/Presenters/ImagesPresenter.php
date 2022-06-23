<?php

namespace App\Models\Presenters;

use Spatie\MediaLibrary\Models\Media;

trait ImagesPresenter
{
    /**
     * @param  \Spatie\MediaLibrary\Models\Media|null  $image
     * @param  int  $width
     * @param  int  $height
     * @return string
     */
    public function image(?Media $image, int $width, int $height = null) : string
    {
        if (is_null($image)) {
            return $this->placeholder($width, $height);
        }

        if ($image->disk === 's3') {
            return $this->imgix($image->getUrl(), $width, $height);
        }

        return $image->getUrl();
    }

    /**
     * @param  int  $width
     * @param  int  $height
     * @return string
     */
    protected function placeholder(int $width, int $height = null) : string
    {
        $choice = array_random(['red', 'blue', 'green', 'orange']);
        return "https://www.queridodinero.com/images/background/{$choice}.png";
    }

    /**
     * @link http://imgix.com/docs
     *
     * @param  string  $url
     * @param  int  $width
     * @param  int  $height
     * @return string
     */
    protected function imgix(string $url, int $width, int $height = null) : string
    {
        if (is_null($height)) {
            return "{$url}?w={$width}&fit=crop&crop=faces&auto=format,compress&lossless=1";
        }

        return "{$url}?w={$width}&h={$height}&fit=crop&crop=faces&auto=format,compress&lossless=1";
    }
}
