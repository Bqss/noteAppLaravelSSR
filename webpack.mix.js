const mix = require("laravel-mix");

mix.css("./resources/css/app.css", "css").setPublicPath("public");
mix.js("./resources/js/app.js", "js").setPublicPath("public");