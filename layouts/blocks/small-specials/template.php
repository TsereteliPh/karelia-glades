<section class="small-specials">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'small-specials__title',
			'title' => get_sub_field('title')
		) ); ?>

		<?php
			$specials = get_sub_field( 'specials' );
			if ( $specials ) :
				?>

				<ul class="reset-list small-specials__list">
					<?php foreach ( $specials as $key => $special ) : ?>
						<?php
							$post = $special['special'];
							setup_postdata( $post );
						?>

						<li class="small-specials__item">
							<button
								class="small-specials__item-button"
								type="button"
								<?php echo $special['text'] ? 'data-fancybox data-src="#special-modal-' . $key .'"' : ''; ?>
							>
								<?php
									$thumb = get_the_post_thumbnail_url( $post, 'large' );

									if ( $thumb ) {
										the_post_thumbnail( 'large', array( 'class' => 'small-specials__item-img' ) );
									} else {
										echo wp_get_attachment_image( 17, 'large', false, array( 'class' => 'small-specials__item-img' ) );
									}
								?>

								<div class="small-specials__item-title"><?php the_title(); ?></div>

								<?php if ( $special['text'] ) : ?>
									<div class="small-specials__item-more">Подробнее</div>
								<?php endif; ?>
							</button>

							<?php if ( $special['text'] ) : ?>
								<div
									id="special-modal-<?php echo $key; ?>"
									class="modal small-specials__modal"
									style="background-image: url(<?php echo $thumb ? $thumb : ''; ?>);"
								>
									<div class="small-specials__modal-label"><?php the_title(); ?></div>

									<div class="small-specials__modal-text"><?php echo $special['text']; ?></div>

									<a href="<?php echo bloginfo( 'url' ); ?>" class="small-specials__modal-link">Найти виллу</a>
								</div>
							<?php endif; ?>
						</li>

					<?php
						endforeach;
						wp_reset_postdata();
					?>
				</ul>

				<?php
			endif;
		?>
	</div>
</section>
