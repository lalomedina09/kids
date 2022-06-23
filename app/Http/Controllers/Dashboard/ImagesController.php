<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Cloud;

class ImagesController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Filesystem\Cloud
     */
    private $cloud;

    /**
     * ImagesController constructor.
     *
     * @param  \Illuminate\Contracts\Filesystem\Cloud  $cloud
     */
    public function __construct(Cloud $cloud)
    {
        $this->cloud = $cloud;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : JsonResponse
    {
        $this->validate($request, ['file' => 'required|mimes:jpg,jpeg,png,gif']);

        $path = $this->cloud->putFile('uploads/'.date('Y/m'), $request->file('file'));

        $this->cloud->setVisibility($path, 'public');

        return response()->json([
            'success' => true,
            'location' => config('services.imgix.domain').'/'.$path,
        ]);
    }
}
