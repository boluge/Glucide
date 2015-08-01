var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
});


var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require("gulp-rename");
var please = require('gulp-pleeease');
var browserSync = require('browser-sync').create();

var SassOptions = {
	errLogToConsole: true
};

var PleeeaseOptions = {
	sourcemaps: false,
	filters: true,
	rem: ['14px'],
	pseudoElements: true,
	removeAllComments: true,
	opacity: true,
	minifier: true,
	mqpacker: true,
	autoprefixer: {
		browsers: ['> 5%', 'last 10 versions', 'ie 9']
	}
};

gulp.task('sass', function () {
  gulp.src('./public/sass/*.scss')
    .pipe( sass( SassOptions ))
    .on( "error", function( e ) { console.error( e ); })
    .pipe(gulp.dest('./public/css'));
});

gulp.task('copy', function () {
  return gulp.src('./bower_components/material-design-icons/iconfont/*.*')
    .pipe(gulp.dest('./public/css/fonts'));
});

gulp.task('css', ['sass'], function () {
	return gulp.src('./public/sass/css/style.css')
		.pipe( please( PleeeaseOptions ) )
		.pipe(rename({
			suffix: '.min',
			extname: '.css'
		}))
		.pipe(gulp.dest('./public/css'));
});

gulp.task('serve', ['css'], function() {

    browserSync.init({
        proxy: "localhost/glucide/public"
    });

    gulp.watch("./public/sass/*.scss", ['css']);
    gulp.watch(["./app/**/*.php", "./resources/**/*.php", "./public/css/*.css" ]).on('change', browserSync.reload);
});
