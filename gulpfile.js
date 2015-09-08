//var elixir = require('laravel-elixir');
//
///*
// |--------------------------------------------------------------------------
// | Elixir Asset Management
// |--------------------------------------------------------------------------
// |
// | Elixir provides a clean, fluent API for defining some basic Gulp tasks
// | for your Laravel application. By default, we are compiling the Less
// | file for our application, as well as publishing vendor resources.
// |
// */
//
//elixir(function(mix) {
//    mix.less('app.less');
//});

var elixir = require('laravel-elixir');

var cmsStyles = [
 //"../../assets/vendor/dropzone/dist/dropzone.css",
 "../../assets/css/**"
];

var cmsScripts = [
 //"../../assets/vendor/dropzone/dist/dropzone.js",
 "../../assets/js/dropit.js",
 "../../assets/js/**"
];

elixir(function(mix) {
 mix
     .less('app.less')
     .styles(cmsStyles)
     .scripts(cmsScripts)
     .version(['public/css/all.css','public/js/all.js'])
     //.copy('resources/assets/vendor/bootstrap/fonts/', 'public/build/fonts/')
});

