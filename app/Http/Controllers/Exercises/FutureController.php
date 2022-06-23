<?php

namespace App\Http\Controllers\Exercises;

use Illuminate\Http\Request;

class FutureController extends BaseController
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
        $this->name = 'future';
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
            return redirect()->route('exercises.future.edit');
        }

        return view('exercises.future.show')->with([
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
        $answers = $this->getAnswers($request->user(), true);
        return view('exercises.future.edit')->with([
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
        $redirect = redirect()->route('exercises.future.show');
        $answers = ($request->has('f')) ? $request->get('f') : null;
        if (!$answers) {
            return $redirect;
        }

        $this->saveAnswers($answers, $request->user());

        return $redirect->with('success', '');
    }
}
