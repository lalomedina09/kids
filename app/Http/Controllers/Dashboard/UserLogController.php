<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserLogController extends Controller
{
    //
    public function createUserLog($array)
    {
        $data = new UserLog;
        $data->move = $array['move'];
        $data->user_id = Auth::user()->id;
        $data->description = $array['description'];
        $data->userlogsable_type = $array['userlogsable_type'];
        $data->userlogsable_id = $array['userlogsable_id'];

        return $data;
    }
}
