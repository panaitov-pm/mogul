<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mogul
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php global $template;?>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<a href="#" class="book-appointment">
			<img src="" alt="">
		</a>
		<div class="site-branding">
			<?php
			if ( is_front_page() ) : ?>
				<img src="<?php echo get_template_directory_uri();?>/app/img/logo-main.jpg" alt="Mogul">
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri();?>/app/img/logo-other.jpg" alt="Mogul">
			<?php
			endif;?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
