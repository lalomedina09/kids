<?php

namespace App\Reporters\Exercises;

use App\Contracts\Reportable;
use App\Models\ExerciseAnswer;
use App\Reporters\Reporter;

class DebtReporter extends Reporter
{

    /**
     * Create a new resource instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Generate a file report for download
     *
     * @param array $filters
     * @return League\Csv\Writer
     */
    public function generateFileReport($filters=[]) {
        $headers = [
            $this->getReportHeaders()
        ];

        $csv = $this->getCSVWriter();
        $csv->insertAll($headers);

        $exercises = $this->getQuery();
        $iterator = $this->getIterator(function ($element) use (&$csv) {
            $csv->insertOne($element);
        });
        $exercises->chunk(100, $iterator);

        return $csv;
    }

    /**
     * Generate the report data to show on webpage
     *
     * @param array $filters
     * @return array
     */
    public function generateWebReport($filters=[]) {
        $results = collect([]);

        $exercises = $this->getQuery();
        $iterator = $this->getIterator(function ($element) use (&$results) {
            $results->push($element);
        });
        $iterator($exercises->get());

        return [
            'headers' => $this->getReportHeaders(),
            'data' => $results,
        ];
    }

    /**
     * Return file report filename
     *
     * @return string
     */
    public function getFilename() {
        return 'reporte_ejericios_deuda_' . $this->date->format('dMY_His') . '.csv';
    }

    /*
    |--------------------------------------------------------------------------
    | Protected methods
    |--------------------------------------------------------------------------
    */

    /**
     * Get the query of the report elements
     *
     * @return array
     */
    protected function getReportHeaders() {
        return [
            'Nombre', 'Correo electrónico',
            'Ingresos', 'Deuda', 'Porcentaje de deuda', '¿Deuda sana?'
        ];
    }

    /**
     * Get the query of the report elements
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function getQuery() {
        $budget_closure = function ($e_query) {
            $e_query->where('exercise_name', 'budget');
        };

        $user_closure = function ($u_query) use ($budget_closure) {
            $u_query->select(['id', 'name', 'last_name', 'email'])
                ->whereHas('exercises', $budget_closure)
                ->with(['exercises' => $budget_closure]);
        };

        return ExerciseAnswer::select(['answers', 'user_id'])
            ->where('exercise_name', 'debt')
            ->with(['user' => $user_closure]);

    }

    /**
     * Return the iterator instance
     *
     * @return Closure|callable
     */
    protected function getIterator($writter) {
        return function ($exercises) use ($writter) {
            foreach ($exercises as $exercise) {
                $user = $exercise->user;

                $budget = $user->exercises->first();
                if (!$budget instanceof ExerciseAnswer) {
                   continue;
                }

                $income = (int) $budget->answers['i'];
                $debt = array_sum(array_flatten($exercise->answers));
                $percentage = round(($debt * 100) / $income);
                $result = ($percentage <= 30) ? 'Sí' : 'No';

                $row = [
                    $user->fullname,
                    $user->email,
                    $income,
                    $debt,
                    "{$percentage}%",
                    $result
                ];

                $writter($row);
            }
        };
    }
}
