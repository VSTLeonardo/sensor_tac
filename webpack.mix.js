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

mix
.js('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.js')
.js('node_modules/jquery/dist/jquery.js', 'public/js/jquery.js')
.js('node_modules/chart.js/dist/Chart.bundle.js', 'public/js/chart.js')
.js('node_modules/chart.js/dist/Chart.js', 'public/js/chart-js.js')
.postCss('node_modules/chart.js/dist/Chart.css', 'public/css/chart.css')
.sass('node_modules/font-awesome/scss/font-awesome.scss', 'public/css/font-awesome.css')
.sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/css', [
    //
]);
