<?php

namespace App\Http\Controllers\Dashboard\Reports;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

class MainController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Reponse
     */
    public function index()
    {
        return view('dashboard.reports.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Reponse
     */
    public function exercises()
    {
        return view('dashboard.reports.exercises.index');
    }

}
