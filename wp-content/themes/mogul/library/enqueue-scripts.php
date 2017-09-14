<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'mogul_scripts' ) ) :
	function mogul_scripts() {

	// Enqueue the main Stylesheet.
	wp_enqueue_style( 'bootstrap.grid', get_template_directory_uri() . '/app/css/bootstrap.grid.css', array(), '3.3.7', 'all' );

	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/app/css/normalize.css', array(), '4.4.1', 'all' );

	wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/app/css/style.min.css', array(), '0.0.1', 'all' );

	// Deregister the jquery version bundled with WordPress.
	wp_deregister_script( 'jquery' );

	// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), '3.1.1', true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/app/plugins/slick.min.js', array('jquery'), '1.6.0', true );

	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/app/js/main.min.js', array(), '0.0.1', true );

	wp_localize_script( 'main-script', 'php_path', array(
			'ajax_url'     => admin_url( 'admin-ajax.php'),
			'template_url' => get_template_directory_uri()
		) );
	// Add the comment-reply library on pages where it is necessary
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	}

	add_action( 'wp_enqueue_scripts', 'mogul_scripts' );
endif;

