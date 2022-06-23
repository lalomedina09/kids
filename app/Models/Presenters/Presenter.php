<?php

namespace App\Models\Presenters;

use Illuminate\Support\Str;

abstract class Presenter
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function setModel($model) : void
    {
        $this->model = $model;
    }

    /**
     * Allow for property-style retrieval.
     *
     * @param  $property
     * @return mixed
     */
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return $this->model->{$property};
    }

    /**
     * Provide compatibility for the 'or' syntax in blade templates.
     *
     * @param  $property
     * @return bool
     */
    public function __isset($property)
    {
        return method_exists($this, $property);
    }

    /**
     * Limit the number of characters in a string.
     *
     * @param  string  $value
     * @param  int  $limit
     * @param  string  $end
     * @return string
     */
    protected function limit($value, $limit = 150, $end = '...') : string
    {
        return Str::limit($value, $limit, $end);
    }
}
