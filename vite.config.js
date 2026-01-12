import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    base: '/',
    server: {
        host: '0.0.0.0',
        port: 5173,
        hmr: {
            host: '192.168.137.1',
        },
    },
    // <-- important, sinon URLs absolues foirent
});
