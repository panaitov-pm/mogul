<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mogul
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="blog-wrap">
			<div class="row">
				<div class="col-sm-8 col-md-9">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

						the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>

			</div>
		</div>
		<div class="col-sm-3 col-md-2 col-sm-offset-1">
			<?php get_sidebar(); ?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
