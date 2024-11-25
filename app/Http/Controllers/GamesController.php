<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#use App\Models\Lead;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GamesController extends Controller
{
    public function calendar_adviento()
    {
        return view('games.calendar-adviento');
    }

}
