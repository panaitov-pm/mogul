<?php
/**
 * Template name: Main page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mogul
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      <?php if(have_posts()): ?>
        <div class="container main-info">
        <?php while(have_posts()): the_post() ?>
          <?php if($main_page_title = get_field('main_page_title')): ?>
            <h2><?php echo $main_page_title;?></h2>
          <?php endif; ?>
          <?php the_content();?>
          <div class="main-info__img"><?php the_post_thumbnail();?></div>
          <?php if($main_page_desc_continue = get_field('main_page_desc_continue')): ?>
            <p><?php echo $main_page_desc_continue; ?> </p>
          <?php endif; ?>
          <?php if($author_photo = get_field('author_photo')): ?>
            <div class="main-info__img main-info__img--author">
              <img src="<?php echo $author_photo;?>" alt="<?php the_field('author_name');?>">
            </div>
          <?php endif; ?>
          <div class="author-info">
            <?php if($author_name = get_field('author_name')): ?>
              <p class="author-info__name"><?php echo $author_name; ?></p>
            <?php endif; ?>
            <?php if($author_location = get_field('author_location')): ?>
              <p class="author-info__location"><?php echo $author_location; ?></p>
            <?php endif; ?>
            <?php if($author_email = get_field('author_email')): ?>
              <a class="author-info__email" href="mailto:<?php echo $author_email; ?>"><?php echo $author_email; ?></a>
            <?php endif; ?>
            <?php if($author_tel = get_field('author_tel')): ?>
              <a class="author-info__tel" href="tel:<?php echo $author_tel; ?>"><?php echo $author_tel; ?></a>
            <?php endif; ?>
          </div>
          <!-- /.author-info -->
        <?php endwhile; ?>
        </div>
        <!-- /.main-info -->
      <?php endif;?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
