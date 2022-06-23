<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use ReCaptcha\ReCaptcha;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeExtensionGuesser;

use Validator;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Validator::extend('documents', function ($attr, $file, $parameters, $validator) {
            $mime = $file->getClientMimeType();
            $guesser = new MimeTypeExtensionGuesser;
            $bonus_guesses = [
                'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
                'application/vnd.ms-excel' => 'xls',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx'
            ];
            $bonus_guess = isset($bonus_guesses[$mime]) ? $bonus_guesses[$mime] : null;
            return in_array($guesser->guess($mime), $parameters) || in_array($bonus_guess, $parameters);
        });

        Validator::extend('domain_name', function ($attr, $value, $parameters, $validator) {
            return preg_match(env('DOMAIN_NAME_REGEX', ""), $value);
        });

        Validator::extend('bsize', function ($attr, $value, $parameters, $validator) {
            $sizes = [
                'tiny' => pow(2,8),
                'normal' => pow(2,16),
                'medium' => pow(2,24),
                'long' => pow(2,32)
            ];
            $size = (!empty($parameters)) ? $parameters[0] : 'normal';
            $bsize = (array_has($sizes, $size)) ? $sizes[$size] : $sizes['normal'];
            return strlen($value) < $bsize;
        });

        Validator::extend('recaptcha', function ($attr, $value, $parameters, $validator) {
            $ip = request()->ip();
            $secret   = config('money.recaptcha.secret');

            $recaptcha = new ReCaptcha($secret);
            $resp = $recaptcha->verify($value, $ip);

            return $resp->isSuccess();
        });

        Validator::extend('video_url', function ($attr, $value, $parameters, $validator) {
            return preg_match(env('VIDEO_URL_REGEX', ""), $value);
        });

        Validator::extend('whitespaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        //

    }

}

