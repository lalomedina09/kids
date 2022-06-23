<?php

namespace App\Models\Presenters;

use Date;

class UserPresenter extends Presenter
{
    use DatesPresenter, ImagesPresenter;

    /**
     * @return string
     */
    public function name()
    {
        return ucwords(strtolower(trim($this->model->name)));
    }

    /**
     * @return string
     */
    public function full_name()
    {
        return $this->model->fullname;
    }

    /**
     * @return string
     */
    public function age()
    {
        return $this->model->hasMeta('blog', 'birthdate')
            ? $this->model->getMeta('blog', 'birthdate')->age
            : '-';
    }

    /**
     * @return string
     */
    public function job()
    {
        return $this->model->hasMeta('blog', 'job')
            ? $this->model->getMeta('blog', 'job')
            : '-';    }

    /**
     * @return string
     */
    public function state()
    {
        return $this->model->hasMeta('blog', 'state')
            ? $this->model->getMeta('blog', 'state')
            : '-';
    }

    /**
     * @return string
     */
    public function birthdate()
    {
        return $this->model->hasMeta('blog', 'birthdate')
            ? $this->date($this->model->getMeta('blog', 'birthdate'))
            : '-';
    }

    /**
     * @return string
     */
    public function gender()
    {
        switch ($this->model->getMeta('blog', 'gender')) {
            case 'female':
                return 'Mujer';

            case 'male':
                return 'Hombre';

            default:
                return 'Otro';
        }
    }

    /**
     * @return string
     */
    public function first_login()
    {
        return $this->date($this->model->first_login);
    }

    /**
     * @return string
     */
    public function last_login()
    {
        return $this->date($this->model->last_login);
    }

    /**
     * @return string
     */
    public function canceled()
    {
        if (!$this->model->deleted_at) {
            return '—';
        }

        return 'Si';
    }

    /**
     * @return string
     */
    public function avatar()
    {
        $hash = md5(strtolower(trim($this->model->email)));

        return "https://www.gravatar.com/avatar/{$hash}?s=20&d=mm";
    }

    /**
     * @return mixed
     */
    public function profile_photo()
    {
        return $this->image(
            $this->model->getFirstMedia('profile_photo'), 200, 200
        );
    }

    /**
     * @return mixed
     */
    public function author_photo()
    {
        $image_url = $this->image(
            $this->model->getFirstMedia('profile_photo'), 800, 800
        );
        $glue = (str_contains($image_url, '?')) ? '&' : '?';
        return ($this->model->hasProfileRoles()) ? "{$image_url}{$glue}mono=999" : $image_url;
    }
}
