<?php

namespace App\Models\Traits;

use Linkify;

trait Formatable {

    /**
     * Apply format to model attribute
     *
     * @param  string  $field
     * @param  array  $format
     * @return string|null
     */
    public function getWithFormat($field, $formats = [])
    {
        $value = $this->$field;
        if (!$value) {
            return null;
        }
        return $this->format($value, $formats);
    }

    /**
     * Format an attribute
     *
     * @param  string  $value
     * @return string|null
     */
    public function format($value, $formats = [])
    {
        if ($value && !empty($formats)) {
            foreach ($formats as $format) {
                $value = $this->$format($value);
            }
        }
        return ($value) ? $value : null;
    }

    /**
     * Remove HTML from user input
     *
     * @param  string  $value
     * @return string|null
     */
    public function clean($value)
    {
        return ($value) ? trim(urldecode(html_entity_decode(strip_tags($value)))) : null;
    }

    /**
     * Remove malicious HTML
     *
     * @param  string  $value
     * @return string|null
     */
    public function purify($value)
    {
        return ($value) ? clean($value) : null;
    }

    /**
     * Convert newlines
     *
     * @param  string  $value
     * @param  string  $soft
     * @param  string  $hard
     * @return string|null
     */
    public function newlines($value, $soft="<br/>", $hard="<br/>") {
        if ($value) {
            $value = preg_replace("/\r\n|\r|\n/", $soft, $value);
            $value = str_replace(['\n','\r','\r\n'], $hard, $value);
        }
        return ($value) ? $value : null;
    }

    /**
     * Convert URL to links (anchors)
     *
     * @param  string  $value
     * @return string|null
     */
    public function linkify($value)
    {
        if ($value) {
            $linkify = new Linkify();
            $value = $linkify->processUrls($value);
        }
        return ($value) ? $value : null;
    }
}
