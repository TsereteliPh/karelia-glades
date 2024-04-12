<section class="resort-map">
	<div class="container--large">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'resort-map__title',
			'title' => get_sub_field('title')
		) ); ?>

		<?php
			$maps = get_sub_field( 'maps' );
			if ( $maps ) :
				?>

				<div class="resort-map__content">
					<div class="resort-map__tabs-wrapper">
						<div class="resort-map__label">Укажите тип объекта</div>

						<ul class="reset-list resort-map__tabs js-tabs">
							<?php foreach ( $maps as $key => $item ) : ?>
								<li class="resort-map__tab<?php echo ( $key == 0 ) ? ' active' : ''; ?>" data-tab="resort-map-<?php echo $key + 1; ?>"><?php echo $item['type']; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div class="resort-map__holder">
						<?php foreach ( $maps as $key => $item ) : ?>
							<a href="<?php echo $item['img']['url']; ?>" id="resort-map-<?php echo $key + 1; ?>" class="resort-map__link<?php echo ( $key == 0 ) ? ' active' : ''; ?>" data-fancybox>
								<?php echo wp_get_attachment_image( $item['img']['id'] ? $item['img']['id'] : 17, 'full', false ); ?>
							</a>
						<?php endforeach; ?>
					</div>
				</div>

				<?php
			endif;
		?>
	</div>
</section>
