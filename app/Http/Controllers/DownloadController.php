<?php

namespace App\Http\Controllers;

use Illuminate\Http\{ Request, Response };

use App\Models\Download;

use Date;

class DownloadController extends Controller
{

    /**
     * Create a new resource instance
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('downloads.index')->with([
            'downloads' => Download::all()
        ]);
    }

    /**
     * Serve a file
     *
     * @param  string  $slug
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function download($slug, Request $request)
    {
        $download = Download::where('slug', $slug)->first();
        if (!$download->payload) {
            if ($request->ajax()) {
                return Helpers::makeJsonResponse(Response::HTTP_NOT_FOUND, $data=[]);
            } else {
                abort(Response::HTTP_NOT_FOUND);
            }
        }

        return response()->stream(function () use ($download) {
            echo stream_get_contents($download->payload->stream());
        }, Response::HTTP_OK, [
            'Content-Type' => $download->payload->mime_type,
            'Content-Disposition' => ' filename="' . $download->payload->file_name . '"',
            'Content-Length' => $download->payload->size,
            'Last-Modified' => $download->updated_at->format('D, d M Y H:i:s T'),
            'ETag' => '"' . $download->slug . '"',
            'Cache-Control' => 'private, max-age=31536000', // 1 year only final clients
            'Expires' => Date::now()->add('1 year')->format('D, d M Y H:i:s T')
        ]);
    }
}
