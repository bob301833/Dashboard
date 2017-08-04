const { mix } = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/css/libs/blog-post.css',
    'resources/assets/css/libs/bootstrap.css',
    'resources/assets/css/libs/font-awesome.css',
    'resources/assets/css/libs/metisMenu.css',
    'resources/assets/css/libs/sb-admin-2.css',

], 'public/css/libs.css');

mix.styles([
    'resources/assets/js/libs/jquery.css',
    'resources/assets/js/libs/bootstrap.css',
    'resources/assets/js/libs/metisMenu.css',
    'resources/assets/js/libs/sb-admin-2.css',
    'resources/assets/js/libs/scripts.css',

], 'public/js/libs.js');
