<?php
/**
 * 
 * Template name: Reviews
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
      <div class="reviews">
        <h2 class="reviews__title"><?php the_title(); ?></h2>
        <div class="reviews__inner reviews-wrap">
          <?php 
          $reviewArgs = array(
            'post_type'=>'post',
            'posts_per_page'=> 6,
            'orderby'=>'date',
            'order'=>'DESC'
          );
            $review = new WP_Query($reviewArgs);?>
            <?php if($review->have_posts()): ?>
              <?php while($review->have_posts()): $review->the_post() ?>
                <?php get_template_part( 'template-parts/review', 'loading' ); ?>
              <?php endwhile; ?>
            <?php endif;?>
        </div>
        <!-- /.reviews__inner --> 
        <div class="reviews__action">
          <a href="#" class="reviews__load" title="<?php _e('Click to load more posts', 'your locale'); ?>">
            <?php _e('Load more', 'your locale'); ?>
            <svg width="40px"  height="40px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-disk" style="background: none;">
              <g transform="translate(50,50)">
                <g ng-attr-transform="scale({{config.scale}})" transform="scale(0.7)">
                  <circle class="svg-dot" cx="0" cy="0" r="50" ng-attr-fill="{{config.c1}}"></circle>
                  <circle class="svg-cyrcle" cx="0" ng-attr-cy="{{config.cy}}" ng-attr-r="{{config.r}}" ng-attr-fill="{{config.c2}}" cy="-28" r="15" transform="rotate(269.729)">
                    <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 0 0;360 0 0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animateTransform>
                  </circle>
                </g>
              </g>
            </svg>  
          </a>
          <a href="<?php echo get_permalink(95) ?> " class="leave-review" target="_blank">
            <img src="<?php the_field('leave_review', 'options') ?> " alt="Leave a review">
          </a>
        </div>
        <!-- /.reviews__btn --> 
        <?php 
        global $wp_query;
        $brandsArgs = array(
          'post_type'      =>'brands',
          'posts_per_page' => 6,
          'orderby'        => 'ID',
          'order'          => 'ASC'
        );
          $brands = new WP_Query($brandsArgs);?>
          <?php if($brands->have_posts()): ?>
            <div class="brands">
              <p class="brands__title">Please visit the sites below for additional reviews</p>
              <div class="brands__list reviews-wrap">
                <?php while($brands->have_posts()): $brands->the_post() ?>
                  <a href="#" class="brand js-show-modal" data-post_id="<?php the_ID(); ?>">
                    <?php the_post_thumbnail(); ?>
                  </a>
                  <!-- /.brand -->
                <?php endwhile; ?>
              </div>
              <!-- /.reviews-wrap -->
          </div>
          <!-- /.brands -->  
          <?php endif;?>
        
             
      </div>
      <!-- /.reviews -->
    </main><!-- #main -->
  </div><!-- #primary -->

<?php

get_footer();

