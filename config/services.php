<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'conekta' => [
        'version '=> env('CONEKTA_API_VERSION', ''),
        'key' => env('CONEKTA_PUBLIC_KEY', ''),
        'secret' => env('CONEKTA_PRIVATE_KEY', ''),
        'currency' => env('CONEKTA_CURRENCY', ''),
        'bank' => env('CONEKTA_BANK', ''),
        'oxxo_comission' => env('CONEKTA_OXXO_COMISSION', ''),
        'identifiers' => [
            'bank' => env('CONEKTA_BANK_IDENTIFIER', ''),
            'card' => env('CONEKTA_CARD_IDENTIFIER', ''),
            'cash' => env('CONEKTA_CASH_IDENTIFIER', '')
        ],
    ],

    'curadeuda' => [
        'api_url' => env('CURADEUDA_API_URL', ''),
        'api_token' => env('CURADEUDA_API_TOKEN', ''),
        'related_campaign' => env('CURADEUDA_RELATED_CAMPAIGN', '')
    ],

    'demio' => [
        'key' => env('DEMIO_API_KEY'),
        'secret' => env('DEMIO_API_SECRET')
    ],

    'facebook' => [
        'pixelId' => env('FACEBOOK_PIXEL_ID')
    ],

    'google' => [
        'analyticsKey' => env('GOOGLE_ANALYTICS_KEY'),
        'adsKey' => env('GOOGLE_ADS_KEY'),
        'conversionKey' => env('GOOGLE_ADS_CONVERSIONKEY')
    ],

    'hotjar' => [
        'hjid' => env('HOTJAR_HJID', 0),
        'hjsv' => env('HOTJAR_HJSV', 0),
    ],

    'imgix' => [
        'domain' => env('IMGIX_DOMAIN', 'https://querido-dinero.imgix.net'),
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'resuelvetudeuda' => [
        'api_url' => env('RESUELVETUDEUDA_API_URL', ''),
        'api_token' => env('RESUELVETUDEUDA_API_TOKEN', ''),
        'mkt' => [
            'utm_source' => env('RESUELVETUDEUDA_UTM_SOURCE', ''),
            'utm_medium' => env('RESUELVETUDEUDA_UTM_MEDIUM', ''),
            'utm_channel' => env('RESUELVETUDEUDA_UTM_CHANNEL', ''),
            'utm_campaign' => env('RESUELVETUDEUDA_UTM_CAMPAIGN', '')
        ]
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'zoom' => [
        'key' => env('ZOOM_API_KEY'),
        'secret' => env('ZOOM_API_SECRET'),
        'users' => explode(',', env('ZOOM_USERS', '')),
        'available_users' => env('ZOOM_USERS_AVAILABLE', 0),
        'timezone' => env('ZOOM_TIMEZONE')
    ]
];
