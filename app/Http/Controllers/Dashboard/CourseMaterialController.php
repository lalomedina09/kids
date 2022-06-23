<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\{ Material, Course };
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveMaterialRequest;

class CourseMaterialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filename = storage_path('app/json/course_extras.json');
        $contents = file_get_contents($filename);
        $course_extras = json_decode($contents);
        return response()->json($course_extras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\SaveMaterialRequest $request
     * @return Question
     */
    public function store(SaveMaterialRequest $request)
    {
        $material = Material::create($request->all());

        // Check if the request is expecting a json response
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(compact('material'));
        }

        return $material;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\SaveMaterialRequest $request
     * @param int     $id
     * @return Question
     */
    public function update(SaveMaterialRequest $request, $id)
    {
        $material = Material::find($id);
        $material->update($request->all());

        // Check if the request is expecting a json response
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(compact('material'));
        }

        return $material;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id) : Response
    {
        Material::find($id)->delete();

        return response('', 204);
    }
}
