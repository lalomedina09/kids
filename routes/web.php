<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$router->pattern('slug', '[a-z0-9-]+');


/*
|--------------------------------------------------------------------------
| Localization
|--------------------------------------------------------------------------
*/

Route::get('i18n')
    ->uses('LocalizationController@get')
    ->name('assets.lang');


/*
|--------------------------------------------------------------------------
| Static Pages
|--------------------------------------------------------------------------
*/
Route::get('/')
    ->uses('HomeController@indexRedesign')
    ->name('home');



