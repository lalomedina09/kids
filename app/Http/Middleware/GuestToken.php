<?php

namespace App\Http\Middleware;

use App\Helpers\QDToken;

use Auth;
use Closure;

class GuestToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $token = null;
        $guest = !Auth::check();
        if ($request->session()->has('qd-jwt')) {
            $token = $request->session()->get('qd-jwt');
            $token = (QDToken::validate($token, true)) ? $token : QDToken::generate($guest);
        } else {
            $token = QDToken::generate($guest);
        }
        $request->session()->put('qd-jwt', (string)$token);

        return $next($request);
    }
}
