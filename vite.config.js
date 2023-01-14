import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        hmr: {
            host: 'localhost',
        },
    },
    /* server: {
        https: true,
        hmr: {
            host: '127.0.0.1'
        },
    }, */
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/main.css', // custom
                'resources/js/main.js', // custom
            ],
            refresh: true,
        }),
    ],
});
