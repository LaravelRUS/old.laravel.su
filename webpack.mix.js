const mix = require('laravel-mix');

require('laravel-mix-purgecss');

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

mix
    .webpackConfig({
        resolve: {
            modules: [
                `${__dirname}/node_modules`,
                `${__dirname}/resources/css`,
                `${__dirname}/resources/js`,
            ]
        }
    })
    .js('resources/js/app.js', 'public/assets')
    .sass('resources/css/app.scss', 'public/assets', {
        sourceMap: true,
        outputStyle: 'compressed',
    })
    .options({
        extractVueStyles: true,
        globalVueStyles: `${__dirname}/resources/css/_kernel.scss`,
    })
    .sourceMaps()
;

if (mix.inProduction()) {
    mix
        .version()
        .purgeCss()
    ;
}
