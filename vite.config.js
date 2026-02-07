import { defineConfig } from 'vite';
import path from 'node:path';

export default defineConfig(({ command }) => ({
  base: command === 'build' ? '/wp-content/themes/rustikal/dist/' : '/',
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    manifest: 'manifest.json',
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'assets/ts/index.ts'),
      },
    },
  },
  server: {
    host: 'localhost',
    port: 5173,
    strictPort: true,
    cors: true,
    origin: 'http://localhost:5173',
  },
}));
