<section id="image-text-slider" class="image-text-slider">
	<div class="container image-text-slider__container swiper">
		<?php
			$title = get_sub_field( 'title' );
			if ( $title ) {
				echo sprintf(
					'<%1$s class="image-text-slider__title">%2$s</%1$s>',
					$title['type'],
					$title['text']
				);
			}
		?>

		<?php
			$slider = get_sub_field( 'slider' );
			if ( $slider ) :
				?>

				<ul class="reset-list image-text-slider__list swiper-wrapper">
					<?php foreach ( $slider as $slide ) : ?>
						<li class="image-text-slider__item swiper-slide">
							<div class="image-text-slider__img"><?php echo wp_get_attachment_image( $slide['img'] ? $slide['img'] : 17, 'large', false ); ?></div>

							<div class="image-text-slider__text"><?php echo $slide['text']; ?></div>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php
			endif;
		?>

		<div class="image-text-slider__controls">
			<div class="btn-prev image-text-slider__prev">
				<svg width="55" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
			</div>

			<div class="btn-next image-text-slider__next">
				<svg width="55" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
			</div>
		</div>
	</div>

	<svg class="image-text-slider__logo" width="560" height="auto"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo--frame"></use></svg>
</section>
