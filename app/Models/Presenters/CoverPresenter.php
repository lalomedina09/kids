<?php

namespace App\Models\Presenters;

class CoverPresenter extends Presenter
{
    use ImagesPresenter;

    /**
     * @return string
     */
    public function featured_image($width = 600, $height = 600, $mono = false)
    {
        $image_url = $this->image(
            $this->model->getFirstMedia('featured_image'), $width, $height
        );
        return ($mono) ? $image_url . '&mono=999' : $image_url;
    }

    /**
     * @return string
     */
    public function thumbnail()
    {
        return $this->image(
            $this->model->getFirstMedia('featured_image'), 350, 350
        );
    }

    /**
     * @return string
     */
    public function color()
    {
        $colors = [
            'red'   => 'ff6161', 'blue'      => '3081d4', 'yellow' => 'fdce56',
            'green' => '80c784', 'purple'    => '8079b8', 'pink'   => 'e66ead',
            'gray'  => '323536', 'turquoise' => '4fd7db', 'orange' => 'edac66'
        ];
        return (array_key_exists($this->model->color, $colors)) ? $colors[$this->model->color] : $colors['red'];
    }
}
