<?php

namespace App\Mail\Advice;

use Mail;

class Mailer
{
    public static function sendRequestDocuments($advice, $request)
    {
        Mail::send(new NotificationUploadDocument($advice, $request));
    }

}
