const gulp = require('gulp');
const sass = require('gulp-sass');
const clean_css = require('gulp-clean-css');
const autoprefix = require('gulp-autoprefixer');
const plumber = require('gulp-plumber');
const rimraf = require("rimraf");
const path = require('path');
const uglify_js = require('gulp-uglify');
const babel = require('gulp-babel');
const size = require('gulp-size');

const SOURCE_PATH = './src';
const DIST_PATH = './dist';

gulp.task('build-css',() => {

  rimraf(path.join(__dirname, `${DIST_PATH}`), () => {});
  
	return gulp.src(`${SOURCE_PATH}/**/*.scss`)
		.pipe(plumber(true))
		.pipe(sass({outputStyle: 'compressed'}))
		.pipe(clean_css())
		.pipe(autoprefix())
    .pipe(size())
    .pipe(gulp.dest(DIST_PATH));
});

gulp.task('build-js', function(){
	return gulp.src(`${SOURCE_PATH}/**/*.js`)
    .pipe(plumber(true))
    .pipe(babel({presets: ['@babel/preset-env']}))
    .pipe(uglify_js())
    .pipe(gulp.dest(DIST_PATH));
});

const runAll = () => {
  return gulp.series('build-css', 'build-js');
}; 

gulp.task('watch', function(done) {
	if (process.argv.includes('--watch')) {
		console.log("Watching source directory, press Ctrl+C to exit");
		gulp.watch(`${SOURCE_PATH}/**/*`, runAll());
	} else {
		done();
	}
});

gulp.task('default', gulp.series(runAll(), 'watch'));