import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
	plugins: [
		laravel({
			input: [
				'./source/css/mu-starter-plugin.css',
				// './source/js/mu-starter-plugin.js',
			],
		}),
  ],
});
