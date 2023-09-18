<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use App\Http\Requests\Auth\RegisterUserResuelveRequest;

use App\Mail\Auth\Mailer;
use App\Models\{Newsletter, User};
use App\Repositories\UserRepository;

use Session;
use Auth;
use DB;

class SignupCompanyController extends Controller
{

    private $users;

    public function __construct(UserRepository  $users)
    {
        $this->users = $users;
    }

    public function resuelve()
    {
        $codeConcept = "RESUELVE";
        $user = request()->user();
        return view('landings.qdplay.resuelve', compact('codeConcept', 'user'));
    }

    public function bnmx()
    {
        $codeConcept = "BNMX25";
        $user = request()->user();
        return view('landings.qdplay.bnmx', compact('codeConcept', 'user'));
    }

    public function hsbc()
    {
        $codeConcept = "HSBC20";
        $user = request()->user();
        return view('landings.qdplay.hsbc', compact('codeConcept', 'user'));
    }

    public function isic()
    {
        $codeConcept = "ISIC20";
        $user = request()->user();
        return view('landings.qdplay.isic', compact('codeConcept', 'user'));
    }

    public function scot()
    {
        $codeConcept = "SCOT20";
        $user = request()->user();
        return view('landings.qdplay.scot', compact('codeConcept', 'user'));
    }

    public function store(RegisterUserResuelveRequest $request)
    {
        $params = $request->all();
        $user = new User;
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);
        $user = $this->users->saveProfile($params, $user);

        Mailer::sendRegisterMail($user);
        $this->users = $user;
        Auth::login($user);

        return redirect()
            ->route('qdplay.payments.payform', ['concept' => $request->codeConcept])
            ->with([
                'success' => '¡Bienvenido! a Querido Dinero'
            ]);
    }

}
