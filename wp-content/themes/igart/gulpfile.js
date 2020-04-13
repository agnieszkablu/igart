(() => {

  'use strict';

//
// Variables
//

const jshint = require('gulp-jshint'),
  stylish = require('jshint-stylish'),
  gulp = require('gulp'),
  {
    watch,
    src,
    dest
  } = require('gulp'),
  chokidar = require('chokidar'),
  babel = require('gulp-babel'),
  del = require("del"),
  sass = require('gulp-sass'),
  uglify = require('gulp-uglify'),
  concat = require('gulp-concat'),
  postcss = require('gulp-postcss'),
  autoprefixer = require('autoprefixer'),
  cleanCSS = require('gulp-clean-css'),
  sassLint = require('gulp-sass-lint'),
  browsersync = require('browser-sync').create(),
  jshintConfig = {
    'lookup': false,
    'bitwise': true,
    'browser': true,
    'curly': true,
    'eqeqeq': true,
    'eqnull': true,
    'es5': false,
    'esnext': true,
    'immed': true,
    'jquery': true,
    'latedef': true,
    'newcap': true,
    'noarg': true,
    'node': true,
    'strict': false,
    'trailing': false,
    'undef': false,
  },
  paths = {
    php: {
      src: ['*.php', 'template-parts/**/*.php', 'template-parts/**/**/*.php'],
    },
    styles: {
      src: ['sources/css/*.scss', 'sources/css/**/*.scss'],
      src_main: 'sources/css/style.scss',
      dest: 'css'
    },
    scripts: {
      src: ['sources/js/*.js', 'sources/js/owl-carousel/*.js'],
      dest: 'js'
    },
    base_vendor_scripts: {
      src: [
        //'node_modules/jquery/dist/jquery.min.js',
        'node_modules/popper.js/dist/umd/popper.js',
        'node_modules/owl.carousel/dist/owl.carousel.js',
        'node_modules/bootstrap/js/dist/util.js',
        'node_modules/bootstrap/js/dist/index.js',
        'node_modules/bootstrap/js/dist/alert.js',
        'node_modules/bootstrap/js/dist/button.js',
        'node_modules/bootstrap/js/dist/collapse.js',
        'node_modules/bootstrap/js/dist/dropdown.js',
        'node_modules/bootstrap/js/dist/modal.js',
        'node_modules/bootstrap/js/dist/tooltip.js',
        'node_modules/bootstrap/js/dist/popover.js',
        'node_modules/bootstrap/js/dist/tab.js',
        'node_modules/object-fit-images/dist/ofi.min.js',
      ]
    },
    animations_scripts: {
      src: 'sources/js/animations/*.js'
    },
    animations_vendor_scripts: {
      src: [
        // 'node_modules/scrollmagic/scrollmagic/uncompressed/ScrollMagic.js',
        // 'node_modules/scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js',
        'node_modules/in-view/dist/in-view.min.js'
      ]
    }
  },
  postCssPlugins = [
    autoprefixer()
  ],
  browserSyncUrl = 'http://localhost/igart/';

//
//Functions
//

// Clean assets
function clean() {
  console.log('Deleting builded css and js files');
  return del(['css/*.css', 'js/*js']);
}

function browserSync(done) {
  browsersync.init({
    proxy: browserSyncUrl,
    open: false,
    https: true,
    ghostMode: {
      clicks: false,
      forms: false,
      scroll: false
    }
  });

  done();
}

function theme_js(done) {

  return src(paths.scripts.src)
    .pipe(jshint(jshintConfig))
    .pipe(jshint.reporter(stylish))
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(uglify())
    .pipe(concat('script.min.js'))
    .pipe(dest(paths.scripts.dest)),
    done();
}

function vendor_js(done) {

  return src(paths.base_vendor_scripts.src)
    .pipe(concat('script-vendor.min.js'))
    .pipe(dest(paths.scripts.dest)),
    done();
}

function theme_sass(done) {

  return src(paths.styles.src_main)
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss(postCssPlugins))
    .pipe(cleanCSS({
      debug: true
    }, function(details) {
      console.log('Minified: ' + details.name + ': ' + details.stats.originalSize + ' => ' + details.stats.minifiedSize);
    }))
    .pipe(dest(paths.styles.dest)),
    done();
}

function lintFile(file) {
  gulp.src(file)
    .pipe(sassLint({
      configFile: '.sass-lint.yml'
    }))
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError());
}

function watchAssets() {
  //chokidar Watch to resolve linting files too many times on first time
  chokidar.watch(paths.styles.src)
    .on('change', function(path) {
      lintFile(path);
    });

  //Gulp Watch has default 200ms delay
  watch(paths.styles.src, gulp.series(theme_sass));

  watch(paths.scripts.src, gulp.series(theme_js));
}

function watchAndSync(done) {

  watchAssets();

  watch(paths.styles.src)
    .on('change', browsersync.reload);

  watch(paths.scripts.src)
    .on('change', browsersync.reload);

  watch(paths.php.src)
    .on('change', browsersync.reload);

  done();
}

//const build =

const build_vendors = gulp.series(
  vendor_js,
);

const build = gulp.series(
  clean,
  gulp.parallel(
    theme_sass,
    theme_js,
  )
);

exports.build = build;
exports.build_vendors = build_vendors;
exports.watch = watchAssets;
exports.serve = gulp.parallel(browserSync, watchAndSync);
exports.default = gulp.parallel(exports.build, watchAssets);
exports.rva = gulp.series(exports.build, exports.build_vendors);
})();
