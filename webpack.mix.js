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

mix.styles('resources/assets/css/bootstrap.css', 'public/css/bootstrap.css');
// mix.copy('resources/assets/css/font-awesome.css', 'public/css/font-awesome.css');
mix.styles('resources/assets/css/animate.css', 'public/css/animate.css');
mix.styles('resources/assets/css/style.css', 'public/css/style.css');
mix.styles('resources/assets/css/toastr.css', 'public/css/toastr.css');
mix.styles('resources/assets/css/jquery.gritter.css', 'public/css/jquery.gritter.css');


mix.copy('resources/assets/js/jquery-3.1.1.js', 'public/js/jquery-3.1.1.js');
mix.copy('resources/assets/js/bootstrap.js' , 'public/js/bootstrap.js');
mix.copy('resources/assets/js/jquery.metisMenu.js', 'public/js/jquery.metisMenu.js');
mix.copy('resources/assets/js/jquery.slimscroll.js', 'public/js/jquery.slimscroll.js');
mix.copy('resources/assets/js/jquery.flot.js', 'public/js/jquery.flot.js');
mix.copy('resources/assets/js/jquery.flot.tooltip.js', 'public/js/jquery.flot.tooltip.js');
mix.copy('resources/assets/js/jquery.flot.spline.js', 'public/js/jquery.flot.spline.js');
mix.copy('resources/assets/js/jquery.flot.resize.js', 'public/js/jquery.flot.resize.js');
mix.copy('resources/assets/js/jquery.flot.pie.js', 'public/js/jquery.flot.pie.js');
mix.copy('resources/assets/js/jquery.peity.js', 'public/js/jquery.peity.js');
mix.copy('resources/assets/js/peity-demo.js', 'public/js/peity-demo.js');
mix.copy('resources/assets/js/inspinia.js', 'public/js/inspinia.js');
// mix.js('resources/assets/js/pace.js', 'public/js/pace.js');
mix.copy('resources/assets/js/jquery-ui.js', 'public/js/jquery-ui.js');
mix.copy('resources/assets/js/jquery.gritter.js', 'public/js/');
mix.copy('resources/assets/js/jquery.sparkline.js', 'public/js/jquery.sparkline.js');
mix.copy('resources/assets/js/sparkline-demo.js', 'public/js/sparkline-demo.js');
mix.copy('resources/assets/js/Chart.js', 'public/js/Chart.js');
mix.copy('resources/assets/js/toastr.js', 'public/js/toastr.js');



