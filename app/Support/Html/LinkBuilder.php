<?php

namespace App\Support\Html;

use Collective\Html\HtmlBuilder;
use Illuminate\Support\HtmlString;
use Collective\Html\FormFacade as Form;
use Collective\Html\HtmlFacade as Html;

class LinkBuilder extends HtmlBuilder
{
    /**
     * Generate a HTML link to a named route.
     *
     * @param  string $title
     * @param  array  $options
     * @param  array  $attributes
     * @return \Illuminate\Support\HtmlString
     *
     * @throws \Exception
     */
    protected function regular($title, $options, $attributes = [])
    {
        $url = $this->getUrlFromOptions($options);

        return Html::link($url, $title, $attributes, $secure = null);
    }

    /**
     * Generate a HTML link to a named route.
     *
     * @param  string $title
     * @param  array  $options
     * @param  array  $attributes
     * @return \Illuminate\Support\HtmlString
     *
     * @throws \Exception
     */
    public function edit($title, $options, $attributes = [])
    {
        return $this->regular($title, $options, $attributes);
    }

    /**
     * Generate a HTML link to a named route.
     *
     * @param  string $title
     * @param  array  $options
     * @param  array  $attributes
     * @return \Illuminate\Support\HtmlString
     *
     * @throws \Exception
     */
    public function show($title, $options, $attributes = [])
    {
        return $this->regular($title, $options, array_merge(['target' => '_blank'], $attributes));
    }

    /**
     * Generate a HTML link to a named route.
     *
     * @param  string $title
     * @param  array  $options
     * @param  array  $attributes
     * @return \Illuminate\Support\HtmlString
     *
     * @throws \Exception
     */
    public function destroy($title, $options, $attributes = [])
    {
        $form = Form::destroy($title, $options, $attributes);

        return new HtmlString($form);
    }

    /**
     * Generate a HTML link to a named route.
     *
     * @param  string $title
     * @param  array  $options
     * @param  array  $attributes
     * @return \Illuminate\Support\HtmlString
     *
     * @throws \Exception
     */
    public function delete($title, $options, $attributes = [])
    {
        $form = Form::delete($title, $options, $attributes);

        return new HtmlString($form);
    }

    /**
     * Generate a HTML link to a named route.
     *
     * @param  string $title
     * @param  array  $options
     * @param  array  $attributes
     * @return \Illuminate\Support\HtmlString
     *
     * @throws \Exception
     */
    public function restore($title, $options, $attributes = [])
    {
        return Form::restore($title, $options, $attributes);
    }

    /**
     * @param  mixed  $options
     * @return string
     */
    protected function getUrlFromOptions($options)
    {
        if (isset($options['url'])) {
            return $this->url->to($options['url']);
        } elseif (isset($options['route'])) {
            return $this->url->route($options['route'][0], array_slice($options['route'], 1));
        } elseif (isset($options['action'])) {
            // TODO: implement this functionality.
        }
    }
}
