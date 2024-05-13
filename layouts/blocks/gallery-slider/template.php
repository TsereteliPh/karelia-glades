<?php
	$gallery = get_sub_field( 'gallery' );
	if ( $gallery ) :
		?>

		<section id="gallery-slider" class="gallery-slider">
			<div class="container">
				<?php get_template_part( '/layouts/partials/title', null, array(
					'class' => 'title--ellipse gallery-slider__title',
					'title' => get_sub_field('title')
				) ); ?>

				<div class="gallery-slider__big-slider swiper">
					<div class="gallery-slider__big-wrapper swiper-wrapper">
						<?php foreach ( $gallery as $photo ) : ?>
							<a href="<?php echo $photo['url']; ?>" class="gallery-slider__big-link swiper-slide" data-fancybox="gallery-slider-<?php echo $args['block_id']; ?>">
								<?php echo wp_get_attachment_image( $photo['id'], 'full', false ); ?>
							</a>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="gallery-slider__thumb-slider swiper">
					<div class="gallery-slider__thumb-wrapper swiper-wrapper">
						<?php foreach ( $gallery as $photo ) : ?>
							<div class="gallery-slider__thumb-btn swiper-slide">
								<?php echo wp_get_attachment_image( $photo['id'], 'medium', false ); ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>

		<?php
	endif;
?>
