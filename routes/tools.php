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

            Route::post('/section/filter-month')
            ->uses('BudgetController@activeSectionFilterDate')
            ->name('budget.active.section.filter');
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

        //Routes for add Move
        Route::prefix('addmove/modal')
        ->group(function () {
            Route::post('/open')
                ->uses('BudgetController@AddMoveModalOpen')
                ->name('budget.add.move.modal.open');

            Route::post('/save')
                ->uses('BudgetController@AddMoveModalSave')
                ->name('budget.add.move.modal.save');
        });

        //Routes for activate show modals
        Route::prefix('modal/year')
        ->group(function () {
            Route::post('/movements')
                ->uses('BudgetController@AddMoveModalOpen')
                ->name('budget.add.move.modal.open');

            Route::post('/zoom')
                ->uses('BudgetController@AddMoveModalSave')
                ->name('budget.add.move.modal.save');
        });
    });


