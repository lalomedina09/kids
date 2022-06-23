<?php

namespace App\Http\Controllers\Exercises;

use Illuminate\Http\Request;

use App\Models\ExerciseAnswer;

class BenchmarkController extends BaseController
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
        $this->name = 'benchmark';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request  $request)
    {
        $user = $request->user();
        $answers = $this->getAnswers($user, true);
        $answers = $this->mapAnswers($answers, $user);
        return view('exercises.benchmark.edit')->with([
            'answers' => $answers ?? []
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
        $user = $request->user();
        $redirect = redirect()->route('exercises.benchmark.edit');
        $answers = ($request->has('answers')) ? $request->get('answers') : null;
        if (!$answers) {
            return $redirect->with('error', __('An error was ocurred, try again'));
        }
        $answers = $this->mapAnswers($answers, $user);
        $this->saveAnswers($answers, $user);
        return $redirect->with('success', __('Changes saved'));
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Map answers
     *
     * @param  array  $answers
     * @param  \App\Model\User  $user
     * @return string
     */
    private function mapAnswers($answers, $user)
    {
        $balance = $user->exercises()->where('exercise_name', 'income_statement')->first();
        $answers['sales_income'] = ($balance instanceof ExerciseAnswer) ? array_get($balance->answers, 'sales_income', 0.0) : 0.0;
        return $answers;
    }
}
