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
    mix.less(['app.less'])
        .copy('node_modules/icheck/skins/square/blue.png', 'public/css/checkboxes/blue.png')
        .copy('node_modules/icheck/skins/square/blue@2x.png', 'public/css/checkboxes/blue@2x.png')
        .webpack('app.js')
        .version(['css/app.css', 'js/app.js']);
});
