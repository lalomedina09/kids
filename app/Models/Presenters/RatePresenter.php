<?php

namespace App\Models\Presenters;

class RatePresenter extends Presenter
{
    use DatesPresenter;

     /**
      * @return string
      */
    public function comment() : string
    {
        return $this->model->getWithFormat('comment', ['clean', 'purify']);
    }

}
