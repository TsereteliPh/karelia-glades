<?php
	$content = get_sub_field( 'content' );
	$media = get_sub_field( 'media' );
?>

<section id="universal-block" class="universal-block">
	<div class="container universal-block__container">
		<div class="universal-block__content">
			<?php
				$title = get_sub_field( 'title' );

				get_template_part( '/layouts/partials/title', null, array(
					'class' => ( $title['numbering'] ? '' : 'title--default' ) . ' universal-block__title',
					'title' => $title
				) );
			?>

			<?php if ( $content === 'text' ) : ?>
				<div class="universal-block__text"><?php echo get_sub_field( 'text' ); ?></div>
			<?php else : ?>
				<?php
					$advantages_text = get_sub_field( 'advantages_text' );
					$advantages = get_sub_field( 'advantages' );
				?>

				<?php if ( $advantages_text ) : ?>
					<div class="universal-block__text"><?php echo $advantages_text; ?></div>
				<?php endif; ?>

				<?php if ( $advantages ) : ?>
					<div class="universal-block__advantages">
						<div class="universal-block__advantages-title">Преимущества расположения</div>

						<ul class="reset-list universal-block__advantages-list">
							<?php foreach ( $advantages as $advantage ) : ?>
								<li class="universal-block__advantages-item">
									<?php
										echo wp_get_attachment_image( $advantage['icon'], 'medium', false, array(
											'class' => 'universal-block__advantages-img',
										) );
									?>

									<div class="universal-block__advantages-small-text"><?php echo $advantage['text']; ?></div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>

	<?php if ( $media === 'image' ) : ?>
		<?php
			$gallery = get_sub_field( 'gallery' );
			if ( $gallery ) :
				?>
					<div class="universal-block__media universal-block__slider">
						<div class="swiper-wrapper">
							<?php foreach ( $gallery as $img ) : ?>
								<div class="universal-block__slider-item swiper-slide">
									<?php echo wp_get_attachment_image( $img['id'], 'full', false ); ?>
								</div>
							<?php endforeach; ?>
						</div>

						<div class="pagination universal-block__pagination"></div>
					</div>
				<?php
			endif;
		?>
	<?php else : ?>
		<div class="universal-block__media universal-block__video">
			<?php $video = get_sub_field( 'video' ); ?>

			<a href="<?php echo $video[$video['type']]; ?>" class="universal-block__video-link" data-fancybox="#universal-block-video">
				<?php echo wp_get_attachment_image( $video['preview'] ? $video['preview'] : 17, 'full', false ); ?>

				<button class="btn-play universal-block__video-btn" type="button">
					<svg width="22" height="25"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-play"></use></svg>
				</button>
			</a>
		</div>
	<?php endif; ?>
</section>
