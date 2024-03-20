<section class="faq">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'faq__title',
			'title' => get_sub_field('title')
		) ); ?>

		<?php
			$faq = get_sub_field( 'faq' );
			if ( $faq ) :
				?>
					<ul class="reset-list faq__list">
						<?php foreach ( $faq as $item ) : ?>
							<li class="faq__item">
								<button class="faq__button">
									<?php echo $item['question']; ?>

									<span></span>
								</button>

								<div class="faq__answer">
									<div class="faq__text<?php echo $item['img'] ? '' : ' faq__text--full'; ?>"><?php echo $item['answer']; ?></div>

									<?php if ( $item['img'] ) : ?>
										<div class="faq__img"><?php echo wp_get_attachment_image( $item['img'], 'medium', false ); ?></div>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php
			endif;
		?>
	</div>
</section>
