<?php

namespace App\Http\Controllers\Exercises;

use Illuminate\Http\Request;

class ProfileController extends BaseController
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
        $this->name = 'profile';
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
            return redirect()->route('exercises.profile.edit');
        }

        $rates = $this->mapAnswers($answers);
        $horizon_rate = array_sum(array_slice($rates, 0, 2));
        $risk_rate = array_sum(array_slice($rates, 2));

        return view('exercises.profile.show')->with([
            'horizon_rate' => $horizon_rate,
            'risk_rate' => $risk_rate
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
        $answers = $this->getAnswers($request->user(), true);
        return view('exercises.profile.edit')->with([
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
        $redirect = redirect()->route('exercises.profile.show');
        $answers = ($request->has('p')) ? $request->get('p') : null;
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
     * Map answers to profile
     *
     * @param  array  $answers
     * @return string
     */
    private function mapAnswers($answers)
    {
        $map = [
            [ 'a' => 1, 'b' => 3, 'c' => 5 ],
            [ 'a' => 0, 'b' => 2, 'c' => 4 ],
            [ 'a' => 1, 'b' => 3, 'c' => 5 ],
            [ 'a' => 0, 'b' => 3, 'c' => 5 ],
            [ 'a' => 1, 'b' => 3, 'c' => 5, 'd' => 0 ],
            [ 'a' => 0, 'b' => 1, 'c' => 3, 'd' => 5 ]
        ];

        $mapped = [];
        foreach ($answers as $key => $answer) {
            $mapped[$key] = $map[$key][$answer];
        }

        return $mapped;
    }
}
