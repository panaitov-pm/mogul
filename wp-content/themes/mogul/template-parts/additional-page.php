<?php 
$args = array(
  'type'  => 'page',
  'parent'=> 233,
);
$pages = get_pages( $args );
if( $pages ) :?>
  <h2><?php echo get_the_title(233); ?> </h2>
  <div class="additional_task">
    <ul>
      <?php foreach( $pages as $post ): setup_postdata( $post );?>
        <li><a href="<?php echo $post -> guid; ?> "><?php echo $post -> post_title; ?> </a></li>
      <?php endforeach; wp_reset_postdata(); ?>
    </ul>
  </div>
  <!-- /.additional -->
<?php endif; ?>


