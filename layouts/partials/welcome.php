<?php
	$welcome = get_field( 'welcome' );
	if ( $welcome ) :
		?>
			<section class="welcome">
				<div class="welcome__slider swiper">
					<div class="swiper-wrapper">
						<?php foreach( $welcome['background'] as $item ) : ?>
							<div class="welcome__slider-item swiper-slide"><?php echo wp_get_attachment_image( $item['img'], 'full', false ); ?></div>
						<?php endforeach; ?>
					</div>

					<div class="pagination pagination--light welcome__slider-pagination"></div>

					<div class="welcome__slider-controls">
						<div class="btn-next welcome__slider-next">
							<svg width="66" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
						</div>

						<div class="btn-prev welcome__slider-prev">
							<svg width="66" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
						</div>
					</div>
				</div>

				<div class="container--large welcome__container">
					<?php if ( $welcome['title'] ) : ?>
						<h1 class="welcome__title"><?php echo $welcome['title']; ?></h1>
					<?php endif; ?>

					<?php if ( $welcome['video'] ) : ?>
						<a href="<?php echo $welcome['video']; ?>" class="welcome__video" data-fancybox>
							<svg width="22" height="25"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-play"></use></svg>
						</a>
					<?php endif; ?>

					<?php if ( $welcome['text'] ) : ?>
						<div class="welcome__text"><?php echo $welcome['text']; ?></div>
					<?php endif; ?>
				</div>
			</section>
		<?php
	endif;
?>
