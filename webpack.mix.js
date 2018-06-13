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
   .copy('resources/assets/js/leaflet.js', 'public/js/leaflet.js')
   .copy('resources/assets/js/leaflet.extras.js', 'public/js/leaflet.extras.js')
   .copy('resources/assets/js/KML.js', 'public/js/KML.js')
   .copy('resources/assets/js/krb_merapi.kml', 'public/js/krb_merapi.kml')
   .copy('resources/assets/js/tngmerapi.kml', 'public/js/tngmerapi.kml')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copyDirectory('resources/assets/images', 'public/images');
