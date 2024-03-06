<section class="about">
	<div class="container about__container">
		<div class="about__content">
			<?php get_template_part( '/layouts/partials/title', null, array(
				'class' => 'about__title',
				'title' => get_sub_field('title')
			) ); ?>

			<?php if ( get_sub_field( 'text' ) ) : ?>
				<div class="about__text"><?php the_sub_field( 'text' ); ?></div>
			<?php endif; ?>

			<?php
				$advantages = get_sub_field( 'advantages' );
				if ( $advantages ) :
					?>
						<div class="about__advantages">
							<div class="about__advantages-title">Преимущества расположения</div>

							<ul class="reset-list about__advantages-list">
								<?php foreach ( $advantages as $advantage ) : ?>
									<li class="about__advantages-item">
										<?php
											echo wp_get_attachment_image( $advantage['icon'], 'medium', false, array(
												'class' => 'about__advantages-img',
											) );
										?>

										<div class="about__advantages-text"><?php echo $advantage['text']; ?></div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php
				endif;
			?>
		</div>
	</div>

	<?php
		$images = get_sub_field( 'slider' );
		if ( $images ) :
			?>
				<div class="about__slider swiper">
					<div class="swiper-wrapper">
						<?php foreach ( $images as $img ) : ?>
							<div class="about__slider-item swiper-slide">
								<?php echo wp_get_attachment_image( $img['img'], 'large', false ); ?>
							</div>
						<?php endforeach; ?>
					</div>

					<div class="pagination about__slider-pagination"></div>
				</div>
			<?php
		endif;
	?>
</section>
