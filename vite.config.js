import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import {prismjsPlugin} from "vite-plugin-prismjs";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        prismjsPlugin({
            languages: ["php", "php-extras", "javascript", "json", "sql", "shell", "bash", "markup", "html", "clike", "phpdoc", "yml", "nginx", "sass", "scss", "css"],
            plugins: [],
            //theme: "twilight",
            css: false,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'nodes_modules/bootstrap'),
        }
    }
});
