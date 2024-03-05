</main>

<?php
	$text = get_field( 'footer', 'options' );
	$socials = get_field( 'socials', 'options' );
?>
<footer class="footer">
	<div class="container footer__container">
		<div class="footer__content">
			<a href="<?php echo bloginfo( 'url' ); ?>" class="footer__logo">
				<svg width="55" height="29"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo-secondary--text"></use></svg>
			</a>

			<?php if ( $text ) : ?>
				<div class="footer__text"><?php echo $text; ?></div>
			<?php endif; ?>

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
