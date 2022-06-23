<?php

namespace App\Http\Controllers\Dashboard\Reports;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Reporters\Exercises\DebtReporter;

class ExerciseController extends Controller
{

    /**
     * Show debt exercise report
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function showDebt(DebtReporter $reporter)
    {
        $report_data = $reporter->generateWebReport();
        return view('dashboard.reports.exercises.debt')->with([
            'data' => $report_data
        ]);
    }

    /**
     * Download debt exercise report
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadDebt(DebtReporter $reporter)
    {
        $report = $reporter->generateFileReport();
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $reporter->getFilename() . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        $report->output();
    }

}
