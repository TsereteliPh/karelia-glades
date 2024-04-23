<section class="intro-section <?php echo 'intro-section--' . get_sub_field( 'background' ); ?>">
	<?php
		$title = get_sub_field( 'title' );
		$text = get_sub_field( 'text' );
		if ( $title['text'] || $text ) :
			?>
			<div class="container">
				<div class="intro-section__head<?php echo $text ? ' intro-section__head--grid' : ''; ?>">
					<?php
						if ( $title ) {
							echo sprintf( '<%1$s class="intro-section__title">%2$s</%1$s>',
								$title['type'],
								$title['text']
							);
						}
					?>

					<?php if ( $text ) : ?>
						<div class="intro-section__head-text"><?php echo $text; ?></div>
					<?php endif; ?>
				</div>
			</div>

			<?php
		endif;
	?>

	<?php
		$img = get_sub_field( 'img' );
		if ( $img ) {
			echo '<div class="intro-section__image">';
			echo wp_get_attachment_image( $img, 'full', false );
			echo '</div>';
		}
	?>

	<?php
		$logo_text = get_sub_field( 'logo-text' );
		if ( $logo_text['text'] ) :
			?>

			<div class="container">
				<div class="intro-section__logo-text <?php echo 'intro-section__logo-text--' . $logo_text['logo']; ?>">
					<?php echo $logo_text['logo'] === 'no-logo' ? '' : '<svg width="310" height="400"><use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite.svg#icon-logo--frame"></use></svg>'; ?>

					<div class="intro-section__text"><?php echo $logo_text['text']; ?></div>
				</div>
			</div>

			<?php
		endif;
	?>
</section>
