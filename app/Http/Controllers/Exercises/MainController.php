<?php

namespace App\Http\Controllers\Exercises;

use Illuminate\Http\Request;

class MainController extends BaseController
{

    /**
     * Create a new resource instance
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $exercises = $this->readJson();
        return view('exercises.index')->with([
            'exercises' => $exercises
        ]);
    }
}
