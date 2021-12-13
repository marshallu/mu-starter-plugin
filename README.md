MU Starter Plugin
===
Use this repository to create new WordPress plugins for use on the Marshall University WordPress multisite. This repo includes everything needed to get up and running using the Marsha WordPress theme styles.

# Getting Started
1. Clone the repo
2. Run `npm install` to install the required npm dependencies
3. Run `composer install` to install the required composer dependencies
4. Run `composer setup` and answer the questions to setup the plugin properly.
5. In development you can run the `npm run watch` command and it will continue running in your terminal and watch all relevant files for changes. Webpack will then automatically recompile your assets when it detects a change.
6. For production run the `npm run production` command and it will run all Mix tasks and minify output.

# Settings
This repo contains a default settings file for VS Code to ensure the code is developed following [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/).
