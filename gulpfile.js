var gulp = require('gulp');
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

/**
 * Copy any needed files.
 *
 * Do a 'gulp copyfiles' after bower updates
 */
gulp.task("copyfiles", function() {

    gulp.src("vendor/bower_dl/typeahead.js/dist/typeahead.jquery.min.js")
        .pipe(gulp.dest("public/js"));

    gulp.src("vendor/bower_dl/datatables.net-bs/js/dataTables.bootstrap.min.js")
        .pipe(gulp.dest("public/js"));


});

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
        'typeahead.jquery.min.js',
        'app.js',
        'stripe.js',
    ], null, 'public/js')
        .scripts([
            'bootstrap.min.js',
            'dataTables.bootstrap.min.js',
        ], 'public/js/admin.js');


    mix.version([
        'public/css/all.css',
        'public/js/all.js']);

});
