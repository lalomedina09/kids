<?php

namespace App\Http\Controllers\Exercises;

use Illuminate\Http\Request;

use App\Models\ExerciseAnswer;

class CashFlowController extends BaseController
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
        $this->name = 'cash_flow';
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
        return view('exercises.cashflow.edit')->with([
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
        $redirect = redirect()->route('exercises.cashflow.edit');
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
        $balance = $user->exercises()->where('exercise_name', 'balance')->first();
        $answers['beginning_period_cash'] = ($balance instanceof ExerciseAnswer) ? array_get($balance->answers, 'assets.short.cash', 0.0) : 0.0;
        return $answers;
    }
}
