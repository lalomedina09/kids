<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

#use App\Http\Requests\Auth\RegisterUserResuelveRequest;

use App\Mail\Auth\Mailer;
use App\Models\{Newsletter, User};
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Session;
#use Auth;
#use DB;

class IndexHappyController extends Controller
{

    private $users;

    public function __construct(UserRepository  $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        $codeConcept = "RESUELVE";
        $user = request()->user();
        return view('index-happy.index', compact('codeConcept', 'user'));
    }

    public function resourceManagement()
    {
        $codeConcept = "BNMX25";
        $user = request()->user();
        return view('index-happy.resourceManagement', compact('codeConcept', 'user'));
    }

}
