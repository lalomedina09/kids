<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
$router->get('videos', 'VideoController@index');
$router->get('videos/{category}', 'VideoController@category');

$router->get('podcast', 'PodcastController@index');
$router->get('podcast/{category}', 'PodcastController@category');
*/
$router->get('talleres/{category}', 'CourseController@category');

//$router->delete('users/{user}', 'UserController@destroy');

// Likes
Route::prefix('v1')->group(function () {
    // Home
    Route::get('/', 'HomeController@getAPIInfo');

    // Check JWT Token
    Route::post('/me', 'HomeController@getAPIInfo')
        ->middleware(['verifyToken']);

    // Categories
    Route::prefix('categories')
        ->middleware(['verifyToken'])
        ->group(function () {
            Route::get('/', 'CategoryController@index');
            Route::get('/{category_id}', 'CategoryController@show');
        });

    Route::prefix('bookmarks')
        ->middleware(['verifyToken'])
        ->group(function () {
            Route::get('/', 'BookmarkController@index');
            Route::post('/', 'BookmarkController@toggle');
        });

    Route::prefix('likes')
        ->middleware(['verifyToken'])
        ->group(function () {
            Route::get('/', 'LikeController@index');
            Route::post('/', 'LikeController@toggle');
        });

    Route::prefix('users')
        ->middleware(['verifyToken'])
        ->group(function () {
            Route::get('/search', 'UserController@search');
        });

    Route::prefix('zipcodes')
        ->group(function () {
            Route::get('/{zipcode}', 'ZipcodeController@get');
        });
});
