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

        Route::post('/active/categories')
        ->uses('BudgetController@activeCategoriesCustom')
        ->name('budget.active.principal');

        //Routes for month
        Route::prefix('active/month')
        ->group(function () {
            Route::post('/')
                ->uses('BudgetController@activeMonth')
                ->name('budget.active.month');

            Route::post('/section')
                ->uses('BudgetController@activeSection')
                ->name('budget.active.section');
        });

        //Routes for month
        Route::prefix('active/year')
        ->group(function () {
            Route::post('/')
            ->uses('BudgetController@activeYear')
            ->name('budget.active.year');

            Route::post('/calendar')
            ->uses('BudgetController@activeCalendar')
            ->name('budget.active.calendar');
        });

        //Routes for edit moves
        Route::prefix('edit/{section}')
        ->group(function () {
            Route::post('/')
                ->uses('BudgetController@editInput')
                ->name('budget.edit.section');

            /*Route::post('/calendar')
            ->uses('BudgetController@activeCalendar')
            ->name('budget.active.calendar');*/
        });

    });


