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

            Route::get('/download/pdf-moves/{year}/{month}')
            ->uses('BudgetController@donwloadMoves')
            ->name('budget.active.download.pdf');
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

            Route::post('/section/filter-year-calendar')
            ->uses('BudgetController@activeCalendarFilterYearCalendar')
            ->name('budget.active.calendar.year.filter');

            Route::post('/report')
            ->uses('BudgetController@activeYearReport')
            ->name('budget.active.year.report');

            Route::post('/section/filter-year-report')
            ->uses('BudgetController@activeCalendarFilterYearReport')
            ->name('budget.active.calendar.year.filter');
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
                ->uses('BudgetModalsController@AddMoveModalOpen')
                ->name('budget.add.move.modal.open');

            Route::post('/save')
                ->uses('BudgetModalsController@AddCategoryModalSave')
                ->name('budget.add.move.modal.save');

            Route::post('open/add/move-to-category')
            ->uses('BudgetModalsController@addMoveToCategoryModalOpen')
            ->name('budget.add.move.modal.add.category.open');

            Route::post('open/add/move-to-category/save')
            ->uses('BudgetModalsController@AddMoveToCategoryModalSave')
            ->name('budget.add.move.modal.add.category.save');
        });

        //Routes for delete Move
        Route::prefix('deletemove/modal')
        ->group(function () {
            Route::post('/open')
                ->uses('BudgetModalsController@deleteMoveModalOpen')
                ->name('budget.delete.move.modal.open');

            Route::post('/confirm')
                ->uses('BudgetModalsController@deleteMoveModalConfirm')
                ->name('budget.delete.move.modal.confirm');
        });

        //Routes for actions level move
        Route::prefix('actions/modal')
        ->group(function () {
            Route::post('/show-moves')
                ->uses('BudgetModalsController@modalMovesShow')
                ->name('budget.delete.modal.open.actions.show');

            Route::post('/update-moves')
            ->uses('BudgetModalsController@modalMovesUpdate')
            ->name('budget.delete.modal.open.actions.update');

            Route::post('/destroy-move')
            ->uses('BudgetModalsController@moveDestroy')
            ->name('budget.delete.modal.open.actions.destroy');
        });

        //Routes for activate show modals
        Route::prefix('modal/year')
        ->group(function () {
            Route::post('/movements')
                ->uses('BudgetModalsController@openModalYearMovements')
                ->name('budget.view.moves.modal.open');

            Route::post('/zoom')
                ->uses('BudgetModalsController@openModalYearZoom')
                ->name('budget.zoom.card.modal.month');
        });
    });


//deletemove
