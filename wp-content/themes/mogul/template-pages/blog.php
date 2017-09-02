<?php
/**
 * The template for displaying the Book Appointment
 * Template name: Blog
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
      <div class="blog-wrap">
        <div class="row">
          <div class="col-sm-8 col-lg-9">
            <?php 
              $wp_queryArgs = array(
                'post_type'=>'post',
                'posts_per_page' => -1,
                'orderby'=>'date',
                'order'=>'DESC'
            );
            $wp_query = new WP_Query($wp_queryArgs);?>
              <?php if($wp_query->have_posts()): ?>
                <div class="blog-posts">
                  <?php while($wp_query->have_posts()): $wp_query->the_post() ?>
                    <article class="blog-post">
                      <p class="blog-post__title"><?php the_title(); ?> </p>
                      <div class="blog-post__desc"><?php the_content(); ?> </div>
                    </article>
                    <!-- /.blog-post -->
                  <?php endwhile; ?>
                </div>
                <!-- /.blog-posts -->
              <?php endif;?>
          </div>
          <div class="col-sm-4 col-lg-2 col-lg-offset-1">
            <?php get_sidebar(); ?>
          </div>  
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </main><!-- #main -->
  </div><!-- #primary -->

<?php

get_footer();

