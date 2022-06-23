<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Helpers\Helpers;
use App\Models\Bookmark;

use Exception;

class BookmarkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        try {
            $bookmarkable = Bookmark::validateBookmarkableCode($request->get('code'));
        } catch (Exception $e) {
            return Helpers::makeJsonResponse(Response::HTTP_BAD_REQUEST, $data=[
                'error' => true,
                'result' => ['errors' => $e->getMessage()]
            ]);
        }

        $result = $bookmarkable->bookmarks()->count();
        return Helpers::makeJsonResponse(Response::HTTP_OK, $data=[
            'error' => false,
            'result' => $result
        ]);
    }

    /**
     * Toggle bookmark on storage
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toggle(Request $request)
    {
        $user = $request->user();
        try {
            $bookmarkable = Bookmark::validateBookmarkableCode($request->get('code'));
        } catch (Exception $e) {
            return Helpers::makeJsonResponse(Response::HTTP_BAD_REQUEST, $data=[
                'error' => true,
                'result' => ['errors' => $e->getMessage()]
            ]);
        }

        $bookmark = $bookmarkable->saveBookmark($user);
        $result = ($bookmark) ? !$bookmark->trashed() : false;
        return Helpers::makeJsonResponse(Response::HTTP_OK, $data=[
            'error' => false,
            'result' => $result
        ]);
    }
}
