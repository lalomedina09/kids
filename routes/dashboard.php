<?php

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
*/

$router->pattern('id', '\d+');

Route::get('/')
    ->uses('DashboardController@index')
    ->name('index');

Route::post('uploads/images')
    ->uses('ImagesController@store')
    ->name('uploads.images.store');

Route::prefix('blog')
    ->group(function () {
        // Articles
        Route::prefix('articles')
            ->group(function () {
                Route::get('/')
                    ->uses('ArticleController@index')
                    ->name('articles.index')
                    ->middleware(['permission:blog.articles.index']);

                Route::get('/trashed')
                    ->uses('ArticleController@trashed')
                    ->name('articles.trashed')
                    ->middleware(['permission:blog.articles.index']);

                Route::get('/create')
                    ->uses('ArticleController@create')
                    ->name('articles.create')
                    ->middleware(['permission:blog.articles.create']);

                Route::post('/')
                    ->uses('ArticleController@store')
                    ->name('articles.store')
                    ->middleware(['permission:blog.articles.create']);

                Route::prefix('{article_id}')
                    ->group(function () {
                        Route::get('/')
                            ->uses('ArticleController@edit')
                            ->name('articles.edit')
                            ->middleware(['permission:blog.articles.update']);

                        Route::patch('/')
                            ->uses('ArticleController@update')
                            ->name('articles.update')
                            ->middleware(['permission:blog.articles.update']);

                        Route::post('/update-slug')
                            ->uses('ArticleController@updateSlug')
                            ->name('articles.updateslug')
                            ->middleware(['permission:blog.articles.update']);

                        Route::delete('/')
                            ->uses('ArticleController@destroy')
                            ->name('articles.destroy')
                            ->middleware(['permission:blog.articles.delete']);

                        Route::post('/')
                            ->uses('ArticleController@restore')
                            ->name('articles.restore')
                            ->middleware(['permission:blog.articles.delete']);

                        Route::post('/publish')
                            ->uses('ArticleController@publish')
                            ->name('articles.publish')
                            ->middleware(['permission:blog.articles.publish']);

                        Route::delete('/publish')
                            ->uses('ArticleController@unpublish')
                            ->name('articles.unpublish')
                            ->middleware(['permission:blog.articles.publish']);
                    });
            });

        // Videos
        Route::prefix('videos')
            ->group(function () {
                Route::get('/')
                    ->uses('VideoController@index')
                    ->name('videos.index')
                    ->middleware(['permission:blog.videos.index']);

                Route::get('videos/trashed')
                    ->uses('VideoController@trashed')
                    ->name('videos.trashed')
                    ->middleware(['permission:blog.videos.index']);

                Route::get('/create')
                    ->uses('VideoController@create')
                    ->name('videos.create')
                    ->middleware(['permission:blog.videos.create']);

                Route::post('/create')
                    ->uses('VideoController@store')
                    ->name('videos.store')
                    ->middleware(['permission:blog.videos.create']);

                Route::prefix('{video_id}')
                    ->group(function () {
                        Route::get('/')
                            ->uses('VideoController@edit')
                            ->name('videos.edit')
                            ->middleware(['permission:blog.videos.update']);

                        Route::patch('/')
                            ->uses('VideoController@update')
                            ->name('videos.update')
                            ->middleware(['permission:blog.videos.update']);

                        Route::delete('/')
                            ->uses('VideoController@destroy')
                            ->name('videos.destroy')
                            ->middleware(['permission:blog.videos.delete']);

                        Route::post('/')
                            ->uses('VideoController@restore')
                            ->name('videos.restore')
                            ->middleware(['permission:blog.videos.delete']);

                        Route::post('/publish')
                            ->uses('VideoController@publish')
                            ->name('videos.publish')
                            ->middleware(['permission:blog.videos.publish']);

                        Route::delete('/publish')
                            ->uses('VideoController@unpublish')
                            ->name('videos.unpublish')
                            ->middleware(['permission:blog.videos.publish']);
                    });
            });

        // Podcasts
        Route::prefix('podcasts')
            ->group(function () {
                Route::get('/')
                    ->uses('PodcastController@index')
                    ->name('podcasts.index')
                    ->middleware(['permission:blog.podcasts.index']);

                Route::get('/trashed')
                    ->uses('PodcastController@trashed')
                    ->name('podcasts.trashed')
                    ->middleware(['permission:blog.podcasts.index']);

                Route::get('/create')
                    ->uses('PodcastController@create')
                    ->name('podcasts.create')
                    ->middleware(['permission:blog.podcasts.create']);

                Route::post('/')
                    ->uses('PodcastController@store')
                    ->name('podcasts.store')
                    ->middleware(['permission:blog.podcasts.create']);

                Route::prefix('{podcast_id}')
                    ->group(function () {
                        Route::get('/')
                            ->uses('PodcastController@edit')
                            ->name('podcasts.edit')
                            ->middleware(['permission:blog.podcasts.update']);

                        Route::patch('/')
                            ->uses('PodcastController@update')
                            ->name('podcasts.update')
                            ->middleware(['permission:blog.podcasts.update']);

                        Route::delete('/')
                            ->uses('PodcastController@destroy')
                            ->name('podcasts.destroy')
                            ->middleware(['permission:blog.podcasts.delete']);

                        Route::post('/')
                            ->uses('PodcastController@restore')
                            ->name('podcasts.restore')
                            ->middleware(['permission:blog.podcasts.delete']);

                        Route::post('/publish')
                            ->uses('PodcastController@publish')
                            ->name('podcasts.publish')
                            ->middleware(['permission:blog.podcasts.publish']);

                        Route::delete('/publish')
                            ->uses('PodcastController@unpublish')
                            ->name('podcasts.unpublish')
                            ->middleware(['permission:blog.podcasts.publish']);
                    });
            });

        // Covers
        Route::prefix('covers')
            ->group(function () {
                Route::get('/')
                    ->uses('CoversController@index')
                    ->name('covers.index')
                    ->middleware(['permission:blog.covers.index']);

                Route::get('/trashed')
                    ->uses('CoversController@trashed')
                    ->name('covers.trashed')
                    ->middleware(['permission:blog.covers.index']);

                Route::get('/create')
                    ->uses('CoversController@create')
                    ->name('covers.create')
                    ->middleware(['permission:blog.covers.create']);

                Route::post('/')
                    ->uses('CoversController@store')
                    ->name('covers.store')
                    ->middleware(['permission:blog.covers.create']);

                Route::prefix('{id}')
                    ->group(function () {
                        Route::get('/edit')
                            ->uses('CoversController@edit')
                            ->name('covers.edit')
                            ->middleware(['permission:blog.covers.update']);

                        Route::patch('/')
                            ->uses('CoversController@update')
                            ->name('covers.update')
                            ->middleware(['permission:blog.covers.update']);

                        Route::delete('/')
                            ->uses('CoversController@destroy')
                            ->name('covers.destroy')
                            ->middleware(['permission:blog.covers.delete']);

                        Route::post('/')
                            ->uses('CoversController@restore')
                            ->name('covers.restore')
                            ->middleware(['permission:blog.covers.delete']);
                    });
            });

        // Quotes
        Route::prefix('quotes')
            ->group(function () {
                Route::get('/')
                    ->uses('QuotesController@index')
                    ->name('quotes.index')
                    ->middleware(['permission:blog.quotes.index']);

                Route::get('/trashed')
                    ->uses('QuotesController@trashed')
                    ->name('quotes.trashed')
                    ->middleware(['permission:blog.quotes.index']);

                Route::get('/create')
                    ->uses('QuotesController@create')
                    ->name('quotes.create')
                    ->middleware(['permission:blog.quotes.create']);

                Route::post('/')
                    ->uses('QuotesController@store')
                    ->name('quotes.store')
                    ->middleware(['permission:blog.quotes.create']);

                Route::prefix('{id}')
                    ->group(function () {
                        Route::get('/edit')
                            ->uses('QuotesController@edit')
                            ->name('quotes.edit')
                            ->middleware(['permission:blog.quotes.update']);

                        Route::patch('/')
                            ->uses('QuotesController@update')
                            ->name('quotes.update')
                            ->middleware(['permission:blog.quotes.update']);

                        Route::delete('/')
                            ->uses('QuotesController@destroy')
                            ->name('quotes.destroy')
                            ->middleware(['permission:blog.quotes.delete']);

                        Route::post('/restore')
                            ->uses('QuotesController@restore')
                            ->name('quotes.restore')
                            ->middleware(['permission:blog.quotes.delete']);
                    });
            });

    });

Route::prefix('education')
    ->group(function () {
        // Courses
        Route::prefix('courses')
            ->group(function () {
                Route::get('/')
                    ->uses('CourseController@index')
                    ->name('courses.index')
                    ->middleware(['permission:blog.courses.index']);

                Route::get('/trashed')
                    ->uses('CourseController@trashed')
                    ->name('courses.trashed')
                    ->middleware(['permission:blog.courses.index']);

                Route::get('/create')
                    ->uses('CourseController@create')
                    ->name('courses.create')
                    ->middleware(['permission:blog.courses.create']);

                Route::post('/')
                    ->uses('CourseController@store')
                    ->name('courses.store')
                    ->middleware(['permission:blog.courses.create']);

                // Course Material
                Route::prefix('material')
                    ->middleware(['permission:blog.courses.update'])
                    ->group(function () {
                        Route::get('/')
                            ->uses('CourseMaterialController@index')
                            ->name('courses.material.index');

                        Route::post('/')
                            ->uses('CourseMaterialController@store')
                            ->name('courses.material.store');

                        Route::patch('/{id}')
                            ->uses('CourseMaterialController@update')
                            ->name('courses.material.update');

                        Route::delete('/{id}')
                            ->uses('CourseMaterialController@destroy')
                            ->name('courses.material.destroy');
                    });

                // Course Speaker
                Route::prefix('speaker')
                    ->middleware(['permission:blog.courses.update'])
                    ->group(function () {
                        Route::post('/')
                            ->uses('CourseSpeakerController@store')
                            ->name('courses.speaker.store');

                        Route::patch('/')
                            ->uses('CourseSpeakerController@update')
                            ->name('courses.speaker.update');
                    });

                // Course Itinerary
                Route::prefix('itinerary')
                    ->middleware(['permission:blog.courses.update'])
                    ->group(function () {
                        Route::post('/')
                            ->uses('CourseItineraryController@store')
                            ->name('courses.itinerary.store');

                        Route::patch('/{id}')
                            ->uses('CourseItineraryController@update')
                            ->name('courses.itinerary.update');

                        Route::delete('/{id}')
                            ->uses('CourseItineraryController@destroy')
                            ->name('courses.itinerary.destroy');
                    });

                // Course Contact
                Route::prefix('contact')
                    ->middleware(['permission:blog.courses.update'])
                    ->group(function () {
                        Route::post('/')
                            ->uses('CourseContactController@store')
                            ->name('courses.contact.store');

                        Route::patch('/{id}')
                            ->uses('CourseContactController@update')
                            ->name('courses.contact.update');

                        Route::delete('/{id}')
                            ->uses('CourseContactController@destroy')
                            ->name('courses.contact.destroy');
                    });

                Route::prefix('{course_id}')
                    ->group(function () {
                        Route::get('/edit')
                            ->uses('CourseController@edit')
                            ->name('courses.edit')
                            ->middleware(['permission:blog.courses.update']);

                        Route::patch('/')
                            ->uses('CourseController@update')
                            ->name('courses.update')
                            ->middleware(['permission:blog.courses.update']);

                        Route::delete('/')
                            ->uses('CourseController@destroy')
                            ->name('courses.destroy')
                            ->middleware(['permission:blog.courses.delete']);

                        Route::post('/')
                            ->uses('CourseController@restore')
                            ->name('courses.restore')
                            ->middleware(['permission:blog.courses.delete']);

                        Route::post('/publish')
                            ->uses('CourseController@publish')
                            ->name('courses.publish')
                            ->middleware(['permission:blog.courses.publish']);

                        Route::delete('/publish')
                            ->uses('CourseController@unpublish')
                            ->name('courses.unpublish')
                            ->middleware(['permission:blog.courses.publish']);
                    });
            });

        // Speakers
        Route::prefix('speakers')
            ->group(function () {
                Route::get('/')
                    ->uses('SpeakerController@index')
                    ->name('speakers.index')
                    ->middleware(['permission:blog.speakers.index']);

                Route::get('/trashed')
                    ->uses('SpeakerController@trashed')
                    ->name('speakers.trashed')
                    ->middleware(['permission:blog.speakers.index']);

                Route::get('/create')
                    ->uses('SpeakerController@create')
                    ->name('speakers.create')
                    ->middleware(['permission:blog.speakers.create']);

                Route::post('/')
                    ->uses('SpeakerController@store')
                    ->name('speakers.store')
                    ->middleware(['permission:blog.speakers.create']);

                Route::prefix('{id}')
                    ->group(function () {
                        Route::get('/edit')
                            ->uses('SpeakerController@edit')
                            ->name('speakers.edit')
                            ->middleware(['permission:blog.speakers.update']);

                        Route::patch('/')
                            ->uses('SpeakerController@update')
                            ->name('speakers.update')
                            ->middleware(['permission:blog.speakers.update']);

                        Route::delete('/')
                            ->uses('SpeakerController@destroy')
                            ->name('speakers.destroy')
                            ->middleware(['permission:blog.speakers.delete']);

                        Route::post('/')
                            ->uses('SpeakerController@restore')
                            ->name('speakers.restore')
                            ->middleware(['permission:blog.speakers.delete']);
                    });
            });
    });

Route::prefix('administration')
    ->group(function () {
        // Users
        Route::prefix('users')
            ->group(function () {
                Route::get('/')
                    ->uses('UsersController@index')
                    ->name('users.index')
                    ->middleware(['permission:blog.users.index']);

                Route::get('/trashed')
                    ->uses('UsersController@trashed')
                    ->name('users.trashed')
                    ->middleware(['permission:blog.users.index']);

                Route::get('/create')
                    ->uses('UsersController@create')
                    ->name('users.create')
                    ->middleware(['permission:blog.users.create']);

                Route::post('/')
                    ->uses('UsersController@store')
                    ->name('users.store')
                    ->middleware(['permission:blog.users.create']);

                Route::prefix('{id}')
                    ->group(function () {
                        Route::get('/')
                            ->uses('UsersController@show')
                            ->name('users.show')
                            ->middleware(['permission:blog.users.read']);

                        Route::get('/edit')
                            ->uses('UsersController@edit')
                            ->name('users.edit')
                            ->middleware(['permission:blog.users.update']);

                        Route::patch('/{section}')
                            ->uses('UsersController@update')
                            ->name('users.update')
                            ->middleware(['permission:blog.users.update']);

                        Route::delete('/')
                            ->uses('UsersController@destroy')
                            ->name('users.destroy')
                            ->middleware(['permission:blog.users.delete']);

                        Route::post('/')
                            ->uses('UsersController@restore')
                            ->name('users.restore')
                            ->middleware(['permission:blog.users.delete']);

                        Route::post('/password')
                            ->uses('UsersController@reset')
                            ->name('users.password')
                            ->middleware(['permission:blog.users.update']);
                    });
            });

        // Roles and permissions
        Route::prefix('authorization')
            ->group(function () {
                Route::get('/')
                    ->uses('AuthorizationController@index')
                    ->name('authorization.index')
                    ->middleware(['permission:blog.authorization.index']);

                Route::get('/{id}')
                    ->uses('AuthorizationController@show')
                    ->name('authorization.show')
                    ->middleware(['permission:blog.authorization.index']);

                Route::get('/{id}/edit')
                    ->uses('AuthorizationController@edit')
                    ->name('authorization.edit')
                    ->middleware(['permission:blog.authorization.update']);

                Route::post('/{id}')
                    ->uses('AuthorizationController@update')
                    ->name('authorization.update')
                    ->middleware(['permission:blog.authorization.update']);
            });

        // Reports
        Route::prefix('reports')
            ->namespace('Reports')
            ->name('reports.')
            ->group(function () {
                Route::get('/')
                    ->uses('MainController@index')
                    ->name('index')
                    ->middleware(['permission:blog.reports.index']);

                Route::prefix('exercises')
                    ->group(function () {
                        Route::get('/')
                            ->uses('MainController@exercises')
                            ->name('exercises.index')
                            ->middleware(['permission:blog.reports.index']);

                        Route::get('debt')
                            ->uses('ExerciseController@showDebt')
                            ->name('exercises.debt.show')
                            ->middleware(['permission:blog.reports.read']);

                        Route::post('debt')
                            ->uses('ExerciseController@downloadDebt')
                            ->name('exercises.debt.download')
                            ->middleware(['permission:blog.reports.read']);

                    });
            });

        // Pages
        Route::prefix('pages')
            ->group(function () {
                Route::get('/')
                    ->uses('PageController@index')
                    ->name('pages.index')
                    ->middleware(['permission:blog.pages.index']);

                Route::get('/trashed')
                    ->uses('PageController@trashed')
                    ->name('pages.trashed')
                    ->middleware(['permission:blog.pages.index']);

                Route::get('/create')
                    ->uses('PageController@create')
                    ->name('pages.create')
                    ->middleware(['permission:blog.pages.create']);

                Route::post('/')
                    ->uses('PageController@store')
                    ->name('pages.store')
                    ->middleware(['permission:blog.pages.create']);

                Route::prefix('{page_id}')
                    ->group(function () {
                        Route::get('/edit')
                            ->uses('PageController@edit')
                            ->name('pages.edit')
                            ->middleware(['permission:blog.pages.update']);

                        Route::patch('/')
                            ->uses('PageController@update')
                            ->name('pages.update')
                            ->middleware(['permission:blog.pages.update']);

                        Route::delete('/')
                            ->uses('PageController@destroy')
                            ->name('pages.destroy')
                            ->middleware(['permission:blog.pages.delete']);

                        Route::post('/')
                            ->uses('PageController@restore')
                            ->name('pages.restore')
                            ->middleware(['permission:blog.pages.delete']);
                    });
            });

        // Downloads
        Route::prefix('downloads')
            ->group(function () {
                Route::get('/')
                    ->uses('DownloadController@index')
                    ->name('downloads.index')
                    ->middleware(['permission:blog.downloads.index']);

                Route::get('/trash')
                    ->uses('DownloadController@trash')
                    ->name('downloads.trash')
                    ->middleware(['permission:blog.downloads.index']);

                Route::get('/create')
                    ->uses('DownloadController@create')
                    ->name('downloads.create')
                    ->middleware(['permission:blog.downloads.create']);

                Route::post('/')
                    ->uses('DownloadController@store')
                    ->name('downloads.store')
                    ->middleware(['permission:blog.downloads.create']);

                Route::prefix('{id}')
                    ->group(function () {
                        Route::get('/edit')
                            ->uses('DownloadController@edit')
                            ->name('downloads.edit')
                            ->middleware(['permission:blog.downloads.update']);

                        Route::patch('/')
                            ->uses('DownloadController@update')
                            ->name('downloads.update')
                            ->middleware(['permission:blog.downloads.update']);

                        Route::delete('/')
                            ->uses('DownloadController@destroy')
                            ->name('downloads.destroy')
                            ->middleware(['permission:blog.downloads.delete']);

                        Route::post('/restore')
                            ->uses('DownloadController@restore')
                            ->name('downloads.restore')
                            ->middleware(['permission:blog.downloads.delete']);
                    });
            });

        // Landings
        Route::prefix('landings')
            ->group(function () {
                Route::get('/')
                    ->uses('LandingController@index')
                    ->name('landings.index')
                    ->middleware(['permission:blog.landings.index']);

                Route::get('/{page}')
                    ->uses('LandingController@show')
                    ->name('landings.show')
                    ->middleware(['permission:blog.landings.show']);

                Route::get('/exportResults/{page}')
                    ->uses('LandingController@exportResultsLanding')
                    ->name('landings.export.results.excel')
                    ->middleware(['permission:blog.landings.show']);

                Route::get('/custom/{custom_page}')
                    ->uses('LandingController@customShow')
                    ->name('landings.custom.show')
                    ->middleware(['permission:blog.landings.show']);
                });

                Route::get('/export/{form}')
                    ->uses('LandingController@exportDataLanding')
                    ->name('landings.export.results')
                    ->middleware(['permission:blog.landings.show']);


        // Categories
        Route::prefix('categories')
            ->group(function () {
                Route::get('/')
                    ->uses('CategoriesController@index')
                    ->name('categories.index')
                    ->middleware(['permission:blog.categories.index']);

                Route::get('/{id}')
                    ->uses('CategoriesController@show')
                    ->name('categories.show')
                    ->middleware(['permission:blog.categories.show']);

                Route::get('/trashed')
                    ->uses('CategoriesController@trashed')
                    ->name('categories.trashed')
                    ->middleware(['permission:blog.categories.index']);

                Route::get('/create/{id}')
                    ->uses('CategoriesController@create')
                    ->name('categories.create')
                    ->middleware(['permission:blog.categories.create']);

                Route::post('/')
                    ->uses('CategoriesController@store')
                    ->name('categories.store')
                    ->middleware(['permission:blog.categories.create']);

                Route::get('/edit/{id}')
                    ->uses('CategoriesController@edit')
                    ->name('categories.edit')
                    ->middleware(['permission:blog.categories.update']);

                Route::patch('/update/{id}')
                    ->uses('CategoriesController@update')
                    ->name('categories.update')
                    ->middleware(['permission:blog.categories.update']);

                Route::get('/destroy')
                    ->uses('CategoriesController@destroy')
                    ->name('categories.destroy')
                    ->middleware(['permission:blog.categories.delete']);

                Route::post('/search-slug')
                    ->uses('CategoriesController@searchSlug')
                    ->name('categories.searchSlug')
                    ->middleware(['permission:blog.categories.create']);

                Route::post('/search-code')
                    ->uses('CategoriesController@searchCode')
                    ->name('categories.searchcodeCategory')
                    ->middleware(['permission:blog.categories.create']);

            });

    });


Route::prefix('parameters')
    ->group(function () {
        // Parameters Marketplace
        Route::prefix('prices')
            ->group(function () {
                Route::get('/rating')
                    ->uses('ParameterController@price_rating_show')
                    ->name('parameters.prices.rating')
                    ->middleware(['permission:blog.parameters.price.rating.show']);
                Route::post('/rating')
                    ->uses('ParameterController@update')
                    ->name('parameters.price.rate.update')
                    ->middleware(['permission:blog.parameters.price.update']);
    });
});

// Categories
/*
$router->resource('categories', 'CategoriesController', ['as' => 'dashboard', 'except' => ['show', 'edit', 'update', 'destroy']]);
$router->get('categories/{id}/edit', 'CategoriesController@edit')->name('categories.edit');
$router->patch('categories/{id}', 'CategoriesController@update')->name('categories.update');
$router->delete('categories/{id}', 'CategoriesController@destroy')->name('categories.destroy');
$router->post('categories/{id}', 'CategoriesController@restore')->name('categories.restore');
$router->get('categories/trashed', 'CategoriesController@trashed')->name('categories.trashed');

$router->get('video/categories/create', 'VideoCategoriesController@create')->name('video.categories.create');
$router->post('video/categories', 'VideoCategoriesController@store')->name('video.categories.store');
$router->get('video/categories/{id}/edit', 'VideoCategoriesController@edit')->name('video.categories.edit');
$router->patch('video/categories/{id}', 'VideoCategoriesController@update')->name('video.categories.update');
$router->delete('video/categories/{id}', 'VideoCategoriesController@destroy')->name('video.categories.destroy');
$router->post('video/categories/{id}', 'VideoCategoriesController@restore')->name('video.categories.restore');
*/
