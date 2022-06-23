<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\Auth\Mailer;
use App\Models\{ Newsletter, User };
use App\Repositories\UserRepository;

use Auth;

class RegisterController extends Controller
{

    private $users;

    /**
     * Create a new controller instance
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository  $users)
    {
        $this->users = $users;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Auth\RegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $params = $request->all();

        $user = new User;
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);

        $user = $this->users->saveProfile($params, $user);

        if (array_has($params, 'interests')) {
            $user = $this->users->saveInterests($params, $user);
        }

        if (array_has($params, 'newsletter')) {
            Newsletter::subscribe([
                'email' => $params['email'],
                'first_name' => $params['name'],
                'last_name' => $params['last_name'],
                'state' => $params['state']
            ]);
        }

        Auth::login($user);

        Mailer::sendRegisterMail($user);

        return redirect()
            ->route('home')
            ->with([
                'success' => '¡Bienvenido! ahora estás registrado.'
            ]);
    }
}
