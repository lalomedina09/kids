<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\{ Contact, Course };
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveContactRequest;

class CourseContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\SaveContactRequest $request
     * @return Question
     */
    public function store(SaveContactRequest $request)
    {
        $this->validate($request, ['contactable_id' => 'exists:courses,id']);

        $contact = new Contact($request->all());
        $course = Course::find($request->input('contactable_id'));
        $course->contacts()->save($contact);

        // Check if the request is expecting a json response
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(compact('contact'));
        }

        return $contact;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\SaveContactRequest $request
     * @param int     $id
     * @return Question
     */
    public function update(SaveContactRequest $request, $id)
    {
        $this->validate($request, ['contactable_id' => 'exists:courses,id']);

        $contact = Contact::find($id);
        $contact->update($request->all());

        // Check if the request is expecting a json response
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(compact('contact'));
        }

        return $contact;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id) : Response
    {
        Contact::find($id)->delete();

        return response('', 204);
    }
}
