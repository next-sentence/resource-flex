var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    // .addEntry('js/app', './assets/js/app.js')
    // .addEntry('js/app', './assets/js/app.js')
    // .addEntry('js/sylius', './vendor/sylius/ui-bundle/Resources/private/js/app.js')
    // .addEntry('js/toggle', './vendor/sylius/ui-bundle/Resources/private/js/sylius-toggle.js')
    // .addStyleEntry('css/app', './assets/css/app.scss')
    .addStyleEntry('css/main', './assets/sass/main.scss')
    .addStyleEntry('css/semantic', './node_modules/semantic-ui-css/semantic.min.css')

    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    .autoProvidejQuery()
    .autoProvideVariables({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery',
    })
;

module.exports = Encore.getWebpackConfig();