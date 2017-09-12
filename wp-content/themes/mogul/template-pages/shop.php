<?php
/**
 * 
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
      <h2 class="reviews__title"><?php the_title(); ?></h2>
      <section class="main-slider">
        <div class="container">
          <?php
            $link = get_template_directory_uri();
            $params = array(
               'post_type' => 'product',
               'posts_per_page' => 5,
               'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => 'new_building', 
                    ),
                ),
             );
            $wc_query = new WP_Query($params);?>
            <div class="slider-box">
                <h2 class="title">Новострой</h2>
                <hr class="title-hr">
                <?php if ($wc_query->have_posts()) : ?>
                  <div class="slider-items">
                    <?php while ($wc_query->have_posts()) : $wc_query->the_post(); 
                      $rooms_number = get_the_terms( $product->id, 'pa_rooms_number' );                      
                      $squares = get_the_terms( $product->id, 'pa_square' );      
                      $apartments_floor = get_the_terms( $product->id, 'pa_apartment_floor' );                      
                      $buildings_floor = get_the_terms( $product->id, 'pa_building_floor' );
                      $districts = get_the_terms( $product->id, 'pa_district' ); 

                      $room_number = ($rooms_number) ? array_shift( $rooms_number ) : "" ;                    
                      $square = ($squares) ? array_shift( $squares ) : "" ;                    
                      $apartment_floor = ($apartments_floor) ? array_shift( $apartments_floor ) : "" ;                    
                      $building_floor = ($buildings_floor) ? array_shift( $buildings_floor ) : "" ;
                      $district = ($districts) ? array_shift( $districts ) : "" ; ?>
                      <div class="slider-item">
                          <div class="slider-item__img">
                              <?php the_post_thumbnail(); ?>
                              <p class="slider-item__price"><?php echo $product->get_price_html(); ?> </p>
                          </div>
                          <div class="slider-item__name">
                              <a href="#"><?php the_title(); ?></a>
                              <?php the_excerpt(); ?> <p><?php echo $district -> name; ?> </p>
                          </div>
                          <div class="slider-item__info">
                              <div class="slider-item__info-1">
                                  <img src="<?php echo $link; ?>/app/images/house-plan-scale.png" alt="">
                                  <p><?php echo $square->name;?>m2</p>
                              </div>
                              <div class="slider-item__info-2">
                                  <img src="<?php echo $link; ?>/app/images/stairs.png" alt="">
                                  <p><?php echo $apartment_floor -> name ?>/<?php echo $building_floor -> name ?></p>
                              </div>
                              <div class="slider-item__info-3">
                                  <img src="<?php echo $link; ?>/app/images/room-bed.png" alt="">
                                  <p><?php echo $room_number->name;?></p>
                              </div>
                          </div>
                          <div class="slider-item__bottom">
                              <div class="slider-item__bottom-icon">
                                  <a href="#"><img src="<?php echo $link; ?>/app/images/heart.png" alt=""></a>
                                  <a href="#"><img src="<?php echo $link; ?>/app/images/connect.png" alt=""></a>
                              </div>
                              <div class="slider-item__bottom-more">
                                  <a href="<?php the_permalink(); ?>">Подробнее ></a>
                              </div>
                          </div>
                      </div>
                    <?php endwhile; wp_reset_postdata();?>
                  </div>
                <?php endif; ?>
            </div>
            <?php
            $params = array(
               'post_type' => 'product',
               'posts_per_page' => 5,
               'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => 'new_apartment', 
                    ),
                ),
             );
            $wc_query = new WP_Query($params);?>
            <div class="slider-box">
                <h2 class="title">Новые поступления</h2>
                <hr class="title-hr">
                <?php if ($wc_query->have_posts()) : ?>
                  <div class="slider-items">
                    <?php while ($wc_query->have_posts()) : $wc_query->the_post(); 
                      $rooms_number = get_the_terms( $product->id, 'pa_rooms_number' );                      
                      $squares = get_the_terms( $product->id, 'pa_square' );      
                      $apartments_floor = get_the_terms( $product->id, 'pa_apartment_floor' );                      
                      $buildings_floor = get_the_terms( $product->id, 'pa_building_floor' );  
                      $districts = get_the_terms( $product->id, 'pa_district' );                     

                      $room_number = ($rooms_number) ? array_shift( $rooms_number ) : "" ;                    
                      $square = ($squares) ? array_shift( $squares ) : "" ;                    
                      $apartment_floor = ($apartments_floor) ? array_shift( $apartments_floor ) : "" ;                    
                      $building_floor = ($buildings_floor) ? array_shift( $buildings_floor ) : "" ;
                      $district = ($districts) ? array_shift( $districts ) : "" ; ?>
                      <div class="slider-item">
                          <div class="slider-item__img">
                              <?php the_post_thumbnail(); ?>
                              <p class="slider-item__price"><?php echo $product->get_price_html(); ?> </p>
                          </div>
                          <div class="slider-item__name">
                              <a href="#"><?php the_title(); ?></a>
                              <?php the_excerpt(); ?> <p><?php echo $district -> name; ?></p>
                          </div>
                          <div class="slider-item__info">
                              <div class="slider-item__info-1">
                                  <img src="<?php echo $link; ?>/app/images/house-plan-scale.png" alt="">
                                  <p><?php echo $square->name;?>m2</p>
                              </div>
                              <div class="slider-item__info-2">
                                  <img src="<?php echo $link; ?>/app/images/stairs.png" alt="">
                                  <p><?php echo $apartment_floor -> name ?>/<?php echo $building_floor -> name ?></p>
                              </div>
                              <div class="slider-item__info-3">
                                  <img src="<?php echo $link; ?>/app/images/room-bed.png" alt="">
                                  <p><?php echo $room_number->name;?></p>
                              </div>
                          </div>
                          <div class="slider-item__bottom">
                              <div class="slider-item__bottom-icon">
                                  <a href="#"><img src="<?php echo $link; ?>/app/images/heart.png" alt=""></a>
                                  <a href="#"><img src="<?php echo $link; ?>/app/images/connect.png" alt=""></a>
                              </div>
                              <div class="slider-item__bottom-more">
                                  <a href="<?php the_permalink(); ?>">Подробнее ></a>
                              </div>
                          </div>
                      </div>
                    <?php endwhile; wp_reset_postdata();?>
                  </div>
                <?php endif; ?>
            </div>
        </div>
      </section>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php

get_footer();

