const mix = require('laravel-mix');
require('laravel-mix-alias');

if (mix.inProduction()) {
    mix.version();
} else {
    mix.webpackConfig({ devtool: 'inline-source-map' });
}

mix.alias({
    '&': '/resources/assets/qd',
    '@': '/resources/assets/js',
    '~': '/resources/assets/sass'
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copy(
    [
        'node_modules/select2/dist/css/select2.min.css'
    ],
    'public/css/vendor/select.css'
);

mix.babel(
    [
        'node_modules/select2/dist/js/select2.js',
        'node_modules/select2/dist/js/i18n/en.js',
        'node_modules/select2/dist/js/i18n/es.js'
    ],
    'public/js/vendor/select.js'
);

mix.babel(
    [
        'node_modules/jquery-validation/dist/jquery.validate.min.js',
        'node_modules/jquery-validation/dist/additional-methods.min.js',
        'node_modules/jquery-validation/dist/localization/messages_es.js'
    ],
    'public/js/vendor/validator.js'
);

mix.babel(
    [
        'node_modules/moment/min/moment-with-locales.min.js',
        'node_modules/moment/locale/es.js',
        'node_modules/moment-timezone/builds/moment-timezone-with-data.min.js'
    ],
    'public/js/vendor/moment.js'
);

mix.babel(
    [
        'node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js'
    ],
    'public/js/vendor/datetimepicker.js'
);
mix.copy(
    [
        'node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css'
    ],
    'public/css/vendor/datetimepicker.css'
);

mix.babel(
    [
        'node_modules/tinymce/tinymce.min.js',
        'node_modules/tinymce/themes/silver/theme.min.js',
        'node_modules/tinymce-i18n/langs/es_MX.js'
    ],
    'public/js/vendor/editor/editor.js'
);
mix.copyDirectory(
    'node_modules/tinymce/icons',
    'public/js/vendor/editor/icons'
);
mix.copyDirectory(
    'node_modules/tinymce/skins',
    'public/js/vendor/editor/skins'
);
mix.copyDirectory(
    'node_modules/tinymce/plugins',
    'public/js/vendor/editor/plugins'
);
mix.copyDirectory(
    'node_modules/tinymce/themes',
    'public/js/vendor/editor/themes'
);

mix.babel(
    [
        'node_modules/datatables.net/js/jquery.dataTables.js',
        'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js'
    ],
    'public/js/vendor/datatables.js'
);
mix.copy(
    [
        'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css'
    ],
    'public/css/vendor/datatables.css'
);

mix.copy(
    [
        'node_modules/ejs/ejs.min.js'
    ],
    'public/js/vendor/ejs.js'
);

mix.styles(
    [
        'node_modules/@fullcalendar/core/main.css',
        'node_modules/@fullcalendar/daygrid/main.css',
        'node_modules/@fullcalendar/timegrid/main.css'
    ],
    'public/css/vendor/calendar.css'
);

mix.babel(
    [
        'node_modules/bootstrap-fileinput/js/fileinput.min.js',
        'node_modules/bootstrap-fileinput/js/locales/es.js',
        'node_modules/bootstrap-fileinput/themes/fa/theme.min.js',
    ],
    'public/js/vendor/fileinput.js'
);
mix.copy(
    [
        'node_modules/bootstrap-fileinput/css/fileinput.min.css'
    ],
    'public/css/vendor/fileinput.css'
);

// Project scripts ----------

mix.js('resources/assets/js/auth/email.js', 'public/js/auth')
    .js('resources/assets/js/auth/login.js', 'public/js/auth')
    .js('resources/assets/js/auth/newsletter.js', 'public/js/auth')
    .js('resources/assets/js/auth/register.js', 'public/js/auth')
    .js('resources/assets/js/auth/reset.js', 'public/js/auth')
    .js('resources/assets/js/courses/checkout.js', 'public/js/courses')
    .js('resources/assets/js/interactables/interactables.js', 'public/js/interactables')
    .js('resources/assets/js/profiles/edit.js', 'public/js/profiles')
    .js('resources/assets/js/search/bar.js', 'public/js/search');

mix.js('resources/assets/js/exercises/amount.js', 'public/js/exercises')
    .js('resources/assets/js/exercises/balance.js', 'public/js/exercises')
    .js('resources/assets/js/exercises/benchmark.js', 'public/js/exercises')
    .js('resources/assets/js/exercises/budget.js', 'public/js/exercises')
    .js('resources/assets/js/exercises/cashflow.js', 'public/js/exercises')
    .js('resources/assets/js/exercises/debt.js', 'public/js/exercises')
    .js('resources/assets/js/exercises/dependant.js', 'public/js/exercises')
    .js('resources/assets/js/exercises/future.js', 'public/js/exercises')
    .js('resources/assets/js/exercises/goals.js', 'public/js/exercises')
    .js('resources/assets/js/exercises/incomestatement.js', 'public/js/exercises')
    .js('resources/assets/js/exercises/initialinvestment.js', 'public/js/exercises')
    .js('resources/assets/js/exercises/profile.js', 'public/js/exercises')
    .js('resources/assets/js/exercises/salary.js', 'public/js/exercises');

mix.js('resources/assets/dashboard/js/articles/create.js', 'public/js/dashboard/articles')
    .js('resources/assets/dashboard/js/courses/create.js', 'public/js/dashboard/courses')
    .js('resources/assets/dashboard/js/podcasts/create.js', 'public/js/dashboard/podcasts')
    .js('resources/assets/dashboard/js/quotes/create.js', 'public/js/dashboard/quotes')
    .js('resources/assets/dashboard/js/users/edit.js', 'public/js/dashboard/users')
    .js('resources/assets/dashboard/js/videos/create.js', 'public/js/dashboard/videos');

// Landings

mix.js('resources/assets/js/landings/partners/curadeuda.js', 'public/js/landings/partners')
    .js('resources/assets/js/landings/partners/resuelvetudeuda.js', 'public/js/landings/partners');

// queridodinero/advice

mix.js('resources/assets/qd/advice/js/advice/notes.js', 'public/qd/advice/js/advice')
    .js('resources/assets/qd/advice/js/advice/rate.js', 'public/qd/advice/js/advice')
    .js('resources/assets/qd/advice/js/advice/reschedule.js', 'public/qd/advice/js/advice')
    .js('resources/assets/qd/advice/js/advice/workplan.js', 'public/qd/advice/js/advice')
    .js('resources/assets/qd/advice/js/advisors/index.js', 'public/qd/advice/js/advisors')
    .js('resources/assets/qd/advice/js/advisors/search.js', 'public/qd/advice/js/advisors')
    .js('resources/assets/qd/advice/js/advisors/show.js', 'public/qd/advice/js/advisors')
    .js('resources/assets/qd/advice/js/profiles/calendar.js', 'public/qd/advice/js/profiles')
    .js('resources/assets/qd/advice/js/profiles/prices.js', 'public/qd/advice/js/profiles');

mix.js('resources/assets/qd/advice/dashboard/js/advisors/edit.js', 'public/qd/advice/dashboard/js/advisors')
    .js('resources/assets/qd/advice/dashboard/js/advice/show.js', 'public/qd/advice/dashboard/js/advice')
    .js('resources/assets/qd/advice/dashboard/js/payments/edit.js', 'public/qd/advice/dashboard/js/payments');

// queridodinero/communications

mix.js('resources/assets/qd/comm/js/videocall/call.js', 'public/qd/comm/js/videocall')
    .js('resources/assets/qd/comm/js/videocall/conference.js', 'public/qd/comm/js/videocall');

// queridodinero/marketplace

mix.js('resources/assets/qd/marketplace/js/checkout/payment.js', 'public/qd/marketplace/js/checkout')
    .js('resources/assets/qd/marketplace/dashboard/js/coupons/create.js', 'public/qd/marketplace/dashboard/js/coupons');

// queridodinero/products

mix.js('resources/assets/qd/products/js/rates/rate.js', 'public/qd/products/js/rates')
    .js('resources/assets/qd/products/dashboard/js/entities/create.js', 'public/qd/products/dashboard/js/entities')
    .js('resources/assets/qd/products/dashboard/js/entities/edit.js', 'public/qd/products/dashboard/js/entities')
    .js('resources/assets/qd/products/dashboard/js/products/create.js', 'public/qd/products/dashboard/js/products')
    .js('resources/assets/qd/products/dashboard/js/products/edit.js', 'public/qd/products/dashboard/js/products');

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/dashboard/js/dashboard.js', 'public/js')
    .extract([
        'lodash',
        'popper.js',
        'bootstrap',
        'jquery',
        'axios',
        'vue',
        'qs',
        'toastr',
        'pusher-js',
        'laravel-echo',
    ]);

// Project styles ----------

mix.sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/dashboard/sass/dashboard.scss', 'public/css')
    .sass('resources/assets/sass/editor.scss', 'public/css')

// queridodinero/advice

mix.sass('resources/assets/qd/advice/sass/app.scss', 'public/qd/advice/css/app.css')

// queridodinero/communications

mix.sass('resources/assets/qd/comm/sass/call.scss', 'public/qd/comm/css/call.css')
    .sass('resources/assets/qd/comm/sass/conference.scss', 'public/qd/comm/css/call.css');

// queridodinero/marketplace

mix.sass('resources/assets/qd/marketplace/sass/app.scss', 'public/qd/marketplace/css/app.css')

// queridodinero/products

mix.sass('resources/assets/qd/products/sass/app.scss', 'public/qd/products/css/app.css')

// Project assets ----------

// queridodinero/advice

mix.copyDirectory(
    'resources/assets/qd/advice/images',
    'public/qd/advice/images'
);

mix.copyDirectory(
    'resources/assets/qd/advice/media',
    'public/qd/advice/media'
);

// queridodinero/communications

// queridodinero/marketplace

mix.copyDirectory(
    'resources/assets/qd/marketplace/images',
    'public/qd/marketplace/images'
);

// queridodinero/products

mix.copyDirectory(
    'resources/assets/qd/products/images',
    'public/qd/products/images'
);
