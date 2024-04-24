<section class="partners">
	<div class="container--large">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'partners__title',
			'title' => get_sub_field('title')
		) ); ?>

		<?php
			$partners = get_sub_field( 'partners' );
			if ( $partners ) :
				?>

				<ul class="reset-list partners__list">
					<?php foreach ( $partners as $partner ) : ?>
						<li class="partners__item">
							<a <?php echo $partner['link'] ? 'href="' . $partner['link'] . '"' : ''; ?> class="partners__link">
								<?php echo wp_get_attachment_image( $partner['logo'], 'medium', false ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php
			endif;
		?>
	</div>
</section>
