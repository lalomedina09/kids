<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\LoginLog;
use Illuminate\Http\Request;

class QdplayLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->redirectTo = url()->previous();
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        #dd('flex');
        $this->validate($request, [
            'email' => 'required|string|max:255|email',
            'password' => 'required|string|min:8|max:100',
        ]);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // Registra el inicio de sesión en la tabla login_logs
        LoginLog::create(
            [
                'user_id' => $user->id,
                'source' => $request->source
            ]
        );

        if ($request->source == "academia-bravo") {
            return redirect()->route('qdplay.landing.academy-bravo.watch', ["cOWE8hXyj", "cdWeMjHHh", 'autoplay' => 'false'])
                ->withSuccess('Tu sesión inicio correctamente.');
        }else{
            $request->session()->flash('success', 'Se inició tu sesión correctamente.');
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/')->withSuccess('Tu sesión se cerró correctamente.');
    }

    public function showLoginForm()
    {
        return view('auth.qdplay.login');
    }
}
