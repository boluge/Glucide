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
var please = require('gulp-pleeease');
var jshint = require("gulp-jshint");
var concat = require("gulp-concat")
var uglify = require("gulp-uglify")
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
		browsers: ['> 5%', 'last 8 versions', 'ie 9']
	}
};

var uglifySrc = [
    /** Modernizr */
    "./resources/components/modernizr/modernizr.js",
    /** FastClick */
    "./resources/components/fastclick/lib/fastclick.js",
    /* MDL */
    "./resources/components/material-design-lite/material.js",
    /** Page scripts */
    "./public/js/app/app.js"
];

    gulp.task('sass', function () {
        gulp.src('./public/css/sass/*.scss')
            .pipe( sass( SassOptions ))
            .on( "error", function( e ) { console.error( e ); })
            .pipe( please( PleeeaseOptions ) )
            .pipe(gulp.dest('./public/css'));
    });

    gulp.task('copy', function () {
          return gulp.src('./resources/components/material-design-icons/iconfont/*.*')
                .pipe(gulp.dest('./public/css/fonts'));
    });

    gulp.task( 'jshint', function () {
        /** Test all `js` files exclude those in the `lib` folder */
        return gulp.src( "./public/js/app/*.js" )
            .pipe( jshint() )
            .pipe(jshint.reporter('default', { verbose: true }));
    });

gulp.task( 'uglify', ['jshint'],function() {
    return gulp.src( uglifySrc )
        .pipe( concat( "app.min.js" ) )
        .pipe( uglify() )
        .pipe( gulp.dest('./public/js') );
});

    gulp.task('default', ['sass', 'uglify'], function() {
        browserSync.init({
            proxy: "glucide.io"
        });

        gulp.watch("./public/css/sass/**/*.scss", ['sass']);
        gulp.watch("./public/js/app/*.js", ['uglify'])
        gulp.watch(["./app/**/*.php", "./resources/views/**/*.php", "./public/css/*.css", "./public/js/*.js" ]).on('change', browserSync.reload);
    });