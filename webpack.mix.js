const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js/app.js')
  .scripts([
    'resources/assets/js/controllers/UserController.js',
    'resources/assets/js/controllers/FrontendController.js'
  ], 'public/js/controllers.js')
  .scripts([
    'node_modules/build/loading-bar.min.js'
  ], 'public/js/all.js')
  .styles([
    'node_modules/build/loading-bar.min.css'
  ], 'public/css/all.css')
  .sass('resources/assets/sass/app.scss', 'public/css');
