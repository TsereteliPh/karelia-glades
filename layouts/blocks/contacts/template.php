<section id="contacts" class="contacts no-breadcrumbs-indent">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'title--default contacts__title',
			'title' => get_sub_field('title')
		) ); ?>

		<?php
			$contacts = get_sub_field( 'contacts' );
			if ( $contacts ) :
				?>

				<ul class="reset-list contacts__list js-accordion">
					<?php foreach ( $contacts as $contact ) : ?>
						<li class="contacts__item">
							<button class="contacts__button">
								<?php echo $contact['city']; ?>

								<div class="contacts__arrow">
									<span></span>
								</div>
							</button>

							<div class="contacts__content<?php echo $contact['img'] ? '' : ' contacts__content--no-img'; ?>">
								<div class="contacts__info">
									<?php if ( $contact['address'] ) : ?>
										<div class="contacts__row">
											<span>Адрес</span>

											<address class="contacts__text"><?php echo $contact['address']; ?></address>
										</div>
									<?php endif; ?>

									<?php if ( $contact['tel'] ) : ?>
										<div class="contacts__row">
											<span>Телефон</span>

											<a href="tel:<?php echo preg_replace( '/[^0-9,+]/', '', $contact['tel'] ); ?>" class="contacts__text"><?php echo $contact['tel']; ?></a>
										</div>
									<?php endif; ?>

									<?php if ( $contact['email'] ) : ?>
										<div class="contacts__row">
											<span>E - mail</span>

											<a href="mailto:<?php echo $contact['email']; ?>" class="contacts__text"><?php echo $contact['email']; ?></a>
										</div>
									<?php endif; ?>

									<?php if ( $contact['requisites'] ) : ?>
										<div class="contacts__row">
											<span>Реквизиты</span>

											<div class="contacts__text"><?php echo $contact['requisites']; ?></div>
										</div>
									<?php endif; ?>
								</div>

								<?php if ( $contact['img'] ) : ?>
									<div class="contacts__img-wrapper">
										<div class="contacts__img">
											<?php echo wp_get_attachment_image( $contact['img'], 'large', false ); ?>
										</div>
									</div>
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
