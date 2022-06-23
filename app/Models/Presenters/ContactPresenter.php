<?php

namespace App\Models\Presenters;

class ContactPresenter extends Presenter
{
    /**
     * @return string
     */
    public function type()
    {
        return $this->model->type == 'mail' ? 'envelope-o' : $this->model->type;
    }

    /**
     * @return string
     */
    public function address()
    {
        if ($this->model->type == 'mail') {
            return 'mailto:'.$this->model->address;
        } else if ($this->model->type == 'phone') {
            return 'tel:'.$this->model->address;
        } else if ($this->model->type == 'skype') {
            return '#'.$this->model->address;
        }

        return $this->model->address;
    }
}
