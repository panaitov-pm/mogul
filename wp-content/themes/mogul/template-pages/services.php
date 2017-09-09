<?php
/**
 * 
 * Template name: Services
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mogul
 */

get_header(); ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main services">
      <div class="portfolio">
        <h2 class="portfolio__title"><?php the_title(); ?></h2>
          <?php 
            $arg_cat = array(
              'orderby'      => 'ID',
              'order'        => 'ASC',
              'include'      => array(1,6,7,8), // id рубрики, из которых надо выводить
              'taxonomy'     => 'category',
            );
            $categories = get_categories( $arg_cat );?>
            <?php 
            if( $categories ){ ?>
              <div class="portfolio__nav">
                <ul>
                  <?php foreach( $categories as $cat ): ?>
                    <li>
                      <a href="<?php echo get_category_link( $cat -> term_id ) ?>" data-page_id="<?php echo the_ID(); ?>" data-cat_id="<?php echo $cat -> term_id ?>">
                        <?php echo $cat->name ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <div class="services_content">
                <div class="portfolio_content__inner">
                  <div class="services_content__item">
                    <?php
                      foreach( $categories as $cat ){
                        $arg_posts =  array(
                          'orderby'      => 'ID',
                          'order'        => 'ASC', 
                          'posts_per_page' => 2, 
                          'post_type' => 'post', 
                          'post_status' => 'publish', 
                          'cat' => $cat->cat_ID, 
                        );
                        $query = new WP_Query($arg_posts);?>
                        <?php if ($query->have_posts() ):?>
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <div class="service">
                                  <?php if(get_field('service_name')): ?>
                                    <p class="service__name"><?php the_field('service_name') ?></p>
                                  <?php endif; ?>
                                  <?php if(get_field('service_price')): ?>
                                    <p class="service__price"><?php the_field('service_price');?></p>
                                  <?php endif; ?>
                                  <?php if(get_field('service_desc')): ?>
                                    <p class="service__desc"><?php the_field('service_desc');?></p>
                                  <?php endif; ?>
                                </div>
                                <!-- /.service -->
                            <?php endwhile; wp_reset_postdata()?>
                        <?php endif;?>
                      <?php 
                    } ?>
                  </div>
                  <!-- /.services_content__item -->
                  <div class="services_content__item additional">
                    <p class="service__name additional__title">Additional</p>
                    <?php
                      foreach( $categories as $cat ){
                        $arg_posts =  array(
                          'orderby'      => 'ID',
                          'order'        => 'ASC', 
                          'posts_per_page' => 2, 
                          'post_type' => 'post', 
                          'post_status' => 'publish', 
                          'cat' => $cat->cat_ID, 
                        );
                        $query = new WP_Query($arg_posts);?>
                            
                        <?php if ($query->have_posts() ):?>
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <div class="additional__item">
                                  <?php if(get_field('additional_name')): ?>
                                    <p class="service__name"><?php the_field('additional_name') ?></p>
                                  <?php endif; ?>
                                  <?php if(get_field('additional_price')): ?>
                                    <p class="service__price"><?php the_field('additional_price');?></p>
                                  <?php endif; ?>
                                </div>
                                <!-- /.service -->
                            <?php endwhile; wp_reset_postdata()?>
                        <?php endif;?>
                      <?php 
                      } ?>
                  </div>
                  <!-- /.services_content__item -->
                  <div class="services_content__item travel">
                    <p class="service__name travel__title">Travel</p>
                    <?php
                      foreach( $categories as $cat ){
                        $arg_posts =  array(
                          'orderby'      => 'ID',
                          'order'        => 'ASC', 
                          'posts_per_page' => 2, 
                          'post_type' => 'post', 
                          'post_status' => 'publish', 
                          'cat' => $cat->cat_ID, 
                        );
                        $query = new WP_Query($arg_posts);?>
                        <?php if ($query->have_posts() ):?>
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <div class="travel__item">
                                  <?php if(get_field('travel_name')): ?>
                                    <p class="service__name"><?php the_field('travel_name') ?></p>
                                  <?php endif; ?>
                                  <?php if(get_field('travel_price')): ?>
                                    <p class="service__price"><?php the_field('travel_price');?></p>
                                  <?php endif; ?>
                                </div>
                                <!-- /.service -->
                            <?php endwhile; wp_reset_postdata()?>
                        <?php endif;?>
                      <?php 
                    } ?>
                  </div>
                  <!-- /.services_content__item -->
                </div>
                <!-- /.portfolio_content__inner -->
                <div class="service_examples">
                  <div class="services_content__item">
                    <p class="service__name service_examples__title">service examples</p>
                    <?php if( have_rows('service_example') ): ?>
                      <ul class="service_examples__list">
                        <?php while( have_rows('service_example') ): the_row();
                          // Declare variables below
                          $title = get_sub_field('service_example_title');
                          $link = get_sub_field('service_example_link');
                          // Use variables below ?>
                          <?php if($title): ?>
                            <li><a href="<?php echo $link; ?> "><?php echo $title; ?></a></li>
                          <?php endif; ?>
                        <?php endwhile; ?>
                      </ul>
                  </div>
                  <!-- /.services_content__item -->
                <?php endif; ?>
                </div>
                <!-- /.service_examples -->
              </div>
              <!-- /.services_content -->
              <?php
            }?>
      </div>
      <!-- /.portfolio -->
    </main><!-- #main -->
  </div><!-- #primary -->

<?php

get_footer();

