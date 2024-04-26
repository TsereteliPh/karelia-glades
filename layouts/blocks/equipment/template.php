<section class="equipment">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'title--ellipse equipment__title',
			'title' => get_sub_field('title')
		) ); ?>

		<?php
			$equipment = get_sub_field( 'equipment' );
			if ( $equipment ) :
				?>

				<ul class="reset-list equipment__list">
					<?php foreach ( $equipment as $item ) : ?>
						<li class="equipment__item">
							<?php
								echo wp_get_attachment_image( $item['icon'] ? $item['icon'] : 17, 'meduim', false, array(
									'class' => 'equipment__icon'
								) );
							?>

							<div class="equipment__text"><?php echo $item['text']; ?></div>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php
			endif;
		?>
	</div>
</section>
