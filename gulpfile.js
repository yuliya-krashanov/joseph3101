var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
       //.coffee('module.coffee');

    mix.styles([
        'bootstrap.css',
        'fonts.css',
        'layout.css',
        'pop_up.css',
        'responsive.css',
        'app.css'
    ], null, 'public/css');


    mix.scripts([
        'bootstrap.min.js',
        'app.js',
    ], null, 'public/js');

    mix.version([
        'public/css/all.css',
        'public/js/all.js']);

});
