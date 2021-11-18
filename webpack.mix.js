const mix = require('laravel-mix');

mix.webpackConfig({
    externals: {
        'vue':'Vue',
    }
});


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').vue()
    .js('resources/js/vue.js', 'public/js')
    .js('resources/js/bootstrap.js', 'public/js')
    .js('resources/js/vue-components.js', 'public/js')
    .sass('resources/scss/style.scss', 'public/css')
    .sass('resources/fontawesome/scss/app.scss', 'public/css')
    .css('resources/scss/forms.css', 'public/css')
    .sourceMaps();
