<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
	$tel = get_field( 'tel', 'options' );
	$address = get_field( 'address', 'options' );
	$socials = get_field( 'socials', 'options' );
?>

<header class="header">
	<div class="header__panel">
		<a href="<?php echo bloginfo( 'url' ); ?>" class="header__logo" aria-label="Логотип компании Поляны Карелия">
			<svg width="68" height="97"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo"></use></svg>
		</a>

		<div class="header__controls">
			<a href="<?php //todo: map link ?>" class="header__route" aria-label="Открыть карту">
				<svg width="31" height="30"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-route"></use></svg>
			</a>

			<?php if ( $tel ) : ?>
				<a href="tel:<?php echo preg_replace( '/[^0-9,+]/', '', $tel ); ?>" class="header__phone" aria-label="Позвонить по номеру <?php echo preg_replace( '/[^0-9,+]/', '', $tel ); ?>">
					<svg width="22" height="27"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-phone"></use></svg>
				</a>
			<?php endif; ?>

			<button class="header__burger" type="button">
				<span></span>
			</button>
		</div>
	</div>

	<div class="header__content">
		<?php wp_nav_menu(array(
			'theme_location' => 'menu_main',
			'container' => '',
			'menu_id' => 'menu-main',
			'menu_class' => 'reset-list header__menu'
		)); ?>

		<address class="header__address">
			<?php if ( $address['city'] ) : ?>
				<span><?php echo $address['city']; ?></span>
			<?php endif; ?>

			<?php if ( $address['address'] ) echo $address['address']; ?>
		</address>

		<?php if ( $socials ) : ?>
			<div class="socials header__socials">
				<?php foreach ( $socials as $item ) : ?>
					<a href="<?php echo $item['link']; ?>" class="socials__item">
						<svg width="13" height="13"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-<?php echo $item['social']; ?>"></use></svg>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</header>

<main class="main">
	<section>
		<div class="test container">

		</div>
	</section>
