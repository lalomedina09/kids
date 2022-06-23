<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Response, Request };

use App\Helpers\Helpers;

class HomeController extends Controller
{
    /**
     * Return the API information
     *
     * @return \Illuminate\Http\Response
     */
    public function getAPIInfo(Request $request) {
        $r = [
            'name' => config('app.name'),
            'version' => '1.0',
            'company' => 'Querido Dinero'
        ];
        if ($user = $request->user()) {
            $r['user'] = $user;
        }
        return Helpers::makeJsonResponse(Response::HTTP_OK, $data=$r);
    }
}
