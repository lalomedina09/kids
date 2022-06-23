<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Helpers\Helpers;
use App\Models\User;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    private $users;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\UserRepository  $user
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Search for specified resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $params = ($request->has('filters')) ? $request->get('filters') : [];
        $users = $this->users->search($params);
        return Helpers::makeJsonResponse(Response::HTTP_OK, $data=$users->toArray());
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Return query builder
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return User::role('User');
    }
}
