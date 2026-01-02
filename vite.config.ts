import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.tsx', 'resources/js/landing.tsx'],
            refresh: true,
        }),
        react({
            // Enable React Fast Refresh
            fastRefresh: true,
            // Use classic JSX runtime for better preamble detection
            jsxRuntime: 'classic',
            // Explicitly include the preamble
            include: /\.(tsx?|jsx?)$/,
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
        },
    },
});