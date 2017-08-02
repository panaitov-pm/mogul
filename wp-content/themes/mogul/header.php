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
	<meta name="description" content="<?php bloginfo('description');?>">
	<title><?php bloginfo('name'); ?> | <?php $slug = get_post(); echo $slug -> post_title ?></title>
	
	<?php wp_head(); ?>
</head>

<div class="show-template"><?php global $template;?></div>
<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="head-top">
			<div class="head-top__btn">
				<a href="<?php echo get_permalink(77) ?> " class="book-appointment" target="_blank">
					<img src="<?php the_field('your_appointment', 'options') ?> " alt="Your appointment">
				</a>
			</div>
			<button class="menu-toggle hamburger hamburger--spin" type="button">
          <span class="hamburger-box">
              <span class="hamburger-inner"></span>
          </span>
      </button>
			<nav id="site-navigation" class="main-navigation">
			<button class="menu-close hamburger hamburger--spin" type="button">
          <span class="hamburger-box">
              <span class="hamburger-inner"></span>
          </span>
      </button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu_top',
					'container'        => 'ul',
				) );
			?>
		</nav><!-- #site-navigation -->
		</div>
		<!-- /.head-top -->
		<div class="site-branding">
			<?php
			if ( is_front_page() ) : ?>
				<img src="<?php echo get_template_directory_uri();?>/app/img/logo-main.jpg" alt="Mogul">
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri();?>/app/img/logo-other.jpg" alt="Mogul">
			<?php
			endif;?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
