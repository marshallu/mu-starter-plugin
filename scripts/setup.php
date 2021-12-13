<?php

echo "Setup starting...\n\n";

echo 'What is the name of your plugin? ';
$plugin_name = rtrim( fgets( STDIN ) );

echo 'What is the description of your plugin? ';
$plugin_description = rtrim( fgets( STDIN ) );

echo 'What is your name? ';
$plugin_author = rtrim( fgets( STDIN ) );

$underscore_name = strtolower( str_replace( ' ', '_', $plugin_name ) );
$hypen_name      = strtolower( str_replace( ' ', '-', $plugin_name ) );

/**
 * Update mu-starter-plugin.php.
 */
$path_to_file  = './mu-starter-plugin.php';
$file_contents = file_get_contents( $path_to_file );
$file_contents = str_replace( 'MU Starter Plugin', $plugin_name, $file_contents );
$file_contents = str_replace( "This is a starter plugin for Marshall University's WordPress network.", $plugin_description, $file_contents );
$file_contents = str_replace( 'Author: Marshall University', 'Author: ' . $plugin_author, $file_contents );
$file_contents = str_replace( 'mu_starter_plugin', $underscore_name, $file_contents );
$file_contents = str_replace( 'mu-starter-plugin', $hypen_name, $file_contents );
file_put_contents( $path_to_file, $file_contents );

/**
 * Update package.json.
 */
$path_to_file  = './package.json';
$file_contents = file_get_contents( $path_to_file );
$file_contents = str_replace( 'mu-starter-plugin', $hypen_name, $file_contents );
file_put_contents( $path_to_file, $file_contents );

/**
 * Update README.md.
 */
$path_to_file  = './README.md';
$file_contents = file_get_contents( $path_to_file );
$file_contents = str_replace( 'MU Starter Plugin', $plugin_name, $file_contents );
$file_contents = str_replace( 'Use this repository to create new WordPress plugins for use on the Marshall University WordPress multisite. This repo includes everything needed to get up and running using the Marsha WordPress theme styles.', $plugin_description, $file_contents );
file_put_contents( $path_to_file, $file_contents );

/**
 * Update webpack.mix.js.
 */
$path_to_file  = './webpack.mix.js';
$file_contents = file_get_contents( $path_to_file );
$file_contents = str_replace( 'mu-starter-plugin', $hypen_name, $file_contents );
file_put_contents( $path_to_file, $file_contents );

rename( './source/css/mu-starter-plugin.css', './source/css/' . $hypen_name . '.css' );
rename( './mu-starter-plugin.php', './' . $hypen_name . '.php' );

echo '\n\nPlugin setup successfully.';
