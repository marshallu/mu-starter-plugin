<?php

if ( ! file_exists( './mu-starter-plugin.php' ) ) {
	echo 'This plugin appears to have already been setup.';
	exit;
}

echo "Setup starting...\n";

echo 'What is the name of your plugin? ';
$plugin_name = trim( fgets( STDIN ) );
$plugin_name = trim( $plugin_name, '"' );

echo "\nWhat is the description of your plugin? ";
$plugin_description = trim( fgets( STDIN ) );
$plugin_description = trim( $plugin_description, '"' );

echo "\nWhat is your name? ";
$plugin_author = trim( fgets( STDIN ) );
$plugin_author = trim( $plugin_author, '"' );

$underscore_name = strtolower( str_replace( ' ', '_', $plugin_name ) );
$hypen_name      = strtolower( str_replace( ' ', '-', $plugin_name ) );

echo "\nUpdating files content...";
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

echo "\nRenaming files...";
rename( './source/css/mu-starter-plugin.css', './source/css/' . $hypen_name . '.css' );
rename( './mu-starter-plugin.php', './' . $hypen_name . '.php' );

echo "\nInstalling required npm modules...";
exec("npm install");

echo "\nInstalling required composer packages...";
exec('composer install');

$setup_file = './scripts/setup.php';

if ( file_exists( $setup_file ) ) {
	if ( unlink( $setup_file ) ) {
		echo "\nSetup file successfully removed.";
	}
 }

 if ( rmdir('./scripts') ) {
	 echo "\nScripts directory successfully removed.";
 }

 /**
 * Update composer.json
 */
$path_to_file  = './webpack.mix.js';
$file_contents = file_get_contents( $path_to_file );
$file_contents = preg_replace( "/\r|\n/", "", ',
"scripts": {
	"setup": [
		"@php scripts/setup.php"
	]
}' );
file_put_contents( $path_to_file, $file_contents );

echo "\nPlugin setup successfully.";
