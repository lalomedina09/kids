<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ JsonResponse, Request, Response };

use App\Http\Requests\SaveCourseSpeakerRequest;
use App\Models\{ Speaker, Course };

class CourseSpeakerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveCourseSpeakerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveCourseSpeakerRequest $request)
    {
        $course = Course::find($request->get('course_id'));
        $speaker = Speaker::find($request->get('speaker_id'));
        $course->speakers()->attach($speaker->id);

        // Check if the request is expecting a json response
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(compact('speaker'));
        }

        return $speaker;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SaveCourseSpeakerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(SaveCourseSpeakerRequest $request)
    {
        $course = Course::find($request->get('course_id'));
        $speaker = Speaker::find($request->get('speaker_id'));
        $course->speakers()->detach($speaker->id);

       return response('', 204);
    }
}
