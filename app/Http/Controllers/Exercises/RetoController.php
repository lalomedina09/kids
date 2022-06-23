<?php

namespace App\Http\Controllers\Exercises;

use Illuminate\Http\Request;

class RetoController extends BaseController
{

    /**
     * @var $name
     */
    protected $name;

    /**
     * Create a new resource instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->name = 'budget';
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return view('exercises.reto.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request  $request)
    {
        $answers = $this->getAnswers($request->user(), true);
        return view('exercises.budget.edit')->with([
            'answers' => $answers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $redirect = redirect()->route('exercises.budget.show');
        $answers = ($request->has('b')) ? $request->get('b') : null;
        if (!$answers) {
            return $redirect;
        }

        $answers['e'] = array_values($answers['e']);
        $this->saveAnswers($answers, $request->user());

        return $redirect->with('success', '');
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Map answers to budget
     *
     * @param  array  $answers
     * @return string
     */
    private function mapAnswers($answers)
    {
        function percentage($total, $amount) {
            return round(($amount * 100) / $total);
        }

        $reduce_function = function ($carry, $item) {
            return $carry + $item['amount'];
        };

        $filter_function = function ($type) {
            return function ($item, $key) use ($type) {
                return $item['type'] === $type;
            };
        };

        $income = $answers['i'];
        $e = collect($answers['e']);

        $expenses = $e->filter($filter_function('expense'));
        $fixed = $e->filter($filter_function('fixed'));
        $savings = $e->filter($filter_function('saving'));

        $sum_expenses = $expenses->reduce($reduce_function);
        $sum_fixed = $fixed->reduce($reduce_function);
        $sum_savings = $savings->reduce($reduce_function);

        $expenses_total = $sum_expenses + $sum_fixed + $sum_savings;

        return [
            'income' => $income,
            'diff' => $income - $expenses_total,
            'expenses' => [
                'total' => $sum_expenses,
                'percentage' => percentage($income, $sum_expenses)
            ],
            'fixed' => [
                'total' => $sum_fixed,
                'percentage' => percentage($income, $sum_fixed)
            ],
            'savings' => [
                'total' => $sum_savings,
                'percentage' => percentage($income, $sum_savings)
            ],
        ];
    }
}

