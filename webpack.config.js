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
    // .addEntry('js/jquery', './node_modules/jquery/dist/jquery.min.js')
    // .addEntry('js/semantic', './node_modules/semantic-ui-css/semantic.min.js')
    // .addEntry('js/sylius-toggle', './vendor/sylius/ui-bundle/Resources/private/js/sylius-toggle.js')
    // .addEntry('js/sylius-auto-complete', './vendor/sylius/ui-bundle/Resources/private/js/sylius-auto-complete.js')
    // .addEntry('js/sylius-bulk', './vendor/sylius/ui-bundle/Resources/private/js/sylius-bulk-action-require-confirmation.js')
    // .addEntry('js/sylius-require-confirmation', './vendor/sylius/ui-bundle/Resources/private/js/sylius-require-confirmation.js')
    // .addEntry('js/sylius-from-collection', './vendor/sylius/ui-bundle/Resources/private/js/sylius-form-collection.js')
    // .addEntry('js/sylius-prototype-handler', './vendor/sylius/ui-bundle/Resources/private/js/sylius-prototype-handler.js')
    .addEntry('js/app', './assets/js/app.js')

    // .addStyleEntry('css/app', './assets/css/app.scss')
    // .addStyleEntry('css/semantic', './node_modules/semantic-ui-css/semantic.min.css')
    // .addStyleEntry('css/main', './assets/sass/main.scss')

    .createSharedEntry('vendor', [
        './vendor/sylius/ui-bundle/Resources/private/js/sylius-toggle.js',
        './vendor/sylius/ui-bundle/Resources/private/js/sylius-auto-complete.js',
        './vendor/sylius/ui-bundle/Resources/private/js/sylius-bulk-action-require-confirmation.js',
        './vendor/sylius/ui-bundle/Resources/private/js/sylius-require-confirmation.js',
        './vendor/sylius/ui-bundle/Resources/private/js/sylius-form-collection.js',
        './vendor/sylius/ui-bundle/Resources/private/js/sylius-prototype-handler.js',
        './node_modules/jquery/dist/jquery.min.js',
        './node_modules/semantic-ui-css/semantic.min.js',

        './node_modules/semantic-ui-css/semantic.min.css',
        './assets/sass/main.scss'
    ])
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
