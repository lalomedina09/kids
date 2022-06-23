<?php

namespace App\Http\Controllers\Exercises;

use Illuminate\Http\Request;

class DependantController extends BaseController
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
        $this->name = 'dependants';
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
            return redirect()->route('exercises.dependant.edit');
        }

        $total = collect($answers)->reduce(function ($carry, $item) {
            return $carry + $item['amount'];
        });

        return view('exercises.dependant.show')->with([
            'answers' => $answers,
            'total' => $total
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
        return view('exercises.dependant.edit')->with([
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
        $redirect = redirect()->route('exercises.dependant.show');
        $answers = ($request->has('d')) ? $request->get('d') : null;
        if (!$answers) {
            return $redirect;
        }

        $answers = array_values($answers);
        $this->saveAnswers($answers, $request->user());

        return $redirect->with('success', '');
    }
}
