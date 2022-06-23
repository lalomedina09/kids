<?php

namespace App\Http\Controllers\Exercises;

use App\Http\Controllers\Controller;

use App\Models\ExerciseAnswer;
use App\Models\User;

class BaseController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Protected methods
    |--------------------------------------------------------------------------
    */

    /**
     * Read exercises json
     *
     * @return \Illuminate\Support\Collection
     */
    protected function readJson()
    {
        $filename = storage_path('app/exercises/index.json');
        $exercises_json = file_get_contents($filename);
        $exercises = json_decode($exercises_json);
        return collect($exercises);
    }


    /**
     * Get exercise answers
     *
     * @param  array  $answers
     * @param  \App\Models\User  $user
     * @return \Illuminate\Support\Collection
     */
    protected function saveAnswers($answers, User $user)
    {
        $exercise_answers = ($this->getAnswers($user)) ?: new ExerciseAnswer;
        $exercise_answers->exercise_name = $this->name;
        $exercise_answers->answers = $answers;
        if (!$exercise_answers->exists) {
            $exercise_answers->user()->associate($user);
        }
        $exercise_answers->save();
        return $exercise_answers;
    }

    /**
     * Get exercise answers
     *
     * @param  \App\Models\User  $user
     * @param  boolean  $only_answers
     * @return mixed
     */
    protected function getAnswers(User $user, $only_answers=false)
    {
        $answers = $user->exercises()->where('exercise_name', $this->name)->first();
        return (
            ($answers instanceof ExerciseAnswer) ? (
                ($only_answers) ? $answers->answers : $answers
            ) : null
        );
    }
}
