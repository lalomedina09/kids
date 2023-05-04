<?php
/*
|--------------------------------------------------------------------------
| Tools
|--------------------------------------------------------------------------
*/

Route::prefix('budget')
    ->group(function () {
        Route::post('/active')
            ->uses('BudgetController@active')
            ->name('budget.active');

        /*
        Route::post('/')
            ->uses('BudgetController@store');
            ->name('budget.active12')*/
    });

    /*
Route::prefix('registroresuelvetudeuda')
    ->group(function () {
        Route::get('/')
            ->uses('ResuelveTuDeudaController@show')
            ->name('budget.active.wqew');

        Route::post('/')
            ->uses('ResuelveTuDeudaController@store')
            ->name('budget.active.weq1');
    });
*/
