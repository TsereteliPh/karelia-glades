<?php
	$slider = get_sub_field( 'slider' );
	if ( $slider ) :
		?>

		<section id="activity-slider" class="activity-slider">
			<div class="container activity-slider__container">
				<?php get_template_part( '/layouts/partials/title', null, array(
					'class' => 'activity-slider__title',
					'title' => get_sub_field('title')
				) ); ?>

				<div class="activity-slider__slider swiper">
					<ul class="reset-list activity-slider__list swiper-wrapper">
						<?php foreach ( $slider as $activity ) : ?>
							<li class="activity-slider__item swiper-slide">
								<div class="activity-slider__item-img">
									<?php echo wp_get_attachment_image( $activity['img'] ? $activity['img'] : 17, 'full', false ); ?>
								</div>

								<div class="activity-slider__item-content">
									<svg class="activity-slider__item-logo" width="170" height="230"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo--frame"></use></svg>

									<?php if ( $activity['title'] ) : ?>
										<div class="activity-slider__item-title"><?php echo $activity['title']; ?></div>
									<?php endif; ?>

									<?php if ( $activity['text'] ) : ?>
										<div class="activity-slider__item-text"><?php echo $activity['text']; ?></div>
									<?php endif; ?>

									<?php if ( $activity['link'] ) : ?>
										<a href="<?php echo $activity['link']['url']; ?>" class="activity-slider__item-link" target="<?php echo $activity['link']['target']; ?>"><?php echo $activity['link']['title']; ?></a>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>

					<div class="pagination activity-slider__pagination"></div>
				</div>
			</div>

			<div class="activity-slider__controls">
				<div class="btn-prev activity-slider__prev">
					<svg width="55" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
				</div>

				<div class="btn-next activity-slider__next">
					<svg width="55" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
				</div>
			</div>
		</section>

		<?php
	endif;
?>


