<?php
	$slider = get_sub_field( 'slider' );
	if ( $slider ) :
		?>

		<section id="services-slider" class="services-slider">
			<div class="container services-slider__container swiper">
				<?php get_template_part( '/layouts/partials/title', null, array(
					'class' => 'title--default services-slider__title',
					'title' => get_sub_field('title')
				) ); ?>

				<ul class="reset-list services-slider__list swiper-wrapper">
					<?php foreach ( $slider as $post ) : ?>
						<?php setup_postdata( $post ); ?>
						<li class="services-slider__item swiper-slide">
							<div class="services-slider__thumb">
								<?php
									if ( get_the_post_thumbnail_url() ) {
										the_post_thumbnail( 'large' );
									} else {
										echo wp_get_attachment_image( 17, 'large', false );
									}
								?>
							</div>

							<div class="services-slider__label"><?php the_title(); ?></div>

							<?php if ( get_the_excerpt() ) : ?>
								<div class="services-slider__excerpt"><?php echo adem_excerpt(150); ?></div>
							<?php endif; ?>

							<a href="<?php the_permalink(); ?>" class="services-slider__link">Подробнее</a>
						</li>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</ul>

				<div class="pagination services-slider__pagination"></div>
			</div>

			<div class="services-slider__controls">
				<div class="btn-prev services-slider__prev">
					<svg width="55" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
				</div>

				<div class="btn-next services-slider__next">
					<svg width="55" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
				</div>
			</div>
		</section>

		<?php
	endif;
?>
