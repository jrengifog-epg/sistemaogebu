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
mix.styles([

        'vistas/recursos/css/tailwind.min.css',
        'vistas/recursos/css/sweetalert2.css',
        'vistas/recursos/css/themify-icons.css',
        'vistas/recursos/css/progreso.css',
        'vistas/recursos/css/style.css',
    ], 'vistas/css/app.css')
    .scripts([
        'vistas/recursos/js/jquery-3.1.1.min.js',
        'vistas/recursos/js/popper.min.js',
        'vistas/recursos/js/bootstrap.min.js',
        'vistas/recursos/js/configGeneral.js',
        'vistas/recursos/js/pace.min.js',
        'vistas/recursos/js/template.js',
        'vistas/recursos/js/sweetalert2.min.js',
        'vistas/recursos/js/progreso.js'
    ], 'vistas/js/config.js')
    .js(['vistas/recursos/app.js'], 'vistas/js/app.js');