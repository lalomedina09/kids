<?php

namespace App\Models\Presenters;

class CoursePresenter extends Presenter
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
    public function event_date() : string
    {
        return $this->date($this->model->start_event);
    }

    /**
     * @return string
     */
    public function readable_event_date() : string
    {
        return $this->humanDate($this->model->start_event);
    }

    /**
     * @return string
     */
    public function end_date() : string
    {
        return $this->readableDate($this->model->end_event);
    }

    /**
     * @return string
     */
    public function term_date() : string
    {
        if ($this->readableDate($this->model->start_event) === $this->readableDate($this->model->end_event)) {
            return $this->readableDate($this->model->start_event).' '.$this->simpleTime($this->model->start_event).' a '.$this->simpleTime($this->model->end_event);
        }

        return $this->readableDate($this->model->start_event).' '.$this->simpleTime($this->model->start_event).' a '.$this->readableDate($this->model->end_event).' '.$this->simpleTime($this->model->end_event);
    }

    /**
     * Return the name of associated the category.
     *
     * @return string
     */
    public function category() : string
    {
        return $this->model->category->name;
    }

    /**
     * Return the full url for the article.
     *
     * @return string
     */
    public function url() : string
    {
        return route('courses.show', ['course' => $this->model->slug]);
    }

    /**
     * @return string
     */
    public function published_at() : string
    {
        return $this->readableDate($this->model->published_at);
    }

    /**
     * @return mixed
     */
    public function thumbnail()
    {
        return $this->image(
            $this->model->getFirstMedia('featured_image'), 350, 350
        );
    }

    /**
     * @return mixed
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

    /**
     * @return mixed
     */
    public function slider_image()
    {
        return $this->image(
            $this->model->getFirstMedia('slider_image'), 1500, 600
        );
    }

    /**
     * @return mixed
     */
    public function thumbnail_image()
    {
        return $this->image(
            $this->model->getFirstMedia('thumbnail_image'), 500, 500
        );
    }

    /**
     * @return string
     */
    public function action() : string
    {
        return ($this->model->category->code == 'companies') ? 'Más información' : 'Inscribirme';
    }
}
