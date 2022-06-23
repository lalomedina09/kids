<?php

if (! function_exists('active_class')) {
    /**
     * @param  string  $pattern
     * @return string
     */
    function active_class($pattern)
    {
        return request()->is($pattern) ? 'active' : '';
    }
}

if (! function_exists('active_media')) {
    /**
     * @param  string  $pattern
     * @return string
     */
    function active_media($pattern)
    {
        return request()->is($pattern) ? '' : 'd-none';
    }
}


if (! function_exists('format_value')) {
    /**
     * @param  mixed  $value
     * @param  string  $format
     * @return string
     */
    function format_value($value, $format='')
    {
        if (!is_numeric($value)) {
            return '0.0';
        }

        switch ($format) {
            case '$':
                return '$'.number_format($value, 2, '.', ',');
            case '%':
                $v = $value * 100;
                return number_format($v, 2, '.', ',').'%';
            case '0':
                return number_format($value, 2, '.', ',');
            default:
                return $value;
        }
    }
}
