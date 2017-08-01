<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mogul
 */

?>

	</div><!-- #content -->

	<?php $footer = new WP_Query(array('post_type' => 'footer')); ?>
	<?php if ( $footer->have_posts() ) : ?>
	<?php while ( $footer->have_posts() ) : $footer->the_post(); ?>
		<footer id="colophon" class="site-footer">
			<div class="site-footer__col">
				<div class="subscribe">
					<p class="foot__title"><?php the_field('subscribe_title') ?></p>
					<p class="foot__subtitle"><?php the_field('subscribe_subtitle') ?></p>
					<div class="subscribe-form"><?php the_field('subscribe_form') ?></div>
				</div>
				<!-- /.subscribe -->
			</div>
			<!-- /.site-footer__col -->
			<div class="site-footer__col">
				<div class="foot-info">
					<p class="foot__title"><?php the_field('foot-info_title') ?></p>
					<p class="foot__subtitle"><?php the_field('foot-info_subtitle') ?></p>
					<div class="foot-info__contacts">
						<a href="#" class="foot-info__address"><?php the_field('foot-info_address') ?></a>
						<a href="mailto:<?php the_field('article_post_contact') ?>" class="foot-info__mail"><?php the_field('article_post_contact') ?></a>
						<a href="tel:<?php the_field('foot-info_tel') ?>" class="foot-info__tel"><?php the_field('foot-info_tel') ?></a>
					</div>
					<!-- /.foot-info__contacts -->

				</div>
				<!-- /.foot-info -->
			</div>
			<!-- /.site-footer__col -->
			<div class="site-footer__col">
				<div class="foot-social">
					<p class="foot__title"><?php the_field('social_title') ?></p>
					<p class="foot__subtitle"><?php the_field('social_subtitle') ?></p>
					<div class="foot-social__wrap">
						<div class="social">
							<?php if( have_rows('social_icons', 'options') ): ?>
								<ul>
								<?php while( have_rows('social_icons', 'options') ): the_row();
									// vars
									$icon = get_sub_field('social_icon');
									$link = get_sub_field('social_link'); ?>
									<li>
										<?php if( $icon ): ?>
											<a href="<?php the_sub_field('social_icon'); ?>">
												<img src="<?php echo $icon; ?>" alt="<?php echo $link; ?>" />
											</a>
										<?php endif; ?>
									</li>
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
						<!-- /.social -->
					</div>
				</div>
				<!-- /.foot-social -->
			</div>
			<!-- /.site-footer__col -->
		</footer><!-- #colophon -->
	<?php endwhile; ?>
	<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
