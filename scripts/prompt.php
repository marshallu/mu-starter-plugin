<?php

require 'vendor/autoload.php';

use function Laravel\Prompts\text;
use function Laravel\Prompts\progress;

$plugin_name = text(
	label: 'What is the name of your plugin?',
	required: true
);

$plugin_description = text( 'What is the description of your plugin?' );

$underscore_name = strtolower( str_replace( ' ', '_', $plugin_name ) );
$hypen_name      = strtolower( str_replace( ' ', '-', $plugin_name ) );

$progress = progress( label: 'Updating main plugin file', steps: 10 );
$progress->start();
$path_to_file  = './mu-starter-plugin.php';
$file_contents = file_get_contents( $path_to_file );
$file_contents = str_replace( 'MU Starter Plugin', $plugin_name, $file_contents );
$file_contents = str_replace( "This is a starter plugin for Marshall University's WordPress network.", $plugin_description, $file_contents );
$file_contents = str_replace( 'mu_starter_plugin', $underscore_name, $file_contents );
$file_contents = str_replace( 'mu-starter-plugin', $hypen_name, $file_contents );
file_put_contents( $path_to_file, $file_contents );
$progress->finish();

$progress = progress( label: 'Updating package.json', steps: 10 );
$progress->start();
$path_to_file  = './package.json';
$file_contents = file_get_contents( $path_to_file );
$file_contents = str_replace( 'mu-starter-plugin', $hypen_name, $file_contents );
file_put_contents( $path_to_file, $file_contents );
$progress->finish();

$progress = progress( label: 'Updating composer.json', steps: 10 );
$progress->start();
$path_to_file  = './composer.json';
$file_contents = file_get_contents( $path_to_file );
$file_contents = str_replace( 'MU Starter Plugin', $plugin_name, $file_contents );
$file_contents = str_replace( "This is a starter plugin for Marshall University's WordPress network.", $plugin_description, $file_contents );
$file_contents = str_replace( 'mu_starter_plugin', $underscore_name, $file_contents );
$file_contents = str_replace( 'mu-starter-plugin', $hypen_name, $file_contents );
file_put_contents( $path_to_file, $file_contents );
$progress->finish();

$progress = progress( label: 'Updating README.md', steps: 10 );
$progress->start();
$path_to_file  = './README.md';
$file_contents = file_get_contents( $path_to_file );
$file_contents = str_replace( 'MU Starter Plugin', $plugin_name, $file_contents );
$file_contents = str_replace( 'Use this repository to create new WordPress plugins for use on the Marshall University WordPress multisite. This repo includes everything needed to get up and running using the Marsha WordPress theme styles.', $plugin_description, $file_contents );
file_put_contents( $path_to_file, $file_contents );
$progress->finish();
