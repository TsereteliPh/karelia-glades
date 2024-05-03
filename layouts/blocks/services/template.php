<section class="services no-breadcrumbs-indent">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'title--ellipse services__title',
			'title' => get_sub_field('title')
		) ); ?>

		<?php
			$services = get_sub_field( 'services' );
			if ( $services ) :
				?>

				<ul class="reset-list services__list">
					<?php foreach ( $services as $item ) : ?>
						<?php
							$post = $item['service'];
							setup_postdata( $post );
						?>

						<li class="services__item">
							<div class="services__item-bg-thumb">
								<?php
									if ( get_the_post_thumbnail_url() ) {
										the_post_thumbnail( 'meduim' );
									} else {
										echo wp_get_attachment_image( 17, 'meduim', false );
									}
								?>
							</div>

							<div class="services__item-content">
								<?php
									$video = $item['video'];
									if ( $video['link'] || $video['file'] ) :
										?>

										<a href="<?php echo $video[$video['type']]; ?>" class="services__item-video" data-fancybox>
											<svg width="22" height="25"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-play"></use></svg>
										</a>

										<?php
									endif;
								?>

								<div class="services__item-label"><?php the_title(); ?></div>

								<?php if ( get_the_excerpt() ) : ?>
									<div class="services__item-excerpt"><?php the_excerpt(); ?></div>
								<?php endif; ?>

								<div class="services__item-thumb">
									<?php
										if ( get_the_post_thumbnail_url() ) {
											the_post_thumbnail( 'meduim' );
										} else {
											echo wp_get_attachment_image( 17, 'meduim', false );
										}
									?>
								</div>

								<?php if ( $item['desc'] ) : ?>
									<div class="services__item-dropdown">
										<div class="services__item-desc"><?php echo $item['desc']; ?></div>

										<a href="<?php the_permalink(); ?>" class="services__item-link">Узнать больше</a>
									</div>

									<button class="services__item-more" type="button">
										<span class="services__item-more-text">Развернуть</span>
										<span class="services__item-more-arrow"></span>
									</button>
								<?php else : ?>
									<a href="<?php the_permalink(); ?>" class="services__item-link">Узнать больше</a>
								<?php endif; ?>
							</div>
						</li>

					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</ul>

				<?php
			endif;
		?>
	</div>
</section>
