<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Helpers\Helpers;

use DB;
use Exception;

class ZipcodeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Toggle bookmark on storage
     *
     * @param  string  $zipcode
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function get($zipcode, Request $request)
    {
        try {
            if ($zip = $this->query()->where('code', $zipcode)->first()) {
                $zip->settlements = json_decode($zip->settlements);
                return Helpers::makeJsonResponse(Response::HTTP_OK, $data=[
                    'error' => false,
                    'result' => $zip
                ]);
            }
            return Helpers::makeJsonResponse(Response::HTTP_NOT_FOUND, $data=[
                'error' => false,
                'result' => []
            ]);
        } catch (Exception $e) {
            return Helpers::makeJsonResponse(Response::HTTP_INTERNAL_SERVER_ERROR, $data=[
                'error' => true,
                'result' => ['errors' => $e->getMessage()]
            ]);
        }
    }

    private function query()
    {
        return DB::table('zipcodes');
    }
}
