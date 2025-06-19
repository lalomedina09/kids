<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Carbon\Carbon;
//use DB;

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
