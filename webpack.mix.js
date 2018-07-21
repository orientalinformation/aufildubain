let mix = require('laravel-mix');

// ******************** BACK OFFICE ******************** //
mix.scripts([
    'node_modules/lightbox2/dist/js/lightbox.js',
    'node_modules/imagesloaded/imagesloaded.pkgd.js',
    'node_modules/packery/dist/packery.pkgd.min.js',
    'node_modules/draggabilly/dist/draggabilly.pkgd.min.js',
    'resources/assets/js/admin/media_browser.js',
    'resources/assets/js/admin/trend_manager.js'
], 'public/js/admin.js');

mix.sass('resources/assets/sass/admin/admin.scss', 'public/css/admin.css');

// ******************** FRONT END ******************** //
mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/popper.js/dist/umd/popper.js',
    'node_modules/wowjs/dist/wow.js',
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'resources/assets/js/ie10-viewport-bug-workaround.js',
    'node_modules/parallax-imagescroll/jquery.imageScroll.js',
    'node_modules/slick-carousel/slick/slick.js',
    'resources/assets/js/vendor/jquery.slides.js',
    'node_modules/magnific-popup/dist/jquery.magnific-popup.js',
    'node_modules/imagesloaded/imagesloaded.pkgd.js',
    'node_modules/masonry-layout/dist/masonry.pkgd.js',
    'node_modules/select2/dist/js/select2.js',
    'node_modules/packery/dist/packery.pkgd.min.js',
    'resources/assets/js/vendor/markerclusterer.js',
    'resources/assets/js/app.js',
], 'public/js/app.js');

mix.sass('resources/assets/sass/app.scss', 'public/css/');
mix.sass('resources/assets/sass/fonts.scss', 'public/css/');

// @TODO: fix it (legacy)
mix.copy('resources/assets/js/legacy/home.js', 'public/js/home.js');
mix.copy('resources/assets/js/legacy/inspirations.js', 'public/js/inspirations.js');
mix.copy('resources/assets/sass/legacy/styles.css', 'public/css/styles.css');

// ******************** VERSIONING ENABLE ******************** //
mix.version();