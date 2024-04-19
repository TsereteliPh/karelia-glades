<?php $gallery = get_sub_field( 'gallery' ); ?>
<section class="gallery">
	<div class="container--large">
		<div class="gallery__wrapper">
			<div class="gallery__logo-wrapper">
				<div class="gallery__legend">
					Смотрите фото<br>
					с наших мероприятий
				</div>

				<svg class="gallery__logo" width="310" height="400"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo--frame"></use></svg>
			</div>

			<div class="gallery__text-wrapper">
				<?php get_template_part( '/layouts/partials/title', null, array(
					'class' => 'gallery__title',
					'title' => get_sub_field('title')
				) ); ?>

				<?php if ( $gallery ) : ?>
					<ul class="reset-list gallery__tabs js-tabs">
						<?php foreach ( $gallery as $key => $item ) : ?>
							<li class="gallery__tab<?php echo ( $key == 0 ) ? ' active' : ''; ?>" data-tab="gallery-<?php echo $key + 1 . '-' . $args['block_id']; ?>"><?php echo $item['label']; ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>

		<div class="gallery__holder">
			<?php foreach ( $gallery as $key => $item ) : ?>
				<div id="gallery-<?php echo $key + 1 . '-' . $args['block_id']; ?>" class="gallery__list<?php echo ( $key == 0 ) ? ' active' : ''; ?>">
					<?php foreach ( $item['gallery'] as $photo ) : ?>
						<a href="<?php echo $photo['url']; ?>" class="gallery__link" data-fancybox="gallery-<?php echo $key + 1 . '-' . $args['block_id']; ?>">
							<?php echo wp_get_attachment_image( $photo['id'], 'large', false ); ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
