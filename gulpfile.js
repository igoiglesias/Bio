
const gulp = require('gulp');

// const minify = require('gulp-minify');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify-es').default
const rename = require('gulp-rename')

const dev_css  = './css/*.css',
      prod_css = './css/',
      dev_js   = './js/*.js',
      prod_js  = './js/';

      function minify() {
        return(
          gulp.src( dev_css )
        //   .pipe( sassGlob() )
        //   .pipe( sass( ) )
        //   .pipe( gcmq() )
          .pipe(autoprefixer({
            overrideBrowserslist: ['last 3 versions'],
            cascade: false
          }))
          .pipe(cleanCSS())
          .pipe(rename({suffix: ".min"}))
          .pipe( gulp.dest( prod_css ) )
        )
      };
      exports.minify = minify;

      function scripts() {
        return(
          gulp.src(dev_js)
          .pipe(uglify())
          .pipe(rename({suffix: ".min"}))
          .pipe(gulp.dest(prod_js))
        )
      }
      exports.scripts = scripts

      function watchfiles() {
        gulp.watch(dev_css, compile);
  gulp.watch(dev_js, scripts);
}
const watch = gulp.parallel(watchfiles)
exports.watch = watch;
     
// gulp.task('compress', function() {
//     return gulp.src('js/*.js')
//         .pipe(minify({
//             ext: {
//                 min: '.min.js'
//             },
//             ignoreFiles: ['.min.js']
//         }))
//         .pipe(gulp.dest('js'))
// });

// gulp.task('watch', function(){
//   gulp.watch('js/*.js', ['min-js']); 
//   // Other watchers
// });

// gulp.task('default', ['compress', 'watch']);