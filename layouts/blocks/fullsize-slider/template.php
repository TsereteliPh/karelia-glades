<?php
	$slider = get_sub_field( 'slider' );
	if ( $slider ) :
		?>
			<section id="fullsize-slider" class="fullsize-slider swiper">
				<div class="fullsize-slider__slides swiper-wrapper">
					<?php foreach ( $slider as $slide ) : ?>
						<a href="<?php echo $slide['img']['url']; ?>" class="fullsize-slider__slide swiper-slide" data-fancybox="fullsize-slider-gallery" data-caption="<?php echo $slide['text']; ?>" data-icon="<?php echo $slide['icon']; ?>">
							<?php echo wp_get_attachment_image( $slide['img']['id'], 'full', false ); ?>
						</a>
					<?php endforeach; ?>
				</div>

				<div class="container fullsize-slider__container">
					<div class="pagination pagination--light fullsize-slider__pagination"></div>

					<div class="fullsize-slider__content">
						<img class="fullsize-slider__icon" src="" alt="Иконка" width="120" height="80">

						<div class="fullsize-slider__text"></div>
					</div>

					<div class="fullsize-slider__controls">
						<div class="btn-next fullsize-slider__next">
							<svg width="66" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
						</div>

						<div class="btn-prev fullsize-slider__prev">
							<svg width="66" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
						</div>
					</div>
				</div>
			</section>
		<?php
	endif;
?>
