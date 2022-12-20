<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use App\Http\Requests\Auth\RegisterExhibitorRequest;
use App\Mail\Auth\Mailer;
use App\Models\{Newsletter, User};
use App\Repositories\UserRepository;

use Session;
use Auth;

class RegisterExhibitorController extends Controller
{

    private $users;

    public function __construct(UserRepository  $users)
    {
        $this->users = $users;
    }


    public function showRegistrationForm()
    {
        $step_exhibitor = Session::get('step_exhibitor');
        return view('auth.qdplay.register-exhibitor', compact('step_exhibitor'));
    }


    public function storeDataGeneral(RegisterExhibitorRequest $request)
    {
        $params = $request->all();

        $user = new User;
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);

        $user = $this->users->saveProfile($params, $user);

        //La linea 44 se activara cuando termine los pasos en caso contrario no le iniciaremos la session
        #Auth::login($user);

        Mailer::sendRegisterMail($user);
        $step_exhibitor = Session::put('step_exhibitor', 1);

        return redirect()
            ->route('qdplay/unete/show');
    }

    /*public function storeDataContact(RegisterExhibitorRequest $request)
    {
        $params = $request->all();

        $user = new User;
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);

        $user = $this->users->saveProfile($params, $user);

        //La linea 62 se activara cuando termine los pasos en caso contrario no le iniciaremos la session
        #Auth::login($user);

        Mailer::sendRegisterMail($user);
        $step_exhibitor = Session::put('step_exhibitor', 1);

        return redirect()
            ->route('qdplay/unete');
    }*/
}
