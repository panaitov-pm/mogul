<?php 
$postID = $_POST['postId'];
require_once( $_SERVER['DOCUMENT_ROOT'] . '/mogul/wp-load.php' );?>
<?php echo get_template_directory(); ?>

<?php 
$args = array(
  'post_type' => 'brands',
  'p' => $postID
);
  query_posts( $args );

// Цикл WordPress
  if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <h4 class="brands__title"><?php the_title(); ?></h4>
        <?php echo $shortexcerpt = wp_trim_words( the_content(), $num_words = 100, $more = '' );  ?>
      <?php endwhile; ?>
  <?php endif;  wp_reset_query();?>
   
