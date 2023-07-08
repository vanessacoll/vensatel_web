let mix = require('laravel-mix');

mix.js()
   .copy('node_modules/leaflet/dist/leaflet.css', 'public/css')