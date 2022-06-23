<?php

namespace App\Models\Presenters;

class PodcastPresenter extends Presenter
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
        return route('podcasts.show', [$this->model->slug]);
    }

    /**
     * Return the full url for the article.
     *
     * @return string
     */
    public function urlCategory() : string
    {
        return route('podcasts.category.index', [$this->model->category()->slug]);
    }

    /**
     * Return the full url for the article.
     *
     * @return string
     */
    public function audio() : string
    {
        return $this->model->path != '' ? '<audio class="w-100" controls preload="none"><source src="'.$this->model->path.'">Your browser does not support the audio element.</audio>' : '';
    }

    /**
     * Return the full url for the article.
     *
     * @return string
     */
    public function video() : string
    {
        return $this->model->video_id != '' ? '<div class="youtube" data-embed="'.$this->model->video_id.'"><div class="play-button"></div></div>' : '';
    }

    /**
     * Return the full url for the article.
     *
     * @return string
     */
    public function iframe() : string
    {
        return $this->model->path != '' ? $this->model->present()->audio() : $this->model->present()->video();
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
        return $this->readableDate($this->model->published_at);
    }

    /**
     * @return string
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
