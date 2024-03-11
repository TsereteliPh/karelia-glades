<section class="advantages">
	<div class="container advantages__container">
		<div class="advantages__info">
			<?php get_template_part( '/layouts/partials/title', null, array(
				'class' => 'advantages__title',
				'title' => get_sub_field('title')
			) ); ?>

			<?php if ( get_sub_field( 'text' ) ) : ?>
				<div class="advantages__text"><?php the_sub_field( 'text' ); ?></div>
			<?php endif; ?>
		</div>

		<div class="advantages__content">
			<?php
				$advantages = get_sub_field( 'advantages' );
				if ( $advantages ) :
					?>
						<svg class="advantages__arrow" width="66" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>

						<ul class="reset-list advantages__list">
							<?php foreach ( $advantages as $advantage ) : ?>
								<li class="advantages__item">
									<?php
										echo wp_get_attachment_image( $advantage['icon'], 'medium', false, array(
											'class' => 'advantages__icon'
										) );
									?>

									<div class="advantages__advantage"><?php echo $advantage['text']; ?></div>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php
				endif;
			?>
		</div>
	</div>

	<?php
		$slider = get_sub_field( 'slider' );
		if ( $slider ) :
			?>
				<div class="advantages__slider swiper">
					<div class="swiper-wrapper">
						<?php foreach ( $slider as $img ) : ?>
							<div class="advantages__slider-item swiper-slide">
								<?php echo wp_get_attachment_image( $img['img'], 'large', false ); ?>
							</div>
						<?php endforeach; ?>
					</div>

					<div class="pagination advantages__slider-pagination"></div>
				</div>
			<?php
		endif;
	?>
</section>
