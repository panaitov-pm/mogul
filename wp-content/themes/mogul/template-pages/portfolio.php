<?php
/**
 * 
 * Template name: Portfolio
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
      <div class="portfolio">
        <h2 class="portfolio__title"><?php the_title(); ?></h2>
          <?php 
            $arg_cat = array(
              'orderby'      => 'ID',
              'order'        => 'ASC',
              'include'      => array(1,3,4,5), // id рубрики, из которых надо выводить
              'taxonomy'     => 'category',
            );
            $categories = get_categories( $arg_cat );?>
            <?php 
            if( $categories ){ ?>
              <div class="portfolio__nav">
                <ul>
                  <?php foreach( $categories as $cat ): ?>
                    <li>
                      <a href="<?php echo get_category_link( $cat -> term_id ); ?>">
                        <?php echo $cat->name ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <div class="portfolio_content">
                <div class="portfolio_content__inner">
                  <?php
                  global $wp_query;
                    foreach( $categories as $cat ){
                      $arg_posts =  array(
                        'orderby'      => 'ID',
                        'order'        => 'ASC', 
                        'posts_per_page' => 5, 
                        'post_type' => 'post', 
                        'post_status' => 'publish', 
                        'cat' => $cat->cat_ID, 
                      );
                      $query = new WP_Query($arg_posts);?>
                      <?php if ($query->have_posts() ):?>
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                          <div class="portfolio_content__item">
                            <a class="portfolio_content__link js-show-modal" href="<?php the_post_thumbnail_url(); ?>">
                              <?php the_post_thumbnail(); ?>
                            </a>
                          </div>
                          <!-- /.portfolio_content__item -->
                        <?php endwhile; wp_reset_postdata()?>
                      <?php endif;?>
                    <?php 
                    } ?>
                </div>
                <!-- /.portfolio_content__inner -->
              </div>
              <!-- /.portfolio_content -->
              <div class="portfolio_info">
                <?php if ( get_field('portfolio_content_title') ) :?>
                <h2><?php the_field('portfolio_content_title'); ?> </h2>
                <?php endif; ?>
                <?php if ( get_field('portfolio_content_desc') ) :?>
                <div class="portfolio_info__desc"><?php the_field('portfolio_content_desc'); ?> </div>
                <?php endif; ?>
              </div>
              <!-- /.portfolio_content__inner -->
              <?php
            }?>
      </div>
      <!-- /.portfolio -->
    </main><!-- #main -->
  </div><!-- #primary -->

<?php

get_footer();

