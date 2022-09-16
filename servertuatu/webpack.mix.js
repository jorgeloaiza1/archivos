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

mix.scripts([
    	'resources/assets/js/jquery.min.js',
    	'resources/assets/js/bootstrap.min.js',
    	'resources/assets/js/bootstrap-tagsinput.js',
    	'resources/assets/js/material.min.js',
    	'resources/assets/js/material-kit.js',
    	'resources/assets/js/nouislider.min.js',
    	'resources/assets/js/moment.min.js',    	
    	'resources/assets/js/bootstrap-datetimepicker.js',
        'resources/assets/js/bootstrap-selectpicker.js'
		], 'public/js/app.js')
   .sass('resources/assets/sass/material-kit.scss', 'public/css');
