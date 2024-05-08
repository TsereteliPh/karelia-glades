<section class="special-offers-slider">
	<div class="container special-offers-slider__container swiper">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'title--ellipse special-offers-slider__title',
			'title' => get_sub_field('title')
		) ); ?>

		<?php
			$slider = get_sub_field( 'slider' );
			if ( $slider ) :
				?>

				<ul class="reset-list special-offers-slider__list swiper-wrapper">
					<?php
						foreach ( $slider as $post ) {
							setup_postdata( $post );

							get_template_part('/layouts/partials/cards/special-offer-card', null, array(
								'class' => 'special-offers-slider__item swiper-slide',
							) );
						}

						wp_reset_postdata();
					?>
				</ul>

				<?php
			endif;
		?>
	</div>

	<div class="pagination special-offers-slider__pagination"></div>
</section>
