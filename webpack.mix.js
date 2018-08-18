let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .copyDirectory('resources/assets/map', 'public/map')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copyDirectory('resources/assets/images', 'public/images');

mix.copyDirectory('resources/assets/adminlte/bower_components/', 'public/adminlte/bower');
mix.copyDirectory('resources/assets/adminlte/plugins/', 'public/adminlte/plugins');
mix.copyDirectory('resources/assets/adminlte/dist/', 'public/adminlte/dist');

