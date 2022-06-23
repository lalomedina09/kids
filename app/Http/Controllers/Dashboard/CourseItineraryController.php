<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\{ Itinerary, Course };
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveItineraryRequest;

class CourseItineraryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\SaveItineraryRequest $request
     * @return Question
     */
    public function store(SaveItineraryRequest $request)
    {
        $itinerary = Itinerary::create($request->all());

        // Check if the request is expecting a json response
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(compact('itinerary'));
        }

        return $itinerary;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\SaveItineraryRequest $request
     * @param int     $id
     * @return Question
     */
    public function update(SaveItineraryRequest $request, $id)
    {
        $itinerary = Itinerary::find($id);
        $itinerary->update($request->all());

        // Check if the request is expecting a json response
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(compact('itinerary'));
        }

        return $itinerary;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id) : Response
    {
        Itinerary::find($id)->delete();

        return response('', 204);
    }
}
