const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/dashboard.js', 'public/js')
    .js('resources/js/activity.js', 'public/js')
    .js('resources/js/weekly_activity.js', 'public/js')
    .js('resources/js/login.js', 'public/js')
    .js('resources/js/pickets_manager.js', 'public/js')
    .js('resources/js/compute_public.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
