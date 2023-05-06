<?php
/*
|--------------------------------------------------------------------------
| Tools
|--------------------------------------------------------------------------
*/

Route::prefix('budget')
    ->group(function () {
        Route::post('/active/principal')
            ->uses('BudgetController@activePrincipal')
            ->name('budget.active.principal');

        Route::post('/active/month')
            ->uses('BudgetController@activeMonth')
            ->name('budget.active.month');

        Route::post('/active/year')
        ->uses('BudgetController@activeYear')
        ->name('budget.active.year');

        /*
        Route::post('/')
            ->uses('BudgetController@store');
            ->name('budget.active12')*/
    });

    /*/budget/active/month
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
