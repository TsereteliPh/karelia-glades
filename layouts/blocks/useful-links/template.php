<?php
	$bg = get_sub_field( 'bg' );
	$links = get_sub_field( 'links' );

	if ( $links ) :
		?>
			<section id="useful-links" class="useful-links"<?php echo $bg ? ' style="background-image: url(' . $bg . ');"' : ''; ?>>
				<div class="container useful-links__container">
					<?php get_template_part( '/layouts/partials/title', null, array(
						'class' => 'useful-links__title',
						'title' => get_sub_field('title')
					) ); ?>

					<div class="useful-links__links">
						<?php foreach ( $links as $key => $item ) : ?>
							<button
								class="useful-links__link"
								type="button"
								<?php echo $item['desc'] ? 'data-fancybox data-src="#useful-link-' . $key . '"' : ''; ?>
								<?php echo $item['bg'] ? ' style="background-image: url(' . $item['bg'] . ');"' : ''; ?>
							>
								<div class="useful-links__label"><?php echo $item['label']; ?></div>

								<?php if ( $item['small_desc'] ) : ?>
									<div class="useful-links__small-desc"><?php echo $item['small_desc']; ?></div>
								<?php endif; ?>
							</button>

							<?php if ( $item['desc'] ) : ?>
								<div id="useful-link-<?php echo $key; ?>" class="modal useful-links__desc">
									<?php echo $item['desc']; ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php
	endif;
?>
