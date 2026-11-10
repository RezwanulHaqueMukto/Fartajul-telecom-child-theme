<?php
/**
 * ShoppingCart Child theme functions.
 *
 * Loaded BEFORE the parent's functions.php. Do not copy the parent's file here.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue parent and child styles.
 * Priority 20 so this runs after the parent's own enqueue (default priority 10).
 */
function shoppingcart_child_enqueue_styles() {
	$parent_version = wp_get_theme( 'shoppingcart' )->get( 'Version' );
	$child_path     = get_stylesheet_directory() . '/style.css';
	$child_version  = file_exists( $child_path ) ? filemtime( $child_path ) : wp_get_theme()->get( 'Version' );

	// Parent stylesheet, loaded explicitly from the parent directory.
	wp_enqueue_style(
		'shoppingcart-parent-style',
		get_template_directory_uri() . '/style.css',
		array(),
		$parent_version
	);

	// Child stylesheet, loaded after the parent so your rules win.
	wp_enqueue_style(
		'shoppingcart-child-style',
		get_stylesheet_uri(),
		array( 'shoppingcart-parent-style' ),
		$child_version
	);
}
add_action( 'wp_enqueue_scripts', 'shoppingcart_child_enqueue_styles', 20 );

/**
 * Add your customizations below.
 * Wrap any parent function you override in the parent's function_exists() check,
 * otherwise define your own with a unique prefix.
 */
