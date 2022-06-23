<?php

namespace App\Helpers;

class InteractableCode
{
    /**
     * Encode interactable code
     *
     * @param  array  $components
     * @return string
     */
    public static function encode($components)
    {
        $json = json_encode($components);
        $encoded = base64_encode($json);
        $encrypted = encrypt($encoded);
        $code = strtr($encrypted, '+/=', '-_~');
        return $code;
    }

    /**
     * Decode interactable code
     *
     * @param  string  $code
     * @return array
     */
    public static function decode($code)
    {
        $encrypted = strtr($code, '-_~', '+/=');
        $encoded = decrypt($encrypted);
        $json = base64_decode($encoded);
        $components = json_decode($json, true);
        return $components;
    }
}