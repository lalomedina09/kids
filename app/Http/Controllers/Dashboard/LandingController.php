<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\{ Request, Response };
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LeadsExport;
use App\Exports\LandingExport;

use App\Models\Landing;
use App\Models\Lead;

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
        $columns = Landing::where('page', $page)->first();
        return view('dashboard.landings.show')->with([
            'pages' => $this->getPages(),
            'page' => $page,
            'results' => $results,
            'columns' => $columns
        ]);
    }

    public function exportResultsLanding($page)
    {
        return Excel::download(new LandingExport($page), $page.'.xlsx');
    }

    public function customShow($custom_page)
    {
        $results = Landing::all();
        $leads = Lead::where('form', $custom_page)->get();

        return view('dashboard.landings.custom_show')->with([
            'pages' => $this->getPages(),
            'custom_page' => $custom_page,
            'leads' => $leads,
            'results' => $results
        ]);
    }

    public function exportDataLanding($form)
    {
        return Excel::download(new LeadsExport($form), 'Registros-Qdplay-Empresas.xlsx');
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
