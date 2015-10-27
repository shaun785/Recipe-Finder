var gulp = require('gulp');
var exec = require('child_process').exec;
var phpunit = require('gulp-phpunit'),
    notify  = require('gulp-notify');

gulp.task('clear-cache', function() {
    exec('app/console cache:clear', function (err, stdout, stderr) {
        console.log(stdout);
        console.log(stderr);
    });
});

gulp.task('assets-install', ['clear-cache'], function() {
    exec('app/console assets:install', function (err, stdout, stderr) {
        console.log(stdout);
        console.log(stderr);
    });
});

gulp.task('assetic-dump', ['assets-install'], function() {
    exec('app/console assetic:dump', function (err, stdout, stderr) {
        console.log(stdout);
        console.log(stderr);
    });
});

gulp.task('phpunit', ['assetic-dump'], function() {
    gulp.src('app/phpunit.xml')
        .pipe(phpunit('bin/phpunit'))
});

gulp.task('default', ['phpunit']);