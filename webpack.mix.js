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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.js('resources/assets/js/cropper-image.js', 'public/js');
mix.js('resources/assets/js/userAjax.js', 'public/js');

// const WebpackShellPlugin = require('webpack-shell-plugin');
// mix.webpackConfig({
//     plugins:
//     [
//         new WebpackShellPlugin({onBuildStart:['php artisan lang:js --quiet'], onBuildEnd:[]})
//     ]
// });

mix.version();
