const mix = require("laravel-mix");

require('mix-tailwindcss');

mix.setPublicPath("assets")
    .sass("resources/scss/components.scss", "assets/css/components.css")
    .tailwind();