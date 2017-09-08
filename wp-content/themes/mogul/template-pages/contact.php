<?php
/**
 * The template for displaying the Book Appointment
 * Template name: Contact
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
        <h2><?php $slug = get_post(); echo $slug -> post_title ?></h2>
        <div class="contact-form">
          <?php the_field('main_form', 'options') ?>
          <div class="contact-form__btn contact-form__btn--appointment">
            <a href="#" class="js-show-modal book-appointment">
              <img src="<?php the_field('your_appointment', 'options') ?> " alt="Book Your appointment">
            </a>
          </div>
          <div class="contact-form__btn contact-form__btn--leave">
            <a href="#" class="js-show-modal leave-review">
              <img src="<?php the_field('leave_review', 'options') ?> " alt="Leave a review">
            </a>
          </div>
        </div>
        <!-- /.contact-form -->
      </div>
      <!-- /.appointment-form -->
    </main><!-- #main -->
  </div><!-- #primary -->
<?php
get_footer();

