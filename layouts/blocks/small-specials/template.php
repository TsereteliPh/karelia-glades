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
							<div class="small-specials__item-box">
								<?php
									$thumb = get_the_post_thumbnail_url( $post, 'large' );

									if ( $thumb ) {
										the_post_thumbnail( 'large', array( 'class' => 'small-specials__item-img' ) );
									} else {
										echo wp_get_attachment_image( 17, 'large', false, array( 'class' => 'small-specials__item-img' ) );
									}
								?>

                                <?php if ( $special['link'] ) : ?>
									<a href="<?php echo $special['link']['url']; ?>" class="small-specials__item-link" target="<?php echo $special['link']['target']; ?>">
										<?php the_title(); ?>
									</a>
								<?php else : ?>
									<a class="small-specials__item-link">
										<?php the_title(); ?>
									</a>
								<?php endif; ?>

								<?php if ( $special['text'] ) : ?>
									<button class="small-specials__item-button" type="button" data-fancybox data-src="#special-modal-<?php echo $key; ?>">
										Подробнее
									</button>
								<?php endif; ?>
							</div>

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
