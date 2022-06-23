<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Models\Landing;

use DB;

class LandingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.landings.index')->with([
            'pages' => $this->getPages()
        ]);
    }

    /**
     * Show the specified result.
     *
     * @param  string  $page
     * @return \Illuminate\Http\Response
     */
    public function show($page)
    {
        $results = Landing::where('page', $page)->get();
        return view('dashboard.landings.show')->with([
            'pages' => $this->getPages(),
            'page' => $page,
            'results' => $results
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Return pages filter
     *
     * @return \Illuminate\Support\Collection
     */
    private function getPages()
    {
        return DB::table('landings')
            ->select('page')
            ->groupBy('page')
            ->get()
            ->pluck('page');
    }

}
