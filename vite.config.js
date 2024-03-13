import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import {prismjsPlugin} from "vite-plugin-prismjs";
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        prismjsPlugin({
            languages: ["html", "php", "php-extras", "javascript", "json", "sql", "shell", "bash","markup", "clike", "phpdoc", "yml", "nginx", "sass", "scss", "css", "ini", "markdown", "unescaped-markup"],
            plugins: [],
            //theme: "twilight",
            css: false,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'nodes_modules/bootstrap'),
            $image: resolve('./public/img'),
        }
    }
});
