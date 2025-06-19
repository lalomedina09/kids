<?php

namespace App\Http\Controllers;
use Illuminate\Http\{ Request, Response };


class HomeController extends Controller
{

    public function index()
    {
        //dd('Welcome to the home page!');
        return view('home.index');
    }

}
