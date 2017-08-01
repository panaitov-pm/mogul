<?php
/**
 * The template for displaying the Book Appointment
 * Template name: Book Appointment
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mogul
 */

get_header(); ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <div class="appointment-form">
        <?php the_field('main_form', 'options') ?>
      </div>
      <!-- /.appointment-form -->
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();

