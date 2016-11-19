const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.less('admin-lte/AdminLTE.less')
        .sass('app.scss')
        .webpack('app.js')
        .version(['css/AdminLTE.css', 'css/app.css', 'js/app.js']);
});
