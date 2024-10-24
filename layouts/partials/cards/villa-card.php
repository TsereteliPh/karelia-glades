<li class="villa-card <?php echo $args['class']; ?>">
	<div class="villa-card__gallery swiper">
		<div class="villa-card__gallery-wrapper swiper-wrapper">
			<?php
				$thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );
				$gallery = get_field( 'gallery', get_the_ID() );

				if ( $thumb ) the_post_thumbnail( 'full', array( 'class' => 'villa-card__gallery-img swiper-slide' ) );

				if ( $gallery ) {
					foreach ( $gallery as $photo ) {
						echo wp_get_attachment_image( $photo['id'], 'full', false, array(
							'class' => 'villa-card__gallery-img swiper-slide'
						) );
					}
				}

				if ( ! $thumb && ! $gallery ) {
					echo wp_get_attachment_image( 17, 'full', false, array(
						'class' => 'villa-card__gallery-img swiper-slide'
					) );
				}
			?>
		</div>

		<?php if ( $gallery ) : ?>
			<div class="villa-card__gallery-prev"></div>
			<div class="villa-card__gallery-next"></div>

			<div class="pagination pagination--light villa-card__gallery-pagination"></div>
		<?php endif; ?>
	</div>

	<div class="villa-card__content">
		<svg class="villa-card__logo" width="170" height="230"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo--frame"></use></svg>

		<div class="villa-card__label">
			<span>Вилла</span>
			<?php the_title(); ?>
		</div>

		<?php if ( get_field( 'description' ) ) : ?>
			<div class="villa-card__desc"><?php the_field( 'description' ); ?></div>
		<?php endif; ?>

		<?php if ( get_field( 'advantages' ) ) : ?>
			<div class="villa-card__advantages"><?php the_field( 'advantages' ); ?></div>
		<?php endif; ?>

		<div class="villa-card__links">
			<a href="<?php the_permalink(); ?>" class="villa-card__link">Подробнее</a>

			<?php $coming_soon = get_field( 'coming_soon' ); ?>
			<a <?php echo ! $coming_soon ? 'href="#tl-search-form"' : ''; ?> class="villa-card__book"><?php echo $coming_soon ? 'Скоро в продаже' : 'Забронировать'; ?></a>
		</div>
	</div>
</li>
