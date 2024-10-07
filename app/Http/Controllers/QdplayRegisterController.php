<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use App\Http\Requests\Auth\QdplayRegisterRequest;
use App\Mail\Auth\Mailer;
use App\Models\{ Newsletter, User , LoginLog};

use App\Repositories\UserRepository;

use Auth;
#use DB;

class QdplayRegisterController  extends Controller
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
    public function store(QdplayRegisterRequest $request)
    {
        $params = $request->all();

        $user = new User;
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);
        $user->source = $params['source'];

        $user = $this->users->saveProfile($params, $user);

        Auth::login($user);

        // Log de login
        LoginLog::create(
            [
                'user_id' => $user->id,
                'source' => $params['source']
            ]
        );

        Mailer::sendRegisterMail($user);

        return redirect()
            #->route('home')
            ->back()
            ->with([
                'success' => '¡Bienvenido! ahora estás registrado.'
            ]);
    }
}
