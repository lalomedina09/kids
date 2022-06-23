<?php

namespace App\Helpers;

use Illuminate\Http\Response;

use Date;

class Helpers
{

    /**
     * Return a valid script HTML template
     *
     * @param string $type
     * @param string $resource
     * @return string
     */
    public static function asset($type, $resource) {
        $version = config('money.app.subversion');
        $path = "/{$resource}?v={$version}";
        switch ($type) {
            case 'script': return '<script type="text/javascript" src="'.$path.'"></script>';
            case 'style': return '<link href="'.$path.'" rel="stylesheet">';
        }
        return null;
    }

    /**
     * Return microtime as string
     *
     * @return string
     */
    public static function getMicrotime()
    {
        return str_replace('.', '', sprintf("%f", microtime(true)));
    }

    /**
     * Fisher-Yates algorithm for seeded array shuffle
     *
     * @param  array  &$items
     * @param  int  $seed
     * @return void
     */
    public static function fisherYatesShuffle(&$items, $seed)
    {
        @mt_srand($seed);
        $items = array_values($items);
        for ($i=count($items)-1; $i > 0; $i--) {
            $j = @mt_rand(0, $i);
            $tmp = $items[$i];
            $items[$i] = $items[$j];
            $items[$j] = $tmp;
        }
    }

    /**
     * Associative array shuffle, preserve keys
     *
     * @param  array  $old
     * @return array
     */
    public static function arrayShuffle($old)
    {
        if (!is_array($old)) return $old;
        $new = [];
        $keys = array_keys($old);
        shuffle($keys);
        foreach ($keys as $key) {
            $new[$key] = $old[$key];
        }
        return $new;
    }

    /**
     * Convert associative array to stdClass object
     *
     * @param  array  $old
     * @return stdClass
     */
    public static function toObject($array)
    {
        $object = new \stdClass();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = self::toObject($value);
            }
            $object->$key = $value;
        }
        return $object;
    }

    /**
     * Build a valid JSON response
     *
     * @param  int  $code
     * @param  array  $data
     * @param  boolean  $json
     * @return \Illuminate\Http\Response
     */
    public static function makeJsonResponse($code, $data=[], $json=true)
    {
        if ($json) {
            $response = [
                'code' => $code,
                'status' => 'success',
                'message' => Response::$statusTexts[$code],
                'timestamp' => Date::now()->format('Y-m-d_T_H:i:s_P'),
                'data' => $data
            ];

            switch ($code) {
                // General error
                case 400:
                    $response['status'] = 'fail';
                    break;

                // Unauthorized
                case 401:
                    $response['status'] = 'unauthorized';
                    break;

                // Resource not found
                case 404:
                    $response['status'] = 'fail';
                    break;

                // Error / Exception thrown
                case 500:
                    $response['status'] = 'error';
                    break;

                // Default
                default:
                    break;
            }
        } else {
            $response = json_decode($data, true);
        }

        return response()->json($response, $code);
    }
}
