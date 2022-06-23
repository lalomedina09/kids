<?php

namespace App\Models\Presenters;

class VideoPresenter extends Presenter
{
    use DatesPresenter, ImagesPresenter;

    /**
     * @return string
     */
    public function excerpt()
    {
        return $this->model->excerpt ?? $this->limit(strip_tags($this->model->body));
    }

    /**
     * Return the full url for the article.
     *
     * @return string
     */
    public function url() : string
    {
        return route('videos.show', [$this->model->slug]);
    }

    /**
     * Return the full url for the article.
     *
     * @return string
     */
    public function urlCategory() : string
    {
        return route('videos.category.index', [$this->model->category()->slug]);
    }

    /**
     * Return the full url for the article.
     *
     * @return string
     */
    public function iframe() : string
    {
        return $this->model->video_id != '' ? '<div class="youtube" data-embed="'.$this->model->video_id.'"><div class="play-button"></div></div>' : '';
    }

    /**
     * Return the name of associated the category.
     *
     * @return string
     */
    public function category() : string
    {
        return $this->model->category() ? $this->model->category()->name : '-';
    }

    /**
     * @return string
     */
    public function published_at() : string
    {
        return $this->readabledate($this->model->published_at);
    }

    /**
     * @return mixed
     */
    public function featured_image()
    {
        return $this->image(
            $this->model->getFirstMedia('featured_image'), 350, 350
        );
    }

    /**
     * @return mixed
     */
    public function slider_image()
    {
        return $this->image(
            $this->model->getFirstMedia('featured_image'), 1110, 600
        );
    }
}
