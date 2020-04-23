require('es6-promise').polyfill();
var gulp          = require('gulp');
var sass          = require('gulp-sass');
var autoprefixer  = require('gulp-autoprefixer');
// keeps gulp from breaking if there's an error
var plumber = require('gulp-plumber');
// to better handle errors
var gutil = require('gulp-util');
// for live refresh on changes
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
// sourcemaps
var sourcemaps = require('gulp-sourcemaps');

// var sassOptions = {
//   errLogToConsole: true,
//   outputStyle: 'expanded'
// };

var onError = function (err) {
  console.log('An error occurred:', gutil.colors.magenta(err.message));
  gutil.beep();
  this.emit('end');
};

gulp.task('sass', function() {
  return gulp.src('./sass/**/*.scss')
  .pipe(sourcemaps.init())
  .pipe(plumber({ errorHandler: onError }))
  .pipe(sass())
  .pipe(autoprefixer())
  .pipe(sass().on('error', sass.logError))
  .pipe(sourcemaps.write())

  .pipe(gulp.dest('./'))
});

gulp.task('watch', function() {
  browserSync.init({
    files: ['./**/*.php'],
    proxy: 'http://sbsg-interior-design.localcom//',
    //proxy: 'http://sbsg.dev.cc//',
    // proxy: 'http://localhost:8888/wordpress/',
  });
  gulp.watch('./sass/**/*.scss', ['sass', reload]);
});

gulp.task('default', ['sass', 'watch']);
