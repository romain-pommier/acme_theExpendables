var concat = require('gulp-concat');
var gulp = require('gulp');
var merge = require('merge-stream');
var order = require('gulp-order');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var uglifycss = require('gulp-uglifycss');

var rootPath = './';
var rootPathJs = './';

var paths = {
    js: [
    ],
    jsCopy: [
    ],
    sass: [
        'sass/main.scss',
    ],
    css: [
    ],
    font: [
    ],
    img: [
    ]
};

gulp.task('js', function () {
    gulp.src(paths.jsCopy)
        .pipe(gulp.dest(rootPathJs + 'js/'));
    
    
    return gulp.src(paths.js)
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(gulp.dest(rootPath))
    ;
});

gulp.task('css', function() {
    return gulp.src(paths.sass)
        .pipe(sass())
        .pipe(uglifycss())
        .pipe(concat('acme.css'))
        .pipe(gulp.dest(rootPath))
    ;
});

gulp.task('font', function() {
    return gulp.src(paths.font)
        .pipe(gulp.dest(rootPath + 'fonts/'))
    ;
});

gulp.task('img', function() {
    return gulp.src(paths.img)
        .pipe(gulp.dest(rootPath + 'img/'))
    ;
});

gulp.task('task-watch', function() {
    gulp.watch(paths.js, ['js']);
    gulp.watch(['sass/*', 'sass/*/*', 'sass/*/*/*', 'sass/*/*/*/*'], ['css']);
    gulp.watch(paths.css, ['css']);
    gulp.watch(paths.img, ['img']);
});

gulp.task('default', ['js', 'css', 'font', 'img']);
gulp.task('watch', ['default', 'task-watch']);