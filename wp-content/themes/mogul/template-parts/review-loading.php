<div class="review">
  <div class="review__desc">
    <a href="<?php the_permalink(); ?> ">
      <?php  
      $trimexcerpt = get_the_content();
      echo $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 80, $more = '' ); ?>
    </a>
    
  </div>
  <!-- /.review__desc -->
  <div class="review__info">
    <span class="review__author">
      <?php the_field('post_author'); ?>
    </span>
    <span><?php the_field('author_location'); ?></span>
  </div>
  <!-- /.review__info -->
</div>
<!-- /.review -->