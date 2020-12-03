const { src, dest, parallel, watch } = require('gulp');
const gulpSass = require('gulp-sass');
const browserSync = require('browser-sync').create();

function sass() {
    return src('./public/sass/import.scss')
    .pipe(gulpSass())
    .pipe(dest('./public/css/'))
    .pipe(browserSync.stream());
}

function watcher(done) {
    watch('./public/sass/**/*.scss', sass);
    browserSync.reload();
    done();
}

function browser() {
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });
    watch('./public/index.php').on('change', browserSync.reload);
}

module.exports = {
    sass,
    browser: parallel(browser, watcher)
}