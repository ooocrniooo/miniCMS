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
 "../../assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css",
 //"../../assets/css/**"
];

var cmsScripts = [
 //"../../assets/vendor/dropzone/dist/dropzone.js",
 "../../assets/vendor/moment/min/moment.min.js",
 "../../assets/js/datesettings.js",
 "../../assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",

 //"../../assets/js/**"
];

elixir(function(mix) {
 mix
     .less('app.less')
     .styles(cmsStyles)
     .scripts(cmsScripts)
     .copy("resources/assets/vendor/bootstrap/dist/css/bootstrap.css",'public/css/bootstrap.min.css')
     .copy("resources/assets/vendor/bootstrap/dist/js/bootstrap.min.js",'public/js/bootstrap.min.js')
     .copy("resources/assets/vendor/bootstrap/js/transition.js",'public/js/transition.js')
     .copy("resources/assets/vendor/jquery/dist/jquery.min.js",'public/js/jquery.min.js')
     .copy("resources/assets/font",'public/font')
     .copy("resources/assets/css/marina",'public/css/marina')
     .copy("resources/assets/css/basic.css",'public/css/basic.css')
     .copy("resources/assets/js/dropzone.js",'public/js/dropzone.js')
     .copy("resources/assets/js/marina",'public/js/marina')
     .copy("resources/assets/img",'public/img')
     .version(['public/css/all.css','public/js/all.js'])
});

