<?php

namespace App\Models\Presenters;

class SpeakerPresenter extends Presenter
{
    use ImagesPresenter;

    /**
     * @return string
     */
    public function featured_image()
    {
        return $this->image(
            $this->model->getFirstMedia('featured_image'), 1500, 600
        );
    }

    /**
     * @return mixed
     */
    public function primary_image()
    {
        return $this->image(
            $this->model->getFirstMedia('featured_image'), 450, 450
        );
    }
}
