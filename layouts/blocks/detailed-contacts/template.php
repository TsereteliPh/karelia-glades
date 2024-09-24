<?php
	$phones = get_sub_field( 'phones' );
	$mails = get_sub_field( 'mails' );
	$whatsapp = get_sub_field( 'whatsapp' );
	$telegram = get_sub_field( 'telegram' );
?>
<section id="detailed-contacts" class="detailed-contacts">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'title--default detailed-contacts__title',
			'title' => get_sub_field('title')
		) ); ?>

		<div class="detailed-contacts__wrapper">
			<div class="detailed-contacts__box detailed-contacts__box--geo">
				<div class="detailed-contacts__icon">
					<svg width="15" height="15"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-geo"></use></svg>
				</div>

				<div class="detailed-contacts__content"><?php the_sub_field( 'geo' ); ?></div>
			</div>

			<div class="detailed-contacts__box detailed-contacts__box--phones">
				<div class="detailed-contacts__icon">
					<svg width="15" height="15"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-phone--filled"></use></svg>
				</div>

				<div class="detailed-contacts__content">
					<?php foreach ( $phones as $phone ) : ?>
						<div class="detailed-contacts__content-box">
							<a href="tel:<?php echo preg_replace( '/[^0-9,+]/', '', $phone['tel'] ); ?>" class="detailed-contacts__link"><?php echo $phone['tel']; ?></a>

							<?php echo $phone['desc']; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="detailed-contacts__box detailed-contacts__box--whatsapp">
				<div class="detailed-contacts__icon">
					<svg width="15" height="15"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-whatsapp"></use></svg>
				</div>

				<div class="detailed-contacts__content detailed-contacts__content--row">
					WhatsApp:

					<a href="<?php echo $whatsapp['url']; ?>" class="detailed-contacts__link" target="<?php echo $whatsapp['target']; ?>"><?php echo $whatsapp['title']; ?></a>
				</div>
			</div>

			<div class="detailed-contacts__box detailed-contacts__box--telegram">
				<div class="detailed-contacts__icon">
					<svg width="15" height="15"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-tg"></use></svg>
				</div>

				<div class="detailed-contacts__content detailed-contacts__content--row">
					Telegram:

					<a href="<?php echo $telegram['url']; ?>" class="detailed-contacts__link" target="<?php echo $telegram['target']; ?>"><?php echo $telegram['title']; ?></a>
				</div>
			</div>

			<div class="detailed-contacts__box detailed-contacts__box--mails">
				<div class="detailed-contacts__icon">
					<svg width="15" height="15"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-mail"></use></svg>
				</div>

				<div class="detailed-contacts__content">
					<?php foreach ( $mails as $mail ) : ?>
						<div class="detailed-contacts__content-box">
							<a href="mailto:<?php echo $mail['mail']; ?>" class="detailed-contacts__link"><?php echo $mail['mail']; ?></a>

							<?php echo $mail['desc']; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="detailed-contacts__box detailed-contacts__box--text">
				<div class="detailed-contacts__icon">
					<svg width="15" height="15"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-binder"></use></svg>
				</div>

				<div class="detailed-contacts__content">
					<?php the_sub_field( 'text' ); ?>

					<a href="<?php echo bloginfo( 'url' ); ?>" class="btn detailed-contacts__home">Забронировать</a>
				</div>
			</div>
		</div>
	</div>
</section>
