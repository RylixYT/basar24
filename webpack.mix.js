const mix = require("laravel-mix");
require("laravel-mix-artisan-serve");

const VuetifyLoaderPlugin = require("vuetify-loader/lib/plugin");
var webpackConfig = {
    plugins: [new VuetifyLoaderPlugin()]
};
mix.webpackConfig(webpackConfig);
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

mix.js("resources/js/main.js", "public/js/app.js")
    .vue()
    .sass("resources/sass/app.scss", "public/css")
    .serve();
