var gulp = require('gulp');
var $    = require('gulp-load-plugins')();
var browserSync = require('browser-sync').create();

var sassPaths = [
  'node_modules/foundation-sites/scss',
  'node_modules/motion-ui/src'
];

gulp.task('sass', function() {
  return gulp.src('scss/app.scss')
    .pipe($.sass({
      includePaths: sassPaths,
      outputStyle: 'compressed' // if css compressed **file size**
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9']
    }))
    .pipe(gulp.dest('css'))
    .pipe(browserSync.stream());
});

//basically just keeping an eye on all PHP files
gulp.task('php', function() {
    //watch any and all PHP files and refresh when something changes
    return gulp.src('./*.php')
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('default', ['sass'], function() {

  browserSync.init({
    notify: false,
	open: 'external',
    host: 'fasttrac-live.test',
	proxy: 'https://fasttrac-live.test',
	https: {
		key: "/Users/aadf82/Sites/SSL/fasttrac-live.test.key",
        cert: "/Users/aadf82/Sites/SSL/fasttrac-live.test.crt"
	}
  });

  //gulp.watch(['scss/**/*.scss'], ['sass']);
  // gulp.watch("./scss/*.scss", ['sass']);
  // gulp.watch("./sass/**/*.sass", ['sass']);
  gulp.watch("./*.php", ['php']).on('change', browserSync.reload);
});
