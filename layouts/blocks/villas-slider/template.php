<section id="villas-slider" class="villas-slider">
	<?php
		$slider = get_sub_field( 'slider' );
		if ( $slider ) :
			?>

			<div class="container villas-slider__container">
				<?php get_template_part( '/layouts/partials/title', null, array(
					'class' => 'villas-slider__title',
					'title' => get_sub_field('title')
				) ); ?>

				<div class="villas-slider__slider swiper">
					<ul class="reset-list villas-slider__list swiper-wrapper">
						<?php
							foreach ( $slider as $post ) {
								setup_postdata($post);

								get_template_part('/layouts/partials/cards/villa-card', null, array(
									'class' => 'swiper-slide villas-slider__item',
								) );
							}

							wp_reset_postdata();
						?>
					</ul>

					<div class="pagination villas-slider__pagination"></div>
				</div>
			</div>

			<div class="villas-slider__controls">
				<div class="btn-prev villas-slider__prev">
					<svg width="55" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
				</div>

				<div class="btn-next villas-slider__next">
					<svg width="55" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
				</div>
			</div>

			<?php
		endif;
	?>
</section>
