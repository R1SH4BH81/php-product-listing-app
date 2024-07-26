// client/vite.config.js

import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [react(),
           laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),],
  build: {
    outDir: 'dist', // Output directory for build files
  },
  server: {
    port: 3000,
  },
});
