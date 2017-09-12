<?php 
/*
* Plugin Name: Ajax loading
*
*/

/*
* Loading category posts
*/
function ajax_show_categoty_posts() {

  $link = ! empty( $_POST['link'] ) ? esc_attr( $_POST['link'] ) : false ;

  $pageID = ! empty( $_POST['page_id'] ) ? esc_attr( $_POST['page_id'] ) : false ;
  
  $catID = ! empty( $_POST['cat_id'] ) ? esc_attr( $_POST['cat_id'] ) : false ;

  $slug = $link ? wp_basename( $link ) : false;

  $cat = get_category_by_slug( $slug );
  

  if ( ! $cat ) {
    die('Category not found');
  }

  query_posts( array(
    'posts_per_page'=> get_option( 'posts_per_page' ),
    'post_status' => 'publish',
    'category_name' => $cat -> slug
  ) );?>

  <?php if ($pageID == 13 ):?>
    <?php if (have_posts() ):?>
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="portfolio_content__item">
          <a class="portfolio_content__link js-show-modal" href="<?php the_post_thumbnail_url(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>
        <!-- /.portfolio_content__item -->
      <?php endwhile; wp_reset_postdata()?>
  <?php endif;?>
  <?php endif;?>
  <?php if ($pageID == 11 ):?>
    <div class="services_content__item">
      <?php $arg_posts =  array(
        'orderby'      => 'ID',
        'order'        => 'ASC', 
        'posts_per_page' => 3, 
        'post_type' => 'post', 
        'post_status' => 'publish', 
        'cat' => $catID, 
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
    </div>
    <!-- /.services_content__item -->
    <div class="services_content__item additional">
      <p class="service__name additional__title">Additional</p>
      <?php 
        $arg_posts =  array(
          'orderby'      => 'ID',
          'order'        => 'ASC', 
          'posts_per_page' => 4, 
          'post_type' => 'post', 
          'post_status' => 'publish', 
          'cat' => catID, 
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
    </div>
    <!-- /.services_content__item -->
    <div class="services_content__item travel">
      <p class="service__name travel__title">Travel</p>
      <?php
          $arg_posts =  array(
            'orderby'      => 'ID',
            'order'        => 'ASC', 
            'posts_per_page' => 4, 
            'post_type' => 'post', 
            'post_status' => 'publish', 
            'cat' => catID, 
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
    </div>
    <!-- /.services_content__item -->
  <?php endif;?>
  <?php 
  $pagination = get_the_posts_pagination( array(
        'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
        'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
      ) );

      echo str_replace( admin_url( 'admin-ajax.php/' ), get_category_link( $cat -> term_id ), $pagination );

   wp_die();
}

add_action('wp_ajax_get_cat', 'ajax_show_categoty_posts' );
add_action('wp_ajax_nopriv_get_cat', 'ajax_show_categoty_posts' );

/*
* Load more posts button
*/
function more_posts_callback() {
  $offset = ( $_POST[ 'offset' ] ) ? (int) $_POST[ 'offset' ] : 6;
  query_posts( "posts_per_page=2&offset=". $offset );?>
  
  <?php if (have_posts() ) : ?>
    <?php while (have_posts() ) :the_post(); ?>
        <?php get_template_part( 'template-parts/review', 'loading' ); ?>
      <?php endwhile; ?>
  <?php endif; ?>

<?php  
  wp_reset_query();
  wp_die();
}
add_action( 'wp_ajax_more_posts', 'more_posts_callback' );
add_action( 'wp_ajax_nopriv_more_posts', 'more_posts_callback' );

function ajax_action() { 
  wp_register_script('ajax', plugins_url('ajax.js', __FILE__ ), array('jquery'), '', true);
  wp_enqueue_script('ajax');
  wp_localize_script( 'ajax', 'params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action('wp_enqueue_scripts', 'ajax_action');
