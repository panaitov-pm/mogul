<?php
/**
 * Mogul functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mogul
 */

add_action('wp_head', 'show_template');
function show_template() {
    global $template;
    echo basename($template);
}

	/** Various clean up functions */
	require_once( 'library/cleanup.php' );

	/** Return entry meta information for posts */
	require_once( 'library/entry-meta.php' );

	/** Enqueue scripts */
	require_once( 'library/enqueue-scripts.php' );

	/** Add theme support */
	require_once( 'library/theme-support.php' );

	/** Customization Admin */
	require_once( 'library/custom-admin.php' );

	// ACF Pro Options Page
	if( function_exists('acf_add_options_page') ) {
	    acf_add_options_page(array(
	        'page_title'    => 'Theme General Settings',
	        'menu_title'    => 'Theme supports',
	        'menu_slug'     => 'options',
	        'capability'    => 'edit_posts',
	        'redirect'      => false
	    ));
	}

if ( ! function_exists( 'mogul_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mogul_setup() {


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu_top' => esc_html__( 'Header menu', 'mogul' ),
	) );
	
}
endif;
add_action( 'after_setup_theme', 'mogul_setup' );

	
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

//Delete title
add_filter('document_title_parts', function( $parts ){
	if( isset($parts['title']) ) unset($parts['title']);
	return $parts;
});

// Delete description
add_filter('document_title_parts', function($title){
	if( isset($title['tagline']) ) unset( $title['tagline'] );
	return $title;
});

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
