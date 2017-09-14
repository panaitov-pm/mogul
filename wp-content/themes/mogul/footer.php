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
            <a class="foot-info__mail" href="mailto:<?php the_field('author_email', 2) ?>"><?php the_field('author_email', 2)?></a>
						<a href="tel:<?php the_field('foot-info_tel') ?>" class="foot-info__tel"><?php the_field('foot-info_tel')?></a>
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
											<a href="<?php echo $link; ?>">
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
<div class="modal-wrap">
    <div class="modal">
      <button class="modal__close">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 294.843 294.843" xml:space="preserve">
          <path d="M147.421,0C66.133,0,0,66.133,0,147.421s66.133,147.421,147.421,147.421c38.287,0,74.567-14.609,102.159-41.136
            c2.389-2.296,2.464-6.095,0.167-8.483c-2.295-2.388-6.093-2.464-8.483-0.167c-25.345,24.367-58.672,37.786-93.842,37.786
            C72.75,282.843,12,222.093,12,147.421S72.75,12,147.421,12s135.421,60.75,135.421,135.421c0,16.842-3.052,33.273-9.071,48.835
            c-1.195,3.091,0.341,6.565,3.432,7.761c3.092,1.193,6.565-0.341,7.761-3.432c6.555-16.949,9.879-34.836,9.879-53.165
            C294.843,66.133,228.71,0,147.421,0z"/>
          <path d="M167.619,160.134c-2.37-2.319-6.168-2.277-8.485,0.09c-2.318,2.368-2.277,6.167,0.09,8.485l47.236,46.236
            c1.168,1.143,2.683,1.712,4.197,1.712c1.557,0,3.113-0.603,4.288-1.803c2.318-2.368,2.277-6.167-0.09-8.485L167.619,160.134z"/>
          <path d="M125.178,133.663c1.171,1.171,2.707,1.757,4.243,1.757s3.071-0.586,4.243-1.757c2.343-2.343,2.343-6.142,0-8.485
            L88.428,79.942c-2.343-2.343-6.143-2.343-8.485,0c-2.343,2.343-2.343,6.142,0,8.485L125.178,133.663z"/>
          <path d="M214.9,79.942c-2.343-2.343-6.143-2.343-8.485,0L79.942,206.415c-2.343,2.343-2.343,6.142,0,8.485
            c1.171,1.171,2.707,1.757,4.243,1.757s3.071-0.586,4.243-1.757L214.9,88.428C217.243,86.084,217.243,82.286,214.9,79.942z"/>
        </svg>
      </button>
      <div class="modal-form">
    	  <?php if (is_page(17)) {
    	  	the_field('main_form', 'options');
    	  } 
    	  if (is_page(13)) :?>
					<img class="modal-form__img" src="" alt="">
    	  <?php endif; ?>
        <?php if (is_page(9)) :?>
          <div class="modal__brand-info"></div>
        <?php endif; ?>
      </div>
      <!-- /.modal-form -->
    </div>
    <!-- /.modal -->
</div>
<!-- /.modal-wrap -->

<?php wp_footer(); ?>

</body>
</html>
