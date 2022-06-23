<?php

namespace App\Models\Presenters;

class ItineraryPresenter extends Presenter
{
    use DatesPresenter;

    /**
     * @return string
     */
    public function start() : string
    {
        return $this->simpleTime($this->model->start);
    }

    /**
     * @return string
     */
    public function end() : string
    {
        return $this->simpleTime($this->model->end);
    }
}
