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

					<nav class="useful-links__links">
						<?php foreach ( $links as $item ) : ?>
							<?php
								$link = $item['link'];
								$bg = $item['bg'];
							?>

							<a href="<?php echo $link['url']; ?>" class="useful-links__link" target="<?php echo $link['target']; ?>"<?php echo $bg ? ' style="background-image: url(' . $bg . ');"' : ''; ?>>
								<div class="useful-links__label"><?php echo $link['title']; ?></div>

								<?php if ( $item['text'] ) : ?>
									<div class="useful-links__text"><?php echo $item['text']; ?></div>
								<?php endif; ?>
							</a>
						<?php endforeach; ?>
					</nav>
				</div>
			</section>
		<?php
	endif;
?>
