<?php

/*
|--------------------------------------------------------------------------
| Landing pages
|--------------------------------------------------------------------------
*/

Route::get('/asesoria', 'MainController@adviceGeneral');
Route::get('/asesoriafiscal', 'MainController@adviceLegal');
Route::get('/asesoriafinanzaspersonales', 'MainController@advicePersonalFinances');

Route::prefix('registrocuradeuda')
    ->group(function () {
        Route::get('/')
            ->uses('CuradeudaController@show');

        Route::post('/')
            ->uses('CuradeudaController@store');
    });

Route::prefix('registroresuelvetudeuda')
    ->group(function () {
        Route::get('/')
            ->uses('ResuelveTuDeudaController@show');

        Route::post('/')
            ->uses('ResuelveTuDeudaController@store');
    });

Route::prefix('registromasterplan')
    ->group(function () {
        Route::get('/')
            ->uses('MasterPlanController@show');

        Route::post('/')
            ->uses('MasterPlanController@store');
    });

Route::prefix('registrofibrax')
    ->group(function () {
        Route::get('/')
            ->uses('FibraxController@show');

        Route::post('/')
            ->uses('FibraxController@store');
    });
Route::prefix('registrofinanzaspersonales')
    ->group(function () {
        Route::get('/')
            ->uses('PersonalesController@show');

        Route::post('/')
            ->uses('PersonalesController@store');
    });
Route::prefix('registrofinanzaspareja')
    ->group(function () {
        Route::get('/')
            ->uses('ParejaController@show');

        Route::post('/')
            ->uses('ParejaController@store');
    });
Route::prefix('registrobasico')
    ->group(function () {
        Route::get('/')
            ->uses('BasicoController@show');

        Route::post('/')
            ->uses('BasicoController@store');
    });
Route::prefix('registroinversiones')
    ->group(function () {
        Route::get('/')
            ->uses('InversionesController@show');

        Route::post('/')
            ->uses('InversionesController@store');
    });
Route::prefix('registroempresas')
    ->group(function () {
        Route::get('/')
            ->uses('EmpresasController@show');

        Route::post('/')
            ->uses('EmpresasController@store');
    });
Route::prefix('registroimpuestos')
    ->group(function () {
        Route::get('/')
            ->uses('ImpuestosController@show');

        Route::post('/')
            ->uses('ImpuestosController@store');
    });
Route::prefix('registro100ladrillos')
    ->group(function () {
        Route::get('/')
            ->uses('LadrillosController@show');

        Route::post('/')
            ->uses('LadrillosController@store');
    });
Route::prefix('registrotiendanube')
    ->group(function () {
        Route::get('/')
            ->uses('NubeController@show');

        Route::post('/')
            ->uses('NubeController@store');
    });
Route::prefix('registromexicanadebecas')
    ->group(function () {
        Route::get('/')
            ->uses('BecasController@show');

        Route::post('/')
            ->uses('BecasController@store');
    });
Route::prefix('registrogarvi')
    ->group(function () {
        Route::get('/')
            ->uses('GarbiController@show');

        Route::post('/')
            ->uses('GarbiController@store');
    });
