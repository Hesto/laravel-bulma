const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

var node_path = "./node_modules/";

var paths = {
    'public'            : 'public/',
    'fontawesome'       : node_path + "font-awesome/",
    'ionicons'          : node_path + "ionicons/"
};

elixir(mix => {
    mix
    .sass('admin.scss', 'resources/dist/css')
    .sass('front.scss', 'resources/dist/css')
    .sass('app.scss')

    .webpack('admin.js', 'resources/dist/js')
    .webpack('front.js', 'resources/dist/js')
    .webpack('app.js')

    .copy(paths.fontawesome + 'fonts/', paths.public + 'fonts')
    .copy(paths.ionicons + 'fonts/', paths.public + 'fonts')

    .styles([
        './resources/dist/css/admin.css',
    ], paths.public + 'css/admin.css')

    .styles([
        './resources/dist/css/front.css',
    ], paths.public + 'css/front.css')

    .scripts([
        './resources/dist/js/admin.js',
    ], paths.public + 'js/admin.js')

    .scripts([
        './resources/dist/js/front.js',
    ], paths.public + 'js/front.js');
});