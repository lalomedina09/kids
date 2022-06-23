<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Querido Dinero configuration file
    |--------------------------------------------------------------------------
    |
    |
    */

    'app' => [
        'version' => env('APP_VERSION'),
        'subversion' => env('APP_SUBVERSION')
    ],

    'seo' => [
        'name' => env('APP_NAME'),
        'title' => env('QD_SEO_TITLE'),
        'description' => env('QD_SEO_DESCRIPTION'),
        'author' => env('QD_SEO_AUTHOR'),
        'image' => env('QD_SEO_IMAGE'),
        'url' => env('APP_URL'),
        'keywords' => env('QD_SEO_KEYWORDS')
    ],

    'url' => [
        'store' => env('QD_URL_STORE', '/'),
        'facebook' => env('QD_URL_FACEBOOK', '#'),
        'instagram' => env('QD_URL_INSTAGRAM', '#'),
        'twitter' => env('QD_URL_TWITTER', '#'),
        'youtube' => env('QD_URL_YOUTUBE', '#')
    ],

    'users' => [
        'facebook' => env('QD_USER_FACEBOOK', ''),
        'instagram' => env('QD_USER_INSTAGRAM', ''),
        'twitter' => env('QD_USER_TWITTER', ''),
        'youtube' => env('QD_USER_YOUTUBE', '')
    ],

    'email' => env('QD_CONTACT_EMAIL', 'mail@queridodinero.com'),

    'phone' => [
        'cdmx' => env('QD_PHONE_CDMX', '555-555-555'),
        'mty'=> env('QD_PHONE_MTY', '555-555-555')
    ],

    'schedule' => env('QD_SCHEDULE', ''),

    'banking' => [
        'name' => env('QD_BANKING_NAME'),
        'bank' => env('QD_BANKING_BANK'),
        'account' => env('QD_BANKING_ACCOUNT'),
        'clabe' => env('QD_BANKING_CLABE')
    ],

    'address' => [
        'cdmx' => env('QD_ADDRESS_CDMX'),
        'mty' => env('QD_ADDRESS_MTY')
    ],

    'maps' => [
        'cdmx' => env('QD_MAPS_CDMX'),
        'mty' => env('QD_MAPS_MTY')
    ],

    'copyright' => env('QD_COPYRIGHT', 'All rights reserved.'),

    'filesystem' => [
        'disk' => env('QD_FILESYSTEM_DISK', 'public')
    ],

    'recaptcha' => [
        'key' => env('GOOGLE_RECAPTCHA_KEY'),
        'secret' => env('GOOGLE_RECAPTCHA_SECRET')
    ],

];
