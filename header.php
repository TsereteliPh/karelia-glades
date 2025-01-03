<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.svg" type="image/x-icon" width="16" height="16">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
	$tel = get_field( 'tel', 'options' );
	$address = get_field( 'address', 'options' );
	$socials = get_field( 'socials', 'options' );
	$map_link = get_field( 'map_link', 'options' );
?>

<header class="header<?php echo is_front_page() ? ' header--index' : ''; ?>">
	<div class="container--large header__container">
		<div class="header__panel">
			<a href="<?php echo bloginfo( 'url' ); ?>" class="header__logo" aria-label="Логотип компании Поляны Карелия">
				<svg width="85" height="127"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo"></use></svg>
			</a>

			<?php wp_nav_menu( array(
				'theme_location' => 'menu_main',
				'container' => '',
				'menu_id' => 'extra-menu',
				'menu_class' => 'reset-list header__extra-menu'
			) ); ?>

			<button class="btn header__book" type="button">Забронировать</button>

			<div class="header__link">
				Мы находимся
				<a href="<?php echo $map_link; ?>" target="_blank">тут 71 км от СПБ</a>
			</div>

			<div class="header__reputation" id='tl-reputation-widget'></div>

			<?php if ( $tel ) : ?>
				<a href="tel:<?php echo preg_replace( '/[^0-9,+]/', '', $tel ); ?>" class="header__tel">
					<svg width="22" height="27"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-phone"></use></svg>
					<?php echo $tel; ?>
				</a>
			<?php endif; ?>

			<?php if ( $socials ) : ?>
				<div class="socials socials--large header__panel-socials">
					<?php foreach ( $socials as $item ) : ?>
						<a href="<?php echo $item['link']; ?>" class="socials__item">
							<svg width="25" height="25"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-<?php echo $item['social']; ?>"></use></svg>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="header__controls">
				<a href="<?php echo $map_link; ?>" class="header__route" aria-label="Открыть карту">
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
			<?php wp_nav_menu( array(
				'theme_location' => 'menu_main',
				'container' => '',
				'menu_id' => 'menu-main',
				'menu_class' => 'reset-list header__menu'
			) ); ?>

			<?php if ( $socials ) : ?>
				<div class="socials header__socials">
					<?php foreach ( $socials as $item ) : ?>
						<a href="<?php echo $item['link']; ?>" class="socials__item">
							<svg width="20" height="20"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-<?php echo $item['social']; ?>"></use></svg>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</header>

<?php if( ! is_front_page() && function_exists( 'yoast_breadcrumb' ) ) : ?>
	<div class="breadcrumb">
		<div class="container">
			<?php echo yoast_breadcrumb(); ?>
		</div>
	</div>
<?php endif ?>

<aside class="sidebar">
	<a href="<?php echo bloginfo( 'url' ); ?>" class="sidebar__logo" aria-label="Логотип компании Поляны Карелия">
		<svg width="100" height="140"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo"></use></svg>
	</a>

	<div class="sidebar__content">
		<?php wp_nav_menu( array(
			'theme_location' => 'menu_main',
			'container' => '',
			'menu_id' => 'menu-main',
			'menu_class' => 'reset-list sidebar__menu'
		) ); ?>

		<?php if ( $socials ) : ?>
			<div class="socials sidebar__socials">
				<?php foreach ( $socials as $item ) : ?>
					<a href="<?php echo $item['link']; ?>" class="socials__item">
						<svg width="13" height="13"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-<?php echo $item['social']; ?>"></use></svg>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</aside>

<main class="main<?php echo is_front_page() ? '' : ' main--indent'; ?>">
	<?php if ( is_front_page() ) get_template_part( 'layouts/partials/welcome' ); ?>
