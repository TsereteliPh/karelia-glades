<?php
	$videos = get_sub_field( 'slider' );
	$icon = get_sub_field( 'icon' );
	$text = get_sub_field( 'text' );
	if ( $videos ) :
		?>
			<section class="video swiper">
				<div class="video__slides swiper-wrapper">
					<?php foreach ( $videos as $video ) : ?>
						<a href="<?php echo $video[$video['type']]; ?>" class="video__slide swiper-slide" data-fancybox="video-gallery">
							<?php echo wp_get_attachment_image( $video['img'] ? $video['img'] : 17, 'full', false ); ?>

							<svg width="110" height="125"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-play"></use></svg>
						</a>
					<?php endforeach; ?>
				</div>

				<div class="container video__container">
					<div class="pagination pagination--light video__pagination"></div>

					<div class="video__content">
						<?php
							if ( $icon ) {
								echo wp_get_attachment_image( $icon, 'medium', false, array(
									'class' => 'video__icon'
								) );
							}
						?>

						<?php if ( $text ) : ?>
							<div class="video__text"><?php echo $text; ?></div>
						<?php endif; ?>
					</div>

					<div class="video__controls">
						<div class="btn-next video__next">
							<svg width="66" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
						</div>

						<div class="btn-prev video__prev">
							<svg width="66" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
						</div>
					</div>
				</div>
			</section>
		<?php
	endif;
?>
