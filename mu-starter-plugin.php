<?php
/**
 * MU Starter Plugin
 *
 * This is a starter plugin for Marshall University's WordPress network.
 *
 * @package  MU Starter Plugin
 *
 * Plugin Name:  MU Starter Plugin
 * Plugin URI: https://www.marshall.edu
 * Description: This is a starter plugin for Marshall University's WordPress network.
 * Version: 1.0
 * Author: Marshall University
 */

/**
 * Proper way to enqueue scripts and styles
 */
function mu_starter_plugin_scripts() {
	wp_enqueue_style( 'mu-starter-plugin', plugin_dir_url( __FILE__ ) . 'css/mu-starter-plugin.css', array(), filemtime( plugin_dir_path( __FILE__ ) . 'css/mu-starter-plugin.css' ), 'all' );
}
add_action( 'wp_enqueue_scripts', 'mu_starter_plugin_scripts' );

/**
 * Get versioned CSS/JS files compiled from Vite.
 *
 * @param string $filename The file name to get the manifest.json.
 * @return string
 */
function mu_starter_plugin_vite( $filename, $main_dir = 'source' ) {
	$filename = $main_dir . $filename;

	$mix_data   = file_get_contents( plugin_dir_url( __FILE__ ) . '/public/build/manifest.json' );
	$files_list = json_decode( $mix_data, true );

	if ( array_key_exists( $filename, $files_list ) ) {
		return esc_url( plugin_dir_url( __FILE__ ) . '/public/build/' . $files_list[ $filename ]['file'] );
	}
}
