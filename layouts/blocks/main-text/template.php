<section class="main-text">
	<div class="container">
		<?php
			$type = get_sub_field( 'type' );
			$position = get_sub_field( 'position' );
			$titleClass = '';
			if ( ! ( $type == 'numeric' ) ) $titleClass = 'title--' . $type;

			get_template_part( '/layouts/partials/title', null, array(
				'class' => $titleClass . ' main-text__title',
				'title' => get_sub_field('title')
			) );
		?>

		<?php if ( get_sub_field( 'text' ) ) : ?>
			<div class="main-text__content"><?php the_sub_field( 'text' ); ?></div>
		<?php endif; ?>
	</div>
</section>
