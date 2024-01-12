<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, Response};
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SaveQuizRequest;
use Illuminate\Support\Str;
use App\Models\Quiz;
use QD\QDPlay\Models\Course;

class Dashboardv2Controller extends Controller
{

    public function dashboardGeneral(): View
    {
        $data = 10;

        return view('dashboardv2.general.index', compact('data'));
    }

    public function dashboardQdplay(): View
    {
        $data = 10;

        return view('dashboardv2.qdplay.index', compact('data'));
    }
}
