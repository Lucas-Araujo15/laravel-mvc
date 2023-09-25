const mix = require('laravel-mix')
// Guia de migração para o Vite: https://github.com/laravel/vite-plugin/blob/main/UPGRADE.md#migrating-from-laravel-mix-to-vite

mix.sass('resources/css/app.scss', 'public/css')
