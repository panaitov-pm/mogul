<?php 
/*
* Plugin Name: Ajax loading
*
*/

add_action('wp_ajax_get_cat', 'ajax_show_categoty_posts' );
add_action('wp_ajax_nopriv_get_cat', 'ajax_show_categoty_posts' );

function ajax_show_categoty_posts() {

  $link = ! empty( $_POST['link'] ) ? esc_attr( $_POST['link'] ) : false ;

  $slug = $link ? wp_basename( $link ) : false;

  $cat = get_category_by_slug( $slug );
  

  if ( ! $cat ) {
    die('Рубрика не найдена');
  }

  query_posts( array(
    'posts_per_page'=> get_option( 'posts_per_page' ),
    'post_status' => 'publish',
    'category_name' => $cat -> slug
  ) );?>

  <?php if (have_posts() ):?>
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="portfolio_content__item">
        <a href="#"><?php the_post_thumbnail(); ?></a>
      </div>
      <!-- /.portfolio_content__item -->
    <?php endwhile; wp_reset_postdata()?>
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

function ajax_action() { 
  wp_register_script('ajax', plugins_url('ajax.js', __FILE__ ), array('jquery'), '', true);
  wp_enqueue_script('ajax');
  wp_localize_script( 'ajax', 'params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action('wp_enqueue_scripts', 'ajax_action');
