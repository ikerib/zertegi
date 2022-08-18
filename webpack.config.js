const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')

    .cleanupOutputBeforeBuild()
    .enableSingleRuntimeChunk()
    .enableSourceMaps(!Encore.isProduction())

    .addEntry('jsApp', ['./assets/js/app.js'])
    .addEntry('jsMain', './assets/js/main.js')
    .addEntry('jsDaterangepicker', './assets/js/daterangepicker.js')
    .addEntry('jsDeleteForm', './assets/js/delete_form.js')
    .addEntry('jsAdminLTE', './assets/js/adminlte.js')
    .addEntry('highlight', './assets/js/jquery.highlight.js')
    //.addEntry('page1', './assets/js/page1.js')
    //.addEntry('page2', './assets/js/page2.js')
    .addStyleEntry('cssApp', './assets/css/app.scss')
    .addStyleEntry('cssLogin', './assets/css/login.scss')
    .addStyleEntry('cssAdminLTE', './assets/css/AdminLTE.css')
    .addStyleEntry('cssDaterangepicker', './assets/css/daterangepicker.css')
    .addStyleEntry('cssApli', './assets/css/apli.scss')

    .splitEntryChunks()
    .enableBuildNotifications()

    .enableVersioning(Encore.isProduction())

    .configureBabel((config) => {
        config.plugins.push('@babel/plugin-proposal-class-properties');
    })

    // enables @babel/preset-env polyfills
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })

    // enables Sass/SCSS support
    .enableSassLoader()

    .autoProvidejQuery()

    .copyFiles([
        {from: './node_modules/ckeditor/', to: 'ckeditor/[path][name].[ext]', pattern: /\.(js|css)$/, includeSubdirectories: false},
        {from: './node_modules/ckeditor/adapters', to: 'ckeditor/adapters/[path][name].[ext]'},
        {from: './node_modules/ckeditor/lang', to: 'ckeditor/lang/[path][name].[ext]'},
        // {from: './node_modules/ckeditor/plugins', to: 'ckeditor/plugins/[path][name].[ext]'},
        {from: './node_modules/ckeditor/skins', to: 'ckeditor/skins/[path][name].[ext]'}
    ])

;

module.exports = Encore.getWebpackConfig();
