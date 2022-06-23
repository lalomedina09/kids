<?php

namespace App\Http\Middleware;

use Illuminate\Http\Response;

use App\Helpers\QDToken;
use App\Helpers\Helpers;

use Closure;
use Exception;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $check_csrf=null) {
        $data = [];
        try {
            $check_csrf = !is_null($check_csrf);
            if (QDToken::verify($check_csrf)) {
                QDToken::authenticate();
                return $next($request);
            }
            $data['error'] = 'Invalid token';
        } catch (Exception $e) {
            $data['error'] = $e->getMessage();
        }
        return Helpers::makeJsonResponse(Response::HTTP_UNAUTHORIZED, $data=$data);
    }
}
