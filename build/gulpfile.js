// Include gulp
var gulp = require('gulp'); 

// Include Our Plugins
var jshint = require('gulp-jshint');
var less = require('gulp-less');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var minify = require('gulp-minify-css');


// Lint Task
gulp.task('lint', function() {
    return gulp.src('../public/assets/js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});


// Compile Our Less
gulp.task('less', function() {
    return gulp.src('../public/assets/less/theme.less')
        .pipe(less())
        .pipe(gulp.dest('../public/assets/css'));
});

// Minify Our CSS
gulp.task('minify', function() {
    return gulp.src('../public/assets/css/*.css')
        .pipe(rename(function(path){
            path.extname = ".min.css";
        }))
        .pipe(minify())
        .pipe(gulp.dest('../public/assets/css'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('../public/assets/vendor/*.js')
        .pipe(concat('vendor.js'))
        .pipe(gulp.dest('../public/assets/js'))
        .pipe(rename('vendor.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('../public/assets/js'));
});


// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('../public/assets/js/*.js', ['lint', 'scripts']);
    gulp.watch('../public/assets/less/*.less', ['less']);
});

// Default Task
gulp.task('default', ['lint', 'less', 'minify', 'scripts', 'watch']);