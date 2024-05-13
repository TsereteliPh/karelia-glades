<?php
	$blocks = get_field( 'blocks', get_the_ID() );
	foreach ( $blocks as $key => $block ) {
		if ( $block['acf_fc_layout'] !== 'contents' ) {
			unset( $blocks[$key] );
		} else {
			break;
		}
	}

	array_shift( $blocks );

	if ( $blocks ) :
		?>

		<section id="contents" class="contents">
			<div class="container contents__container">
				<nav class="contents__nav">
					<?php foreach ( $blocks as $block ) : ?>
						<a href="<?php echo '#' . $block['acf_fc_layout']; ?>" class="contents__link">
							<?php echo $block['title']['text'] ? $block['title']['text'] : adem_block_name( $block['acf_fc_layout'] ); ?>
						</a>
					<?php endforeach; ?>
				</nav>
			</div>

			<?php if ( get_sub_field( 'img' ) ) : ?>
				<div class="contents__img">
					<?php echo wp_get_attachment_image( get_sub_field( 'img' ), 'full', false ); ?>
				</div>
			<?php endif; ?>
		</section>

		<?php
	endif;
?>
