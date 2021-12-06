const Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    .copyFiles({
        from: './assets/images',

        //optional target path, relative to the output dir
        to: 'images/[path][name].[ext]',

        //if versioning is enabled, add the file hash too
        to: 'images/[path][name].[hash:8].[ext]',

        //only copy files matching this pattern
        pattern: /\.(png|jpg|jpeg)$/
    })

    /*
     * ENTRY CONFIG
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */
    .addEntry('app', './assets/app.js')
    .addEntry('scripts', './assets/js/scripts.js')
    .addEntry('_1_accordion', './assets/js/components/_1_accordion.js')
    .addEntry('_1_adaptive-navigation', './assets/js/components/_1_adaptive-navigation.js')
    .addEntry('_1_choice-accordion', './assets/js/components/_1_choice-accordion.js')
    .addEntry('_1_col-table', './assets/js/components/_1_col-table.js')
    .addEntry('_1_color-swatches', './assets/js/components/_1_color-swatches.js')
    .addEntry('_1_custom-select', './assets/js/components/_1_custom-select.js')
    .addEntry('_1_details', './assets/js/components/_1_details.js')
    .addEntry('_1_diagonal-movement', './assets/js/components/_1_diagonal-movement.js')
    .addEntry('_1_google-maps', './assets/js/components/_1_google-maps.js')
    .addEntry('_1_image-magnifier', './assets/js/components/_1_image-magnifier.js')
    .addEntry('_1_masonry', './assets/js/components/_1_masonry.js')
    .addEntry('_1_menu', './assets/js/components/_1_menu.js')
    .addEntry('_1_modal-window', './assets/js/components/_1_modal-window.js')
    .addEntry('_1_number-input', './assets/js/components/_1_number-input.js')
    .addEntry('_1_overscroll-section', './assets/js/components/_1_overscroll-section.js')
    .addEntry('_1_pre-header', './assets/js/components/_1_pre-header.js')
    .addEntry('_1_rating', './assets/js/components/_1_rating.js')
    .addEntry('_1_read-more', './assets/js/components/_1_read-more.js')
    .addEntry('_1_responsive-sidebar', './assets/js/components/_1_responsive-sidebar.js')
    .addEntry('_1_reveal-effects', './assets/js/components/_1_reveal-effects.js')
    .addEntry('_1_scrolling-animations', './assets/js/components/_1_scrolling-animations.js')
    .addEntry('_1_side-navigation-v2', './assets/js/components/_1_side-navigation-v2.js')
    .addEntry('_1_slider', './assets/js/components/_1_slider.js')
    .addEntry('_1_smooth-scrolling', './assets/js/components/_1_smooth-scrolling.js')
    .addEntry('_1_social-sharing', './assets/js/components/_1_social-sharing.js')
    .addEntry('_1_sticky-hero', './assets/js/components/_1_sticky-hero.js')
    .addEntry('_1_swipe-content', './assets/js/components/_1_swipe-content.js')
    .addEntry('_1_table', './assets/js/components/_1_table.js')
    .addEntry('_1_tabs', './assets/js/components/_1_tabs.js')
    .addEntry('_2_carousel', './assets/js/components/_2_carousel.js')
    .addEntry('_2_checkout', './assets/js/components/_2_checkout.js')
    .addEntry('_2_comments', './assets/js/components/_2_comments.js')
    .addEntry('_2_dropdown', './assets/js/components/_2_dropdown.js')
    .addEntry('_2_menu-bar', './assets/js/components/_2_menu-bar.js')
    .addEntry('_2_product-v3', './assets/js/components/_2_product-v3.js')
    .addEntry('_2_slider-multi-value', './assets/js/components/_2_slider-multi-value.js')
    .addEntry('_2_slideshow', './assets/js/components/_2_slideshow.js')
    .addEntry('_2_sticky-sharebar', './assets/js/components/_2_sticky-sharebar.js')
    .addEntry('_2_table-of-contents', './assets/js/components/_2_table-of-contents.js')
    .addEntry('_3_advanced-filter', './assets/js/components/_3_advanced-filter.js')
    .addEntry('_3_hiding-nav', './assets/js/components/_3_hiding-nav.js')
    .addEntry('_3_mega-site-navigation', './assets/js/components/_3_mega-site-navigation.js')
    .addEntry('_3_thumbnail-slideshow', './assets/js/components/_3_thumbnail-slideshow.js')
    .addEntry('_4_product-v2', './assets/js/components/_4_product-v2.js')

    // enables the Symfony UX Stimulus bridge (used in assets/bootstrap.js)
    .enableStimulusBridge('./assets/controllers.json')

    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    .splitEntryChunks()

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
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

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you use React
    //.enableReactPreset()

    // uncomment to get integrity="..." attributes on your script & link tags
    // requires WebpackEncoreBundle 1.4 or higher
    //.enableIntegrityHashes(Encore.isProduction())

    // uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()
    ;

module.exports = Encore.getWebpackConfig();