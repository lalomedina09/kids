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

Route::get('test')
    ->uses('HomeController@test')
    ->name('test');

Route::post('test/quiz')
    ->uses('HomeController@testQuizSave')
    ->name('test.quiz');

//ruta de prueba antes de integrar con el paquete de Mentorías
Route::get('test/service/calendar')
    ->uses('TestingController@dispatchService')
    ->name('qdplay.show');

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
| Custom Authentication
|--------------------------------------------------------------------------
*/
//Rutas para iniciar sesion desde landing con identificacion de origen
Route::prefix('qdplay-login')
    ->namespace('Auth')
    ->group(function () {
        //login QD Play
        Route::get('/')
            ->uses('QdplayLoginController@showLoginForm')
            ->name('qdplay-login');

        Route::post('/')
            ->uses('QdplayLoginController@login');
    });

//Ruta para crear cuenta desde landing de cliente con identificacion de origen
Route::prefix('qdplay-registro')
    ->middleware(['guest'])
    ->group(function () {
        Route::get('/')
            ->uses('QdplayRegisterController@showRegistrationForm')
            ->name('qdplay.register.store');

        Route::post('/')
            ->uses('QdplayRegisterController@store')
            ->name('qdplay.register.store');
    });

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::prefix('iniciar-sesion')
    ->namespace('Auth')
    ->group(function () {
        //login QD
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
| Join Account For Exhibitor (Expositores)
|--------------------------------------------------------------------------
*/
Route::prefix('qdplay/unete/expositor')
->middleware(['guest'])
->group(function () {
    Route::get('/')
    ->uses('RegisterExhibitorController@showRegistrationForm')
    ->name('qdplay/unete/show');

    Route::post('/data-general')
    ->uses('RegisterExhibitorController@storeDataGeneral')
    ->name('register.store.general');


});

/*
|--------------------------------------------------------------------------
| Routes Custom For Indice financiero O de la felicidad
|--------------------------------------------------------------------------
*/
Route::prefix('indice-de-felicidad')
->group(function () {
    Route::get('/')
        ->uses('IndexHappyController@index')
        ->name('indice.happy.data.personal');

    Route::get('/gestion-de-recursos')
        ->uses('IndexHappyController@resourceManagement')
        ->name('indice.happy.resource.management');
});

//Webhook
#Route::post('/typeform-webhook', [TypeformWebhookController::class, 'handleWebhook']);

Route::post('typeform-webhook')
    ->uses('TypeformWebhookController@handleWebhook')
    ->name('webhook.typeform');


Route::get('/chat', function () {
    return redirect()->away('https://wa.me/528116354205');
});
/*
|--------------------------------------------------------------------------
| Routes Custom For QD Play Add Companies
|--------------------------------------------------------------------------
*/
//1 Rutas para la empresa de resuelve tu deuda --resuelvemas
Route::prefix('resuelvemas')
    ->group(function () {
        Route::get('/')
        ->uses('SignupCompanyController@resuelve')
        ->name('register.resuelve.signup');

        Route::post('/signup')
        ->uses('SignupCompanyController@store')
        ->name('register.qdplay.signup.save');
});

Route::prefix('qdplay/resuelve/descuento')
    ->group(function () {
        Route::get('/')
            ->uses('SignupCompanyController@resuelve')
            ->name('register.resuelve.signup');

        Route::post('/signup')
            ->uses('SignupCompanyController@store')
            ->name('register.qdplay.signup.save');
});

//Rutas para la empresa de Citibanamex
Route::prefix('qdplay/bnmx/descuento')
    ->group(function () {
        Route::get('/')
            ->uses('SignupCompanyController@bnmx')
            ->name('register.bnmx.signup');
});

Route::prefix('qdplay/bnmx-pymes/descuento')
->group(function () {
    Route::get('/')
    ->uses('SignupCompanyController@bnmxPymes')
    ->name('register.bnmx.signup');
});

//Rutas para la empresa de HSBC
Route::prefix('qdplay/hsbc/descuento')
    ->group(function () {
        Route::get('/')
        ->uses('SignupCompanyController@hsbc')
        ->name('register.hsbc.signup');
});

//Rutas para la empresa de ISIC
Route::prefix('qdplay/isic/descuento')
    ->group(function () {
        Route::get('/')
            ->uses('SignupCompanyController@isic')
            ->name('register.isic.signup');
    });

//Rutas para la empresa de SCOT
Route::prefix('qdplay/scot/descuento')
    ->group(function () {
        Route::get('/')
            ->uses('SignupCompanyController@scot')
            ->name('register.scot.signup');
    });

//Rutas para la empresa de Ban Banjio
Route::prefix('qdplay/banbajio/inicio')
    ->group(function () {
        Route::get('/')
            ->uses('SignupCompanyController@banbajio')
            ->name('register.banbajio.signup');
    });
/*
|--------------------------------------------------------------------------
| Routes Custom  Functions Internals
|--------------------------------------------------------------------------
*/
//uta para descargar informes en pdf acerca de colaboradore
Route::prefix('qdplay/custom/reports/')
    ->group(function () {

        Route::get('/collaboration-views/pdf')
            ->uses('QdPlayReportsController@collaboration_views_pdf')
            ->name('qdplay.custom.report.collaboration.views.pdf');

        Route::get('/collaboration-views/excel')
        ->uses('QdPlayReportsController@collaboration_views_excel')
        ->name('qdplay.custom.report.collaboration.views.excel');

        Route::get('/progress-courses/pdf')
        ->uses('QdPlayReportsController@progress_courses_pdf')
    ->name('qdplay.custom.report.progress.courses.pdf');

        Route::get('/progress-courses/excel')
        ->uses('QdPlayReportsController@progress_courses_excel')
        ->name('qdplay.custom.report.progress.courses.excel');

        Route::get('/general')
        ->uses('QdPlayReportsController@general')
        ->name('qdplay.custom.report.general.pdf');

});

/*
|--------------------------------------------------------------------------
| Routes Custom For QD Play AND Company
|--------------------------------------------------------------------------
*/
Route::prefix('qdplay/unete')
->middleware(['guest'])
->group(function () {
    Route::get('/')
    ->uses('RegisterExhibitorController@showRegistrationForm')
    ->name('qdplay/unete/show');

    Route::post('/data-general')
    ->uses('RegisterExhibitorController@storeDataGeneral')
    ->name('register.store.general');
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

        //QD Play
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

        Route::get('/qdplay/send/reset')
            ->uses('QdplayResetPasswordController@resetSendSuccess')
            ->name('password.qdplay.reset.send');
    });

/*
|--------------------------------------------------------------------------
| Static pages
|--------------------------------------------------------------------------
*/
/*
Route::get('/')
    #->uses('HomeController@index')
    #->name('home');
    //->uses('HomeController@blog')
    ->uses('\QD\QDPlay\Http\Controllers\Home\HomeController@index')
    ->name('home');
*/
Route::get('/')
    ->uses('HomeController@indexRedesign')
    ->name('home');


Route::get('servicios')
    ->uses('HomeController@servicesRedesign')
    ->name('services');

Route::get('agencia')
->uses('HomeController@agencyRedesign')
->name('agency');

Route::get('consultoria')
    ->uses('HomeController@consultingRedesign')
    ->name('consulting');

Route::get('contacto')
    ->uses('HomeController@contacto')
    ->name('contact');


Route::post('contacto')
    ->uses('HomeController@saveDataContact')
    ->name('contact.save');

Route::get('/play')
    ->uses('\QD\QDPlay\Http\Controllers\Home\HomeController@index')
    ->name('play');

Route::get('/busqueda')
    ->uses('SearchController@index')
    ->name('search');
/*
Route::get('/contacto')
    ->uses('PagesController@contact')
    ->name('contact');
*/
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

Route::get('/contrato-de-prestacion-de-servicios-qd-play-persona-fisica')
    ->uses('PagesController@prestacion_de_servicios_fisica')
    ->name('contrato-de-prestacion-de-servicios-qd-play-persona-fisica');

Route::get('/contrato-de-prestacion-de-servicios-qd-play-persona-moral')
    ->uses('PagesController@prestacion_de_servicios_moral')
    ->name('prestacion-de-servicios');

Route::get('contrato-de-prestacion-de-servicios-qd-play-persona-moral')
    ->uses('PagesController@show')
    ->name('contrato-de-prestacion-de-servicios-qd-play-persona-moral');

Route::get('/pages/{slug}')
    ->uses('PagesController@show')
    ->name('pages.show');

Route::get('/descargas-libro')
->uses('PagesController@download_book_qd');
//->name('pages.show');

Route::get('/descargas-libro.html')
->uses('PagesController@download_book_qd');
//->name('pages.show');
///////////

Route::get('/page-qdplay')
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

Route::prefix('/registro-qdplay-individual')
->group(function () {
    Route::get('/')
        ->uses('Landing\QdplayPersonasFisicasController@show')
        ->name('register.qdplay.personas.fisicas.show');

    Route::post('/')
        ->uses('Landing\QdplayPersonasFisicasController@store')
        ->name('register.qdplay.personas.fisicas.store');
});
/*
|--------------------------------------------------------------------------
| Newsletter
|--------------------------------------------------------------------------
*/

Route::get('/boletin')
    ->uses('NewsletterController@subscribed')
    ->name('newsletter');

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

        Route::post('/register/form/validate-email-corp')
        ->uses('CourseController@customRegisterFormContact')
        ->name('courses.register.form.email-corp');

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
| Reschedules
|--------------------------------------------------------------------------
*/
Route::prefix('reschedules')
    ->group(function () {
    Route::post('/show-modal/block')
        ->uses('ReschedulesController@modalBlockReschedule')
        ->name('reschedules.modal.block')
        ->middleware(['auth']);

    Route::post('/show-modal/block/store')
        ->uses('ReschedulesController@storeBlockReschedule')
        ->name('reschedules.modal.block.store')
        ->middleware(['auth']);
    });



/*
|--------------------------------------------------------------------------
| QD-PLAY Promotions
|--------------------------------------------------------------------------
*/
/*
Route::prefix('qdplay-promo')
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
*/
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

		Route::post('/borrar')
			->uses('ProfileController@destroy')
			->name('profile.destroy');

        Route::post('/{section}')
            ->uses('ProfileController@update')
            ->name('profile.update');

        //Data Bank
        Route::patch('/file-situation-tax/{user}')
        ->uses('ProfileController@updateFileSTax')
        ->name('update.situation.tax');

        //Data Company
        Route::prefix('company')
            ->group(function () {
                Route::post('/post')
                ->uses('CompanyController@store')
                ->name('profile.company.post');

                Route::patch('/update/{id}')
                ->uses('CompanyController@update')
                ->name('profile.company.update');
        });

        //Data Branch
        Route::prefix('branch')
        ->group(function () {
            Route::post('/post')
            ->uses('BranchController@store')
            ->name('profile.branch.post');

            Route::get('/destroy/{id}')
            ->uses('BranchController@destroy')
            ->name('profile.branch.destroy');

            Route::post('/edit/{id}')
            ->uses('BranchController@edit')
            ->name('profile.branch.edit');

            Route::patch('/update/{id}')
            ->uses('BranchController@update')
            ->name('profile.branch.update');

        });

        //Data Company Role
        Route::prefix('company-role')
        ->group(function () {
            Route::post('/store')
            ->uses('CompanyRoleController@store')
            ->name('profile.companyrole.store');

            Route::get('/destroy/{id}')
            ->uses('CompanyRoleController@destroy')
            ->name('profile.companyrole.destroy');

            Route::post('/edit/{id}')
            ->uses('CompanyRoleController@edit')
            ->name('profile.companyrole.edit');

            Route::patch('/update/{id}')
            ->uses('CompanyRoleController@update')
            ->name('profile.companyrole.update');
            });
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

Route::prefix('expositores')
->group(function () {
    Route::get('/')
        ->uses('ExhibitorController@index')
        ->name('exhibitors.index');

    Route::get('/{key}')
    ->uses('ExhibitorController@show')
    ->name('exhibitors.show');
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
Route::prefix('downloads')
    ->group(function () {
        Route::get('/')
            ->uses('DownloadController@index')
            ->name('downloads.index');

        Route::get('/{slug}')
        ->uses('DownloadController@download')
        ->name('downloads.download');
    });
*/
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


/*
/-------------------------------------------------------------------------
/Rutas project QD PLAY
/-------------------------------------------------------------------------
*/
Route::name('redirects.')
    ->prefix('redirects')
    ->middleware(['guest'])
    ->group(function () {
        Route::get('/facebook')
            ->uses('SocialNetworksController@facebookRedirect')
            ->name('facebook');

        Route::get('/facebook/{trackClient}')
        ->uses('SocialNetworksController@facebookClientRedirect')
        ->name('facebook.client');

        Route::get('/google')
            ->uses('SocialNetworksController@googleRedirect')
            ->name('google');

        Route::get('/google/{trackClient}')
            ->uses('SocialNetworksController@googleClientRedirect')
            ->name('google.client');

        Route::get('/microsoft')
            ->uses('SocialNetworksController@microsoftRedirect')
            ->name('microsoft');

        Route::get('/microsoft/{trackClient}')
            ->uses('SocialNetworksController@microsoftClientRedirect')
            ->name('microsoft.client');

        Route::get('/apple')
            ->uses('SocialNetworksController@appleRedirect')
            ->name('apple');
    });

Route::name('callbacks.')
    ->prefix('callbacks')
    ->middleware(['guest'])
    ->group(function () {
        Route::get('/facebook')
            ->uses('SocialNetworksController@facebookCallback')
            ->name('facebook');

        Route::get('/google')
            ->uses('SocialNetworksController@googleCallback')
            ->name('google');

        Route::get('/microsoft')
            ->uses('SocialNetworksController@microsoftCallback')
            ->name('microsoft');

        Route:: post('/apple')
        ->uses('SocialNetworksController@appleCallback')
        ->name('apple');
    });

//Routes for quiz
Route::post('quiz/course/save')
->uses('HomeController@quizCourseSave')
->name('quiz.course.save');


/*
|--------------------------------------------------------------------------
| Juegos
|--------------------------------------------------------------------------
*/

Route::prefix('juegos')
    ->group(function () {
        Route::get('/calendario/adviento')
            ->uses('GamesController@calendar_adviento')
            ->name('games.calendar_adviento');

        /*Route::get('/{slug}')
            ->uses('JuegosController@show')
            ->name('videos.show');*/
    });
