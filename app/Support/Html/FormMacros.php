<?php

namespace App\Support\Html;

use Collective\Html\FormBuilder as Form;

use Date;

class FormMacros
{
    /**
     * Register any form macros.
     */
    public function mapFormMacros()
    {
        /*
         * Create a form input field.
         *
         * @param  string  $value
         * @param  array   $options
         * @return string
         */
        Form::macro('publishedAt', function ($value = null, $options = []) {
            return Form::input('datetime', 'published_at', $value ?? Date::now(), $options);
        });

        /*
         * Create a delete form.
         *
         * @param  string  $value
         * @param  array   $options
         * @return string
         */
        Form::macro('delete', function ($value = null, $options = []) {
            $result = $this->open(array_merge(['method' => 'DELETE', 'class' => 'd-inline'], $options));
            $result .= $this->submit($value, ['class' => 'btn btn-sm btn-outline-danger']);
            $result .= $this->close();

            return $result;
        });

        /*
         * Create a delete form.
         *
         * @param  string  $value
         * @param  array   $options
         * @return string
         */
        Form::macro('restore', function ($value = null, $options = []) {
            $result = $this->open(array_merge(['method' => 'POST', 'class' => 'd-inline'], $options));
            $result .= $this->submit($value, ['class' => 'btn btn-sm btn-outline-success']);
            $result .= $this->close();

            return $result;
        });

        /*
         * Create select author input
         *
         * @param  string  $name
         * @param  string  $value
         * @param  array  $options
         * @return string
         */
        Form::macro('selectAuthor', function ($name, $selected = null, $options = []) {
            $list = \App\Models\User::whereHas('roles', function ($query) {
                $query->where('name', 'author');
            })
            ->orderBy('name')
            ->get()
            ->pluck('full_name', 'id');

            return Form::select($name, $list, $selected, $options);
        });

        /**
         * @param  string  $name
         * @param  string|null  $selected
         * @param  array  $attributes
         * @return \Illuminate\Support\HtmlString
         */
        Form::macro('selectColor', function ($name, $selected = null, $options = []) {
            $colors = [
                'red' => 'Rojo',
                'blue' => 'Azul',
                'yellow' => 'Amarillo',
                'green' => 'Verde',
                'purple' => 'Morado',
                'pink' => 'Rosa',
                'gray' => 'Gris',
                'turquoise' => 'Turquesa',
                'orange' => 'Naranja'
            ];

            return Form::select($name, $colors, $selected, $options);
        });
    }
}
