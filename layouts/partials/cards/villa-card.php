<li class="villa-card <?php echo $args['class']; ?>">
	<div class="villa-card__thumb-wrapper">
		<div class="villa-card__thumb">
			<?php
				if ( get_the_post_thumbnail_url() ) {
					the_post_thumbnail( 'full' );
				} else {
					echo wp_get_attachment_image( 17, 'full', false );
				}
			?>
		</div>
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

			<a href="#book" class="villa-card__book">Забронировать</a>
		</div>
	</div>
</li>
