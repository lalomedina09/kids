<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cache;

class LocalizationController extends Controller
{

    /**
     * Return localization file
     *
     * @return Illuminate\Http\Response
     */
    public function get()
    {
        Cache::forget('lang.js');
        $localization = Cache::rememberForever('lang.js', function () {
            $lang = config('app.locale');
            /*
            $messages_path = resource_path("lang/{$lang}/messages.php");
            $messages = require $messages_path;
            */
            $strings_path = resource_path("lang/{$lang}.json");
            $strings = file_get_contents($strings_path);
            $strings = json_decode($strings, true);

            //return array_merge($messages, $strings);
            return $strings;
        });
        $localization = json_encode($localization);

        return response()->streamDownload(function () use ($localization) {
            echo "window.localization = {$localization};";
        }, 'lang.js', [
            'Content-type' => 'text/javascript'
        ]);
    }
}

