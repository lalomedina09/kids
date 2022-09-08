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
| Testing
|--------------------------------------------------------------------------
*/

Route::any('test')
    ->uses('HomeController@test')
    ->name('test');

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
| Authentication
|--------------------------------------------------------------------------
*/

Route::prefix('iniciar-sesion')
    ->namespace('Auth')
    ->group(function () {
        Route::get('/')
            ->uses('LoginController@showLoginForm')
            ->name('login');

        Route::post('/')
            ->uses('LoginController@login');
    });

Route::any('cerrar-sesion')
    ->uses('Auth\LoginController@logout')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Register
|--------------------------------------------------------------------------
*/

Route::prefix('registro')
    ->middleware(['guest'])
    ->group(function () {
        Route::get('/')
            ->uses('RegisterController@showRegistrationForm')
            ->name('register');

        Route::post('/')
            ->uses('RegisterController@store')
            ->name('register.store');
    });

/*
|--------------------------------------------------------------------------
| Password Reset
|--------------------------------------------------------------------------
*/

Route::prefix('password')
    ->namespace('Auth')
    ->group(function () {
        Route::get('/reset')
            ->uses('ForgotPasswordController@showLinkRequestForm')
            ->name('password.request');

        Route::post('/email')
            ->uses('ForgotPasswordController@sendResetLinkEmail')
            ->name('password.email');

        Route::get('/reset/{token}')
            ->uses('ResetPasswordController@showResetForm')
            ->name('password.reset');

        Route::post('/reset')
            ->uses('ResetPasswordController@reset');

        //- - - - - - - - - - - - - - - - QD P L A Y- - - - - - - - - - - - - - - - - //
        Route::get('/qdplay/reset')
            ->uses('QdplayForgotPasswordController@showLinkRequestForm')
            ->name('password.qdplay.request');

        Route::post('/qdplay/email')
            ->uses('QdplayForgotPasswordController@submitForgetPasswordForm')
            ->name('password.qdplay.email');

        Route::get('/qdplay/reset/{token}')
            ->uses('QdplayResetPasswordController@showResetPasswordForm')
            ->name('password.qdplay.reset');

        Route::post('/qdplay/reset')
            ->uses('QdplayResetPasswordController@reset');
    });

/*
|--------------------------------------------------------------------------
| Static pages
|--------------------------------------------------------------------------
*/

Route::get('/')
    ->uses('HomeController@index')
    ->name('home');

Route::get('/busqueda')
    ->uses('SearchController@index')
    ->name('search');

Route::get('/contacto')
    ->uses('PagesController@contact')
    ->name('contact');

Route::get('/sobre-nosotros')
    ->uses('PagesController@about')
    ->name('about');

Route::get('/politicas-de-devoluciones')
    ->uses('PagesController@policies')
    ->name('policies');

Route::get('/aviso-de-privacidad')
    ->uses('PagesController@privacy')
    ->name('privacy');

Route::get('/colaboraciones')
    ->uses('PagesController@collaborations')
    ->name('collaborations');

Route::get('/terminos-y-condiciones')
    ->uses('PagesController@terms')
    ->name('terms');

Route::get('/pages/{slug}')
    ->uses('PagesController@show')
    ->name('pages.show');

Route::get('/descargas-libro', function () {
    return redirect()->route('pages.show', ['slug' => 'descargas-libro']);
});
Route::get('/descargas-libro.html', function () {
    return redirect()->route('pages.show', ['slug' => 'descargas-libro']);
});

Route::get('/qdplay')
    ->uses('PagesController@cs_qdplay')
    ->name('qdplay');

Route::prefix('/registro-qdplay-empresas')
->group(function () {
    Route::get('/')
    ->uses('Landing\QdplayEmpresasController@show')
    ->name('register.qdplay.show');

    Route::post('/')
    ->uses('Landing\QdplayEmpresasController@store')
    ->name('register.qdplay.store');
});

/*
|--------------------------------------------------------------------------
| Articles
|--------------------------------------------------------------------------
*/

Route::get('/blog')
    ->uses('HomeController@blog')
    ->name('blog');

Route::prefix('articulos')
    ->group(function () {
        Route::get('/')
            ->uses('ArticlesController@index')
            ->name('articles.index');

        Route::get('/{slug}')
            ->uses('ArticlesController@show')
            ->name('articles.show');

        Route::get('/categorias/{slug}')
            ->uses('ArticlesController@byCategory')
            ->name('articles.category.index');

        Route::get('/etiquetas/{slug}')
            ->uses('ArticlesController@byTag')
            ->name('articles.tags.index');
    });

/*
|--------------------------------------------------------------------------
| Videos
|--------------------------------------------------------------------------
*/

Route::prefix('videos')
    ->group(function () {
        Route::get('/')
            ->uses('VideosController@index')
            ->name('videos.index');

        Route::get('/{slug}')
            ->uses('VideosController@show')
            ->name('videos.show');

        Route::get('/categorias/{slug}')
            ->uses('VideosController@byCategory')
            ->name('videos.category.index');

        Route::get('/etiquetas/{slug}')
            ->uses('VideosController@byTag')
            ->name('videos.tags.index');
    });

/*
|--------------------------------------------------------------------------
| Podcasts
|--------------------------------------------------------------------------
*/

Route::prefix('podcasts')
    ->group(function () {
        Route::get('/')
            ->uses('PodcastsController@index')
            ->name('podcasts.index');

        Route::get('/{slug}')
            ->uses('PodcastsController@show')
            ->name('podcasts.show');

        Route::get('/categorias/{slug}')
            ->uses('PodcastsController@byCategory')
            ->name('podcasts.category.index');

        Route::get('/etiquetas/{slug}')
            ->uses('PodcastsController@byTag')
            ->name('podcasts.tags.index');
    });

/*
|--------------------------------------------------------------------------
| Courses
|--------------------------------------------------------------------------
*/

Route::prefix('talleres')
    ->group(function () {
        Route::get('/')
            ->uses('CourseController@index')
            ->name('courses.index');

        Route::get('/{slug}')
            ->uses('CourseController@show')
            ->name('courses.show');

        Route::get('testUrl/{id}')
            ->uses('CourseController@getUsos')
            ->name('courses.getUsos')
            ->middleware(['auth']);

        Route::get('paypal/pay/{descuento}')
        ->uses('PaymentController2@payWithPayPal')
        ->name('courses.payWithPayPal')
        ->middleware(['auth']);

        Route::post('/{slug}/comprar')
            ->uses('CourseController@buy')
            ->name('courses.buy')
            ->middleware(['auth']);

        Route::get('/categorias/{slug}')
            ->uses('CourseController@byCategory')
            ->name('courses.category.index');

        Route::post('/register/form')
            ->uses('CourseController@registerFormContact')
            ->name('courses.register.form');

    });

/*
|--------------------------------------------------------------------------
| Notifications
|--------------------------------------------------------------------------
*/
Route::prefix('notifications')
->group(function () {
    Route::get('/')
        ->uses('NotificationController@index')
        ->name('notification.index');

    Route::post('/updateStatus')
        ->uses('NotificationController@updateStatus')
        ->name('notification.update.status');

    Route::post('/adviseds')
        ->uses('NotificationController@adviseds')
        ->name('notification.get.adviseds');
    /*
    Route::get('ver/{video}')
        ->uses('PreQdPlayCourseController@show')
        ->name('qdplay.show');

    Route::get('paypal/pay/{descuento}')
    ->uses('PaypalPreqdplayController@payWithPayPal')
    ->name('preqdplay.payWithPayPal')
    ->middleware(['auth']);

    Route::post('/{slug}/comprar')
    ->uses('PreQdPlayCourseController@buy')
    ->name('qdplay.buy')
    ->middleware(['auth']);*/
});

/*
|--------------------------------------------------------------------------
| QD-PLAY Promotions
|--------------------------------------------------------------------------
*/

Route::prefix('qdplay')
    ->group(function () {
        Route::get('/')
            ->uses('PreQdPlayCourseController@index')
            ->name('qdplay.index');

        Route::get('ver/{video}')
            ->uses('PreQdPlayCourseController@show')
            ->name('qdplay.show');

        Route::get('paypal/pay/{descuento}')
        ->uses('PaypalPreqdplayController@payWithPayPal')
        ->name('preqdplay.payWithPayPal')
        ->middleware(['auth']);

    Route::post('/{slug}/comprar')
        ->uses('PreQdPlayCourseController@buy')
        ->name('qdplay.buy')
        ->middleware(['auth']);
    });

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::prefix('perfil')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/')
            ->uses('ProfileController@edit')
            ->name('profile.edit');

        Route::post('/{section}')
            ->uses('ProfileController@update')
            ->name('profile.update');
    });

/*
|--------------------------------------------------------------------------
| Authors
|--------------------------------------------------------------------------
*/

Route::prefix('escritores')
    ->group(function () {
        Route::get('/')
            ->uses('AuthorController@index')
            ->name('authors.index');

        Route::get('/{key}')
            ->uses('AuthorController@show')
            ->name('authors.show');
    });

/*
 |--------------------------------------------------------------------------
 | Downloads
 |--------------------------------------------------------------------------
 */

Route::prefix('descargas')
    ->group(function () {
        Route::get('/')
            ->uses('DownloadController@index')
            ->name('downloads.index');

        Route::get('/{slug}')
            ->uses('DownloadController@download')
            ->name('downloads.download')
            ->middleware(['auth']);
    });

/*
|--------------------------------------------------------------------------
| Subscriber Newsletter
|--------------------------------------------------------------------------
*/

Route::post('newsletter')
    ->uses('NewsletterController@store')
    ->name('newsletter.store');

Route::delete('newsletter')
    ->uses('NewsletterController@destroy')
    ->name('newsletter.destroy');

/*
 |--------------------------------------------------------------------------
 | Exercises
 |--------------------------------------------------------------------------
 */

Route::name('exercises.')
    ->prefix('ejercicios')
    ->namespace('Exercises')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/')
            ->uses('MainController@index')
            ->name('index');

        Route::prefix('mi-perfil-de-inversionista')
            ->group(function () {
                Route::get('/')
                    ->uses('ProfileController@show')
                    ->name('profile.show');

                Route::get('/editar')
                    ->uses('ProfileController@edit')
                    ->name('profile.edit');

                Route::post('/')
                    ->uses('ProfileController@update')
                    ->name('profile.update');
            });

        Route::prefix('mi-yo-del-futuro')
            ->group(function () {
                Route::get('/')
                    ->uses('FutureController@show')
                    ->name('future.show');

                Route::get('/editar')
                    ->uses('FutureController@edit')
                    ->name('future.edit');

                Route::post('/')
                    ->uses('FutureController@update')
                    ->name('future.update');
            });

        Route::prefix('mis-metas')
            ->group(function () {
                Route::get('/')
                    ->uses('GoalsController@show')
                    ->name('goals.show');

                Route::get('/editar')
                    ->uses('GoalsController@edit')
                    ->name('goals.edit');

                Route::post('/')
                    ->uses('GoalsController@update')
                    ->name('goals.update');
            });

        Route::prefix('mi-presupuesto-mensual')
            ->group(function () {
                Route::get('/')
                    ->uses('BudgetController@show')
                    ->name('budget.show');

                Route::get('/editar')
                    ->uses('BudgetController@edit')
                    ->name('budget.edit');

                Route::post('/')
                    ->uses('BudgetController@update')
                    ->name('budget.update');
            });

        Route::prefix('mi-deuda-mensual')
            ->group(function () {
                Route::get('/')
                    ->uses('DebtController@show')
                    ->name('debt.show');

                Route::get('/editar')
                    ->uses('DebtController@edit')
                    ->name('debt.edit');

                Route::post('/')
                    ->uses('DebtController@update')
                    ->name('debt.update');
            });

        Route::prefix('mis-dependientes')
            ->group(function () {
                Route::get('/')
                    ->uses('DependantController@show')
                    ->name('dependant.show');

                Route::get('/editar')
                    ->uses('DependantController@edit')
                    ->name('dependant.edit');

                Route::post('/')
                    ->uses('DependantController@update')
                    ->name('dependant.update');
            });

        Route::prefix('con-cuanto-vivire')
            ->group(function () {
                Route::get('/')
                    ->uses('AmountController@show')
                    ->name('amount.show');

                Route::get('/editar')
                    ->uses('AmountController@edit')
                    ->name('amount.edit');

                Route::post('/')
                    ->uses('AmountController@update')
                    ->name('amount.update');
            });

        Route::prefix('inversion-inicial')
            ->group(function () {
                Route::get('/')
                    ->uses('InitialInvestmentController@edit')
                    ->name('initialinvestment.edit');

                Route::post('/')
                    ->uses('InitialInvestmentController@update')
                    ->name('initialinvestment.update');
            });

        Route::prefix('balance-general')
            ->group(function () {
                Route::get('/')
                    ->uses('BalanceController@edit')
                    ->name('balance.edit');

                Route::post('/')
                    ->uses('BalanceController@update')
                    ->name('balance.update');
            });

        Route::prefix('estado-de-resultados')
            ->group(function () {
                Route::get('/')
                    ->uses('IncomeStatementController@edit')
                    ->name('incomestatement.edit');

                Route::post('/')
                    ->uses('IncomeStatementController@update')
                    ->name('incomestatement.update');
            });

        Route::prefix('flujo-de-efectivo')
            ->group(function () {
                Route::get('/')
                    ->uses('CashFlowController@edit')
                    ->name('cashflow.edit');

                Route::post('/')
                    ->uses('CashFlowController@update')
                    ->name('cashflow.update');
            });

        Route::prefix('mi-sueldo')
            ->group(function () {
                Route::get('/')
                    ->uses('SalaryController@edit')
                    ->name('salary.edit');

                Route::post('/')
                    ->uses('SalaryController@update')
                    ->name('salary.update');
            });

        Route::prefix('indicadores-clave')
            ->group(function () {
                Route::get('/')
                    ->uses('BenchmarkController@edit')
                    ->name('benchmark.edit');

                Route::post('/')
                    ->uses('BenchmarkController@update')
                    ->name('benchmark.update');
            });

        Route::prefix('reto-inversion/editar')
            ->group(function () {
                Route::get('/')
                    ->uses('RetoController@show')
                    ->name('reto.show');

                Route::post('/')
                    ->uses('RetoController@update')
                    ->name('reto.update');
            });
    });

/*
 |--------------------------------------------------------------------------
 | Support old wordpress routes
 |--------------------------------------------------------------------------
 */

Route::get('/{slug}')
    ->uses('HomeController@resolve');

// Rutas para PayPal
//Route::get('/paypal/pay', 'PaymentController2@payWithPayPal');
Route::get('/paypal/status', 'PaymentController2@payPalStatus');
Route::get('/paypal/failed', 'PaymentController2@paypalFailed');

Route::get('/preqdplay/paypal/status', 'PaypalPreqdplayController@payPalStatus');
Route::get('/preqdplay/paypal/failed', 'PaypalPreqdplayController@paypalFailed');
