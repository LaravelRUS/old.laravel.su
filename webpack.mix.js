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
        stats: {
            children: true,
        },
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
        sassOptions: {
            outputStyle: 'compressed',
        }
    })
    .disableNotifications()
    .sourceMaps()
;

if (mix.inProduction()) {
    mix.version();
}
