<?php

namespace App\Models\Presenters;

class ArticlePresenter extends Presenter
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
     * @return string
     */
    public function published_at() : string
    {
        return $this->readableDate($this->model->published_at);
    }

    /**
     * @return string
     */
    public function short_published_at() : string
    {
        return $this->shortDate($this->model->published_at);
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
    public function thumbnail()
    {
        return $this->image(
            $this->model->getFirstMedia('featured_image'), 500, 500
        );
    }

    /**
     * @return string
     */
    public function rectangular_thumbnail()
    {
        return $this->image(
            $this->model->getFirstMedia('featured_image'), 352, 254
        );
    }

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
     * Return the full url for the article.
     *
     * @return string
     */
    public function url() : string
    {
        return route('articles.show', [$this->model->id]);
    }

    /**
     * Return the full url for the article.
     *
     * @return string
     */
    public function urlCategory() : string
    {
        return route('articles.category.index', [$this->model->category_id]);
    }
}
