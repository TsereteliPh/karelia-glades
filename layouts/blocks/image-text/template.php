<section id="image-text" class="image-text">
	<div class="container image-text__container">
		<svg class="image-text__logo" width="310" height="400"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo--frame"></use></svg>

		<?php
			$img = get_sub_field( 'img' );
			if ( $img ) :
				?>
					<div class="image-text__img"><?php echo wp_get_attachment_image( $img, 'full', false ); ?></div>
				<?php
			endif;
		?>

		<svg class="image-text__arrow" width="66" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>

		<div class="image-text__wrapper">
			<?php get_template_part( '/layouts/partials/title', null, array(
				'class' => 'image-text__title',
				'title' => get_sub_field('title')
			) ); ?>

			<?php
				$icon_text = get_sub_field( 'icon-text' );
				if ( $icon_text ) :
					?>
						<div class="image-text__icon-text">
							<?php
								echo wp_get_attachment_image( $icon_text['icon'], 'medium', false, array(
									'class' => 'image-text__icon'
								) );
							?>

							<div class="image-text__text"><?php echo $icon_text['text']; ?></div>
						</div>
					<?php
				endif;
			?>

			<?php if ( get_sub_field( 'text' ) ) : ?>
				<div class="image-text__content"><?php the_sub_field( 'text' ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</section>
