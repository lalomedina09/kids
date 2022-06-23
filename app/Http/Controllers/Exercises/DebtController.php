<?php

namespace App\Http\Controllers\Exercises;

use Illuminate\Http\Request;

use App\Models\ExerciseAnswer;

class DebtController extends BaseController
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
        $this->name = 'debt';
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $answers = $this->getAnswers($request->user(), true);
        if (!$answers) {
            return redirect()->route('exercises.debt.edit');
        }

        $answers = $this->mapAnswers($answers, $request->user());

        return view('exercises.debt.show')->with([
            'answers' => $answers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request  $request)
    {
        $budget = $request->user()->exercises()->where('exercise_name', 'budget')->first();
        if (!$budget instanceof ExerciseAnswer) {
            return redirect()->route('exercises.budget.show');
        }

        $expenses = collect($budget->answers['e'])->filter(function ($item, $key) {
            return $item['type'] !== 'saving';
        });

        $answers = $this->getAnswers($request->user(), true);
        return view('exercises.debt.edit')->with([
            'answers' => $answers,
            'expenses' => $expenses
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
        $redirect = redirect()->route('exercises.debt.show');
        $answers = ($request->has('d')) ? $request->get('d') : null;
        if (!$answers) {
            return $redirect;
        }

        $this->saveAnswers($answers, $request->user());

        return $redirect->with('success', '');
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Map answers to debt
     *
     * @param  array  $answers
     * @param  \App\Models\User  $user
     * @return string
     */
    private function mapAnswers($answers, $user)
    {
        $budget = $user->exercises()->where('exercise_name', 'budget')->first();
        if (!$budget instanceof ExerciseAnswer) {
            return null;
        }

        $income = (int) $budget->answers['i'];
        $debt = array_sum(array_flatten($answers));

        return [
            'income' => $income,
            'debt' => $debt,
            'diff' => $income - $debt,
            'percentage' => round(($debt * 100) / $income),
            'debts' => $answers
        ];
    }
}

