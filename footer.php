</main>

<?php $socials = get_field( 'socials', 'options' ); ?>
<footer class="footer">
	<div class="container footer__container">
		<div class="footer__content">
			<a href="<?php echo bloginfo( 'url' ); ?>" class="footer__logo">
				<svg width="85" height="127"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo"></use></svg>
			</a>

			<?php if ( $socials ) : ?>
				<div class="socials footer__socials">
					<?php foreach ( $socials as $item ) : ?>
						<a href="<?php echo $item['link']; ?>" class="socials__item">
							<svg width="13" height="13"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-<?php echo $item['social']; ?>"></use></svg>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php wp_nav_menu( array(
			'theme_location' => 'menu_footer',
			'container' => '',
			'menu_id' => 'menu-footer',
			'menu_class' => 'reset-list footer__menu'
		) ); ?>

		<div class="footer__contacts">
			<?php
				$contacts = get_field( 'footer_contacts', 'options' );
				$tel_callback = function ( $tel ) {
					return '<a href="tel:' . preg_replace( '/[^0-9,+]/', '',  $tel) . '">' . $tel . '</a>';
				}
			?>
			<div class="footer__contacts-title">Контакты:</div>

			<div class="footer__contacts-content">
				<?php if ( $contacts['admin'] ) : ?>
					<div class="footer__contacts-wrapper">
						Администратор курорта:

						<?php
							foreach ( $contacts['admin'] as $key => $contact ) {
								echo '<a href="tel:' . preg_replace( '/[^0-9,+]/', '',  $contact['tel']) . '">' . $contact['tel'] . '</a>';
								echo ( $key + 1 < count( $contacts['admin'] ) ) ? ', ' : '';
							}
						?>
					</div>
				<?php endif; ?>

				<?php if ( $contacts['departments'] ) : ?>
					<div class="footer__contacts-wrapper">
						Отдел продаж и маркетинга:

						<?php
							foreach ( $contacts['departments'] as $key => $department ) {
								echo '<a href="tel:' . preg_replace( '/[^0-9,+]/', '',  $department['tel']) . '">' . $department['tel'] . '</a>';
								echo ( $key + 1 < count( $contacts['departments'] ) ) ? ', ' : '';
							}
						?>
					</div>
				<?php endif; ?>

				<?php if ( $contacts['email'] ) : ?>
					<div class="footer__contacts-wrapper">
						Электронная почта:

						<?php
							foreach ( $contacts['email'] as $key => $email ) {
								echo '<a href="mailto:' . preg_replace( '/[^0-9,+]/', '',  $email['email']) . '">' . $email['email'] . '</a>';
								echo ( $key + 1 < count( $contacts['email'] ) ) ? ', ' : '';
							}
						?>
					</div>
				<?php endif; ?>

				<?php if ( $contacts['address'] ) : ?>
					<address class="footer__contacts-wrapper">
						Адрес: <?php echo $contacts['address']; ?>
					</address>
				<?php endif; ?>
			</div>
		</div>

		<div class="footer__links">
			<a href="#<?php //todo: requisites ?>" class="footer__requisites">Наши реквизиты</a>

			<a href="<?php echo get_privacy_policy_url(); ?>" class="footer__policy">Политика конфиденциальности</a>

			<div class="footer__copyright">Copyright <?php echo date( 'Y' ); ?> Белая дача</div>
		</div>
	</div>
</footer>

<?php get_template_part('layouts/partials/modals'); ?>

<?php wp_footer(); ?>

</body>
</html>
