<?php
	$welcome = get_field( 'welcome' );
	if ( $welcome ) :
		$map_link = '#map';
		if ( $welcome['map'] ) $map_link = $welcome['map'];
		$tel = get_field( 'tel', 'options' );
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
			<div class="welcome__panel">
				<div class="welcome__link-wrapper">
					Мы находимся

					<a href="<?php echo $map_link; ?>" class="welcome__link">
						тут
						<span></span>
					</a>

					71 км от СПБ
				</div>

				<?php if ( $tel ) : ?>
					<a href="tel:<?php echo preg_replace( '/[^0-9,+]/', '', $tel ); ?>" class="welcome__tel">
						<svg width="22" height="27"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-phone"></use></svg>
						<?php echo $tel; ?>
					</a>
				<?php endif; ?>

				<button class="btn welcome__callback" type="button" <?php //todo: callback modal ?>>Заказать звонок</button>
			</div>

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
<?php endif; ?>
