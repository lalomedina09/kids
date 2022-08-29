<?php

use Illuminate\Support\Facades\Auth;

use App\Models\Notification;
use App\Models\Category;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Carbon\Carbon;

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

function getNotificationsMenu()
{
    $notifications = Notification::where('user_id', Auth::user()->id)
                    ->where('status', 0)
                    ->where('type', 3)
                    ->get();
    return count($notifications);

    #$notifications = Auth::user()->notificationsTypeWeb;
}

function getCustomDateHuman($date)
{
    if($date)
    {
        return $newDate = Carbon::parse($date)->diffForHumans();
    }else{
        return 'No Disponible';
    }
}

function getCategoriesQD()
{
    return $categories = Category::whereIn('id', ['4', '5', '6', '7', '8', '9'])
    ->get();
}
