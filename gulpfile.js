var gulp         = require( 'gulp' );
var sass         = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var plumber      = require( 'gulp-plumber' );
var sourcemaps   = require( 'gulp-sourcemaps' );
var progeny   = require( 'gulp-progeny' );
var changed      = require( 'gulp-changed' );
var imagemin     = require( 'gulp-imagemin' );
var imageminJpg  = require( 'imagemin-jpeg-recompress' );
var imageminPng  = require( 'imagemin-pngquant' );
var imageminGif  = require( 'imagemin-gifsicle' );
var svgmin       = require( 'gulp-svgmin' );
var concat       = require( 'gulp-concat' );
var jshint       = require( 'gulp-jshint' );
var rename       = require( 'gulp-rename' );
var uglify       = require( 'gulp-uglify' );
var browserSync  = require( 'browser-sync' );

// Sass
gulp.task( 'sass', function(done){ // 2
    gulp.src( './src/assets/sass/**/*.scss' ) // 3
        .pipe( plumber() ) // 4
        .pipe( progeny() ) // 4
        .pipe( sourcemaps.init() ) // 5
        .pipe( sass( { // 6
            outputStyle: 'expanded'
        } ) )
        .pipe( autoprefixer( { // 7
          "overrideBrowserslist": [
            'last 2 version', 'iOS >= 8.1', 'Android >= 4.4'
          ],
          cascade: false
        } ) )
        .pipe( sourcemaps.write() ) // 5
        .pipe( gulp.dest( './css/')) // 8
    done();
} );


gulp.task( 'imagemin', function(done) {
  // jpeg,png,gif
  gulp.src( './src/assets/images/**/*.+(jpg|jpeg|png|gif)' ) // 1
     .pipe( changed( './images' ) ) // 2
     .pipe( imagemin( [ // 3
         imageminPng(),
         imageminJpg(),
         imageminGif({
             interlaced: false,
             optimizationLevel: 3,
             colors: 180
         } )
     ] ) )
     .pipe( gulp.dest( './images/' ) );
  // svg
  gulp.src( './src/assets/images/**/*.+(svg)' ) // 4
     .pipe( changed( './images' ) )
     .pipe( svgmin() ) // 5
     .pipe( gulp.dest( './images/' ) );
  done();
} );

// concat js file(s)
gulp.task( 'js.concat', function(done) {
  gulp.src( [
      './src/assets/js/sample.js' // 1
  ] )
      .pipe( plumber() )
      .pipe( jshint() ) // 2
      .pipe( jshint.reporter( 'default' ) ) // 2
      .pipe( concat( 'bundle.js' ) ) // 3
      .pipe( gulp.dest( './js' ) );
  done();
} );

// compress js file(s)
gulp.task( 'js.compress', function(done) {
  gulp.src( './js/bundle.js' )
      .pipe( plumber() )
      .pipe( uglify() ) // 4
      .pipe( rename( 'bundle.min.js' ) ) // 5
      .pipe( gulp.dest( './js' ) );
  done();
} );

// Browser Sync
gulp.task('bs', function(done) {
  browserSync({
      server: { // 1
          baseDir: "kai555_wp.webcrow.local",
          index: "./wp-content/themes/blog/index.php"
      }
  });
  done();
});

// Reload Browser
gulp.task( 'bs-reload', function(done) {
  browserSync.reload(); // 2
  done();
});


// Default task
gulp.task( 'default',
  gulp.series('bs', 'sass', 'js.concat', 'js.compress', 'imagemin'),
  function(done) { // 1
    gulp.watch("./**/*.html", gulp.task('bs-reload')); // 2
    gulp.watch("./src/assets/sass/**/*.scss", gulp.task('sass', 'bs-reload')); // 3
    gulp.watch("./src/assets/js/*.js", gulp.task('js.concat', 'js.compress', 'bs-reload')); // 4
    gulp.watch("./src/assets/image/*", gulp.task('imagemin', 'bs-reload')); // 5
  done();
});
