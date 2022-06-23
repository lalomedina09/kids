<?php

namespace App\Models\Presenters;

class MaterialPresenter extends Presenter
{
    /**
     * @return string
     */
    public function icon() : string
    {
        return "/images/education/{$this->model->type}.svg";
    }
}
