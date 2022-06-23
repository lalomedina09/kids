<?php

namespace App\Http\Controllers\Exercises;

use Illuminate\Http\Request;

use App\Models\ExerciseAnswer;

class AmountController extends BaseController
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
        $this->name = 'amount';
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
            return redirect()->route('exercises.amount.edit');
        }

        $future = $request->user()->exercises()->where('exercise_name', 'future')->first();
        if (!$future instanceof ExerciseAnswer) {
            return redirect()->route('exercises.future.show');
        }
        $city = $future->answers[2];

        return view('exercises.amount.show')->with([
            'answers' => $answers,
            'city' => $city
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
        $future = $request->user()->exercises()->where('exercise_name', 'future')->first();
        if (!$future instanceof ExerciseAnswer) {
            return redirect()->route('exercises.future.show');
        }

        $answers = $this->getAnswers($request->user(), true);
        $city = $future->answers[2];

        return view('exercises.amount.edit')->with([
            'answers' => $answers,
            'city' => $city
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
        $redirect = redirect()->route('exercises.amount.show');
        $answers = ($request->has('a')) ? $request->get('a') : null;
        if (!$answers) {
            return $redirect;
        }

        $this->saveAnswers($answers, $request->user());

        return $redirect->with('success', '');
    }
}
