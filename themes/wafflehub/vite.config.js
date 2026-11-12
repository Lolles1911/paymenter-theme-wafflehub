import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import path from 'path'
import tailwindcss from '@tailwindcss/vite'

// Only the stylesheet is built here. The JavaScript is the default theme's
// own build (see views/layouts/app.blade.php), so it always matches the
// Paymenter version it runs on.
//
// Build from Paymenter's folder:  npm run build wafflehub
export default defineConfig({
    plugins: [
        laravel({
            input: [path.resolve(import.meta.dirname, 'css/app.css')],
            buildDirectory: 'wafflehub/',
            refresh: true,
        }),
        tailwindcss(),
    ],
})
