const gulp = require('gulp');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const cssnext = require('postcss-cssnext');
const runSequence = require('run-sequence');
const plumber = require('gulp-plumber');
const combineMq = require('gulp-combine-mq');

const paths = {
  'scss': 'src/css/',
  'css': 'wordpress/wp-content/themes/internet-yami-ichi/assets/css/'
};

const cssOptionDev = {
  outputStyle: 'expanded',
  sourceComments: true
};

const cssOptionLive = {
  outputStyle: 'compressed',
  sourceComments: false
};

gulp.task('scss', function () {
  let processors = [
    cssnext()
  ];
  return gulp.src(paths.scss + '**/*.scss')
    // .pipe(plumber())
    .pipe(sass({
      outputStyle: 'expanded',
      sourceComments: true
    }).on('error', sass.logError))
    .pipe(postcss(processors))
    .pipe(gulp.dest(paths.css))
});


gulp.task('watch', function (callback) {
  gulp.watch([paths.scss + '/**/*.scss'], function (e) {
    return runSequence('scss');
  });
  // gulp.watch([`${path.src}/js/es6/**/*.js`], ['js']);
});

// CSS の Media Query をまとめます
gulp.task('combine_media_query', function () {
  return gulp.src(paths.css + '/*.css')
    .pipe(combineMq({
      beautify: false
    }))
    .pipe(gulp.dest(paths.css));
});

/**
 * task default
 */
gulp.task('default', function () {
  return runSequence(
    ['scss'],
    ["watch"]
  );
});

gulp.task('deploy', function () {
  cssOption = cssOptionLive;
  return runSequence(
    ['scss'],
    ['combine_media_query']
  );
});
