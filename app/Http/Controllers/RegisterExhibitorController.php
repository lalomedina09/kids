<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use App\Http\Requests\Auth\RegisterExhibitorRequest;
use App\Http\Requests\Auth\RegisterExhibitorProfileRequest;
use App\Http\Requests\Auth\RegisterExhibitorBankRequest;

use App\Mail\Auth\Mailer;
use App\Models\{Newsletter, User};
use App\Repositories\UserRepository;

use Session;
use Auth;
use DB;

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
        $user_id = Session::get('user_id');
        #$user = $this->users;

        return view('auth.qdplay.register-exhibitor', compact('step_exhibitor', 'user_id'));
    }


    public function storeDataGeneral(RegisterExhibitorRequest $request)
    {
        $params = $request->all();

        $user = new User;
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);

        $user = $this->users->saveProfile($params, $user);

        //La linea 44 se activara cuando termine los pasos en caso contrario no le iniciaremos la session
        //Auth::login($user);

        Mailer::sendRegisterMail($user);
        $step_exhibitor = Session::put('step_exhibitor', 2);
        $user_id = Session::put('user_id', $user->id);
        $this->users = $user;

        $rol = DB::table('model_has_roles')->insert([
            'role_id' => 10,
            'model_type' => 'user',
            'model_id' => $user->id
        ]);

        return redirect()
            ->route('qdplay/unete/show');
    }

    public function storeDataProfile($id, $section, RegisterExhibitorProfileRequest $request)
    {
        $user = User::find($id);
        $params = $request->all();

        $this->users->saveMeta('blog', $params, $user);
        $step_exhibitor = Session::put('step_exhibitor', 3);
        $this->users = $user;

        return redirect()
            ->route('qdplay/unete/show');
    }

    public function storeDataBank($id, $section, RegisterExhibitorBankRequest $request)
    {
        $user = User::find($id);
        $params = $request->all();

        $this->users->saveMeta('blog', $params, $user);
        #$step_exhibitor = Session::put('step_exhibitor', 4);
        Session::forget('step_exhibitor');
        Session::forget('user_id');

        $this->users = $user;
        Auth::login($user);

        return redirect()
            ->route('qdplay/unete/show')
            ->with([
                'success' => '¡Bienvenido! a la comunidad de expositores.'
            ]);
    }
}
