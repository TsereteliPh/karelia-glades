<section id="image-slider" class="image-slider">
	<div class="container image-slider__container swiper">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'image-slider__title',
			'title' => get_sub_field('title')
		) ); ?>

		<?php
			$slider = get_sub_field( 'gallery' );
			if ( $slider ) :
				?>

				<ul class="reset-list image-slider__list swiper-wrapper">
					<?php foreach ( $slider as $slide ) : ?>
						<li class="image-slider__item swiper-slide">
							<a href="<?php echo $slide['url']; ?>" class="image-slider__link swiper-slide" data-fancybox="image-slider-<?php echo $args['block_id']; ?>">
								<?php echo wp_get_attachment_image( $slide['id'], 'full', false ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php
			endif;
		?>

		<div class="image-slider__pagination pagination"></div>
	</div>
</section>
