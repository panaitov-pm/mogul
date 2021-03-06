;(function () {

    var gulp = require('gulp'),
        autoprefixer = require('gulp-autoprefixer'),
        browserSync    = require('browser-sync'),
        cache = require('gulp-cache'),
        minifyCSS = require('gulp-clean-css'),
        csso = require('gulp-csso'),
        concat = require('gulp-concat'),
        gulpif = require('gulp-if'),
        imagemin = require('gulp-imagemin'),
        tinypng = require('gulp-tinypng'),
        notify = require("gulp-notify"),
        rename = require('gulp-rename'),
        sass = require('gulp-sass'),
        path = require('path'),
        stripDebug = require('gulp-strip-debug'),
        stripComments = require('gulp-strip-comments');
        uglify = require('gulp-uglify'),
        useref = require('gulp-useref'),
        pngquant = require('imagemin-pngquant'),
        runSequence = require('run-sequence'),
        del = require('del')
        gcmq = require('gulp-group-css-media-queries');

    var paths = {
        sass: path.resolve('app/sass'),
        css: path.resolve('app/css'),
        img: path.resolve('app/img'),
        favicon: path.resolve('app/favicon'),
        fonts: path.resolve('app/fonts'), 
        html: path.resolve('app'),
        js: path.resolve('app/js'), 
        plugins: path.resolve('app/plugins'), 
        production: path.resolve('dist')
    };

    //Sass
    gulp.task('sass', function() {
        return gulp.src([paths.sass + '/main.scss'])
            .pipe( sass()).on("error", notify.onError({
                    message: "<%= error.message %>",
                    title: "Scss Error!"
                }))
            .pipe( autoprefixer( ['last 5 version', 'safari 5', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'], {cascade: true} ) )
            .pipe(rename('style.css'))
            .pipe(gcmq())
            .pipe(gulp.dest(paths.css))
            .pipe(browserSync.reload({stream: true}));
    });

    //Minify css
     gulp.task('m-css', function() {
        return gulp.src([paths.css + '/style.css'])
            .pipe(minifyCSS())
            .pipe(rename('style.min.css'))
            .pipe(gulp.dest(paths.css + '/min/'));
    });

    // Useref
    gulp.task('useref', function() {
        return gulp.src('app/*.html')
            .pipe(useref())
            .pipe(gulpif('*.css', gcmq()))
            .pipe(gulpif('*.css', minifyCSS()))
            .pipe(gulpif('*.css', csso({sourceMap: true})))
            .pipe(gulpif('*.js', uglify()))
            .pipe(gulp.dest(paths.production));
    });

    //Scripts
    gulp.task('scripts', function() {  
        return gulp.src([
            paths.plugins + '/jquery-3.1.1.min.js', 
            paths.plugins + '/jquery-ui-1.12.1.min.js', 
            paths.plugins + '/SmoothScroll.min.js', 
            paths.plugins + '/viewportchecher.js', 
            paths.plugins + '/jquery.fancybox.min.js', 
            //paths.plugins + '/slick.min.js',
            //paths.plugins + '/wow.min.js'
            ])
        .pipe(stripDebug())
        .pipe(stripComments())
        .pipe(concat('vendor.min.js'))
        .pipe(gulp.dest(paths.production + '/js'));});

    gulp.task('main-script', function() {  
        return gulp.src([paths.js + '/**/*.js'])
        .pipe(browserSync.reload({stream: true}));
    });

    // minify Scripts
    gulp.task('m-js', function() {  
        return gulp.src([paths.js + '/main.js'])
        .pipe(stripDebug())
        .pipe(stripComments())
        .pipe(uglify())
        .pipe(rename('main.min.js'))
        .pipe(gulp.dest(paths.js + '/min/'));
    });

    gulp.task('main-script', function() {  
        return gulp.src([paths.js + '/**/*.js'])
        .pipe(browserSync.reload({stream: true}));
    });

    //Fonts
    gulp.task('fonts', function() {
        return gulp.src(paths.fonts + '/**/*')
            .pipe(gulp.dest(paths.production + '/fonts/'));
    });

    //Clean 'dist' before build
    gulp.task('clean-js', function() {
        return del(paths.js+'/min/', {force: true});
    });
    gulp.task('clean-css', function() {
        return del(paths.css+'/min/', {force: true});
    });

    // Clean cache for task Images
    gulp.task('clear', function() {
        return cache.clearAll();
    });

    // Images
    gulp.task('img', function () {
        return gulp.src(paths.img + '/**/*.*')
            /*.pipe(cache(imagemin({
                optimizationLevel: 3,
                interlaced: true,
                progressive: true,
                svgoPlugins: [{
                    removeViewBox: false
                }],
                use: [pngquant()]
            })))*/
            .pipe(tinypng('qjz_zHDbYwpaIh_8pSwH0Ewwr4PPn5TN'))
            .pipe(gulp.dest(paths.production + '/img/'));
    });

    // Favicons
    gulp.task('favicon', function () {
        return gulp.src(paths.favicon + '/**/*.*')
            .pipe(cache(imagemin({
                optimizationLevel: 3,
                interlaced: true,
                progressive: true,
                svgoPlugins: [{
                    removeViewBox: false
                }],
                use: [pngquant()]
            })))
            .pipe(gulp.dest(paths.production + '/favicon/'));
    });

    // Browser-sync
    gulp.task('browser-sync', function() {
        browserSync({
            server: {
                baseDir: 'app'
            },
            notify: false
        });
    });

    // Build
    gulp.task('build', function (callback) {
        runSequence('clean-js', 'clean-css', 'm-css', 'm-js', callback);
    });

    gulp.task('watch', ['sass', 'main-script', 'browser-sync'], function() {
        gulp.watch(paths.sass + '/**/*.scss', ['sass']);
        gulp.watch(paths.js + '/**/*.js', ['main-script']);
        gulp.watch(paths.html + '/*.html', browserSync.reload);
    });

    gulp.task('default', ['watch']);
    
})();
