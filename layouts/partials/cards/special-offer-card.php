<li class="special-offer-card <?php echo $args['class']; ?>">
	<div class="special-offer-card__img">
		<?php
			if ( get_the_post_thumbnail_url() ) {
				the_post_thumbnail( 'large' );
			} else {
				echo wp_get_attachment_image( 17, 'large', false );
			}
		?>
	</div>

	<div class="special-offer-card__content">
		<div class="special-offer-card__title"><?php the_title(); ?></div>

		<?php if ( get_the_excerpt() ) : ?>
			<div class="special-offer-card__excerpt"><?php the_excerpt(); ?></div>
		<?php endif; ?>

		<?php if ( get_field( 'add_link' ) ) : ?>
			<a href="<?php the_permalink(); ?>" class="btn-light special-offer-card__button">Узнать больше</a>
		<?php endif; ?>
	</div>
</li>
