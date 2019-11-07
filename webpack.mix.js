const mix = require('laravel-mix');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const webpack = require('webpack');

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

let baseThemes = 'wp-content/themes'
let themeVirtusAssets = `${baseThemes}/nikoloz-job/resource`
let themeVirtusPublic = `${baseThemes}/nikoloz-job`

mix
    .js(`${themeVirtusAssets}/js/app.js`, `${themeVirtusPublic}/js`)
    .sass(`${themeVirtusAssets}/scss/app.scss`, `${themeVirtusPublic}/css`)
;



mix.webpackConfig({
    plugins: [
        new ImageminPlugin({
            test: `${themeVirtusAssets}/images/**`,
        }),
    ]
});

mix.autoload({
    jquery: ['$', 'jQuery', 'window.jQuery'],
});


mix.copyDirectory(`${themeVirtusAssets}/images`, `${themeVirtusPublic}/images`);
mix.copyDirectory(`${themeVirtusAssets}/fonts`, `${themeVirtusPublic}/fonts`);
mix.copyDirectory(`${themeVirtusAssets}/media`, `${themeVirtusPublic}/media`);

mix.options({
    processCssUrls: false,
});
