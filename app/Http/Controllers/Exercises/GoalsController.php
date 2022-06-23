<?php

namespace App\Http\Controllers\Exercises;

use Illuminate\Http\Request;

class GoalsController extends BaseController
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
        $this->name = 'goals';
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
            return redirect()->route('exercises.goals.edit');
        }

        $goals = $this->mapAnswers($answers);

        return view('exercises.goals.show')->with($goals);
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
        return view('exercises.goals.edit')->with([
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
        $redirect = redirect()->route('exercises.goals.show');
        $answers = ($request->has('m')) ? $request->get('m') : null;
        if (!$answers) {
            return $redirect;
        }

        $answers = array_values($answers);
        $this->saveAnswers($answers, $request->user());

        return $redirect->with('success', '');
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Map answers to goals
     *
     * @param  array  $answers
     * @return string
     */
    private function mapAnswers($answers)
    {
        $filter_function = function ($min, $max) {
            return function ($item, $key) use ($min, $max) {
                return ($min <= $item['t'] && $item['t'] <= $max);
            };
        };

        $goals = collect($answers);

        return [
            'short' => $goals->filter($filter_function(1, 12)),
            'medium' => $goals->filter($filter_function(13, 36)),
            'large' => $goals->filter($filter_function(37, PHP_INT_MAX))
        ];
    }
}
