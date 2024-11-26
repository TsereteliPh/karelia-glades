<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'adem_setup' ) ) {
	function adem_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support( 'editor-styles' );
		add_editor_style();

		register_nav_menus(
			array(
				'menu_main' => 'Основное меню',
				'menu_footer' => 'Меню футера',
			)
		);
	}

	//register taxonomies
	register_taxonomy( 'villa-category', [ 'villas' ], [
		'label'                 => '',
		'labels'                => [
			'name'              => 'Категории вилл',
			'singular_name'     => 'Категория виллы',
			'search_items'      => 'Найти категорию',
			'all_items'         => 'Все категории',
			'view_item '        => 'Посмотреть категорию',
			'edit_item'         => 'Редактировать категорию',
			'update_item'       => 'Обновить категорию',
			'add_new_item'      => 'Добавить новую категорию',
			'new_item_name'     => 'Новое название категории',
			'menu_name'         => 'Категории',
			'back_to_items'     => '← Вернуться к категориям',
		],
		'description'           => '',
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		'capabilities'          => [],
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'show_in_rest'          => null,
		'rest_base'             => null,
	] );

	// register post types
	register_post_type( 'villas', [
		'label' => null,
		'labels' => [
			'name' => 'Виллы',
			'singular_name' => 'Вилла',
			'add_new' => 'Добавить виллу',
			'add_new_item' => 'Добавить виллу',
			'edit_item' => 'Редактировать виллу',
			'new_item' => 'Новая вилла',
			'view_item' => 'Смотреть виллу',
			'search_items' => 'Найти виллу',
			'not_found' => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name' => 'Виллы',
		],
		'public' => true,
		'show_in_menu' => true,
		'menu_position' => 21,
		'menu_icon' => 'dashicons-admin-multisite',
		'supports' => ['title', 'editor', 'thumbnail'],
		'taxonomies' => ['services_type'],
		'has_archive' => false,
		'rewrite' => true,
		'query_var' => true,
		'publicly_queryable' => true
	] );

	register_post_type( 'services', [
		'label' => null,
		'labels' => [
			'name' => 'Услуги',
			'singular_name' => 'Услуга',
			'add_new' => 'Добавить услугу',
			'add_new_item' => 'Добавить услугу',
			'edit_item' => 'Редактировать услугу',
			'new_item' => 'Новая услуга',
			'view_item' => 'Смотреть услугу',
			'search_items' => 'Найти услугу',
			'not_found' => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name' => 'Услуги',
		],
		'public' => true,
		'show_in_menu' => true,
		'menu_position' => 22,
		'menu_icon' => 'dashicons-list-view',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'taxonomies' => ['services_type'],
		'has_archive' => false,
		'rewrite' => true,
		'query_var' => true,
		'publicly_queryable' => true
	] );

	register_post_type( 'special-offers', [
		'label' => null,
		'labels' => [
			'name' => 'Спецпредложения',
			'singular_name' => 'Спецпредложение',
			'add_new' => 'Добавить спецпредложение',
			'add_new_item' => 'Добавить спецпредложение',
			'edit_item' => 'Редактировать спецпредложение',
			'new_item' => 'Новое спецпредложение',
			'view_item' => 'Смотреть спецпредложение',
			'search_items' => 'Найти спецпредложение',
			'not_found' => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name' => 'Спецпредложения',
		],
		'public' => true,
		'show_in_menu' => true,
		'menu_position' => 22,
		'menu_icon' => 'dashicons-tickets-alt',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'taxonomies' => ['specials_type'],
		'has_archive' => false,
		'rewrite' => true,
		'query_var' => true,
		'publicly_queryable' => true
	] );
}

add_action( 'after_setup_theme', 'adem_setup' );

// Return classic widgets
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

add_action( 'wp_enqueue_scripts', 'adem_scripts' );
function adem_scripts() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/vendor/css/fancybox.css', array(), '4.0.31' );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/vendor/js/fancybox.umd.js', array(), '4.0.31', true );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/vendor/css/swiper-bundle.min.css', array(), '10.3.1' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/vendor/js/swiper-bundle.min.js', array(), '10.3.1', true );
	wp_enqueue_style( 'adem', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_script( 'adem', get_template_directory_uri() . '/assets/js/main.min.js', array(), _S_VERSION, true );
	wp_localize_script( 'adem', 'adem_ajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );
}

// disable scale images
add_filter( 'big_image_size_threshold', '__return_false' );

// remove prefix in archive title
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );

// excerpt
function adem_excerpt( $limit, $ID = null ) {
	return mb_substr( get_the_excerpt( $ID ), 0, $limit ) . '...';
}

// block name
function adem_block_name( $block ) {
	$block_names = [
		'activity-slider' => 'Слайдер активностей',
		'advantages' => 'Преимущества',
		'book' => 'Забронировать',
		'contacts' => 'Контакты',
		'equipment' => 'Оснащение номера',
		'faq' => 'Вопрос-ответ',
		'fullsize-slider' => 'Полноразмерный слайдер',
		'gallery-slider' => 'Галерея',
		'gallery' => 'Галерея',
		'image-slider' => 'Слайдер изображений',
		'image-text-slider' => 'Слайдер изображений',
		'image-text' => 'Информация',
		'intro-section' => 'Информация',
		'main-text' => 'Информация',
		'map' => 'Карта',
		'partners' => 'Партнеры',
		'resort-map' => 'Карта местности',
		'service-description' => 'Описание услуги',
		'service-schedule' => 'Расписание услуги',
		'services-slider' => 'Дополнительные услуги',
		'services' => 'Услуги',
		'special-offers-slider' => 'Спецпредложения',
		'special-offers' => 'Спецпредложения',
		'universal-block' => 'Информация',
		'useful-links' => 'Полезные ссылки',
		'villas-slider' => 'Виллы',
		'villas' => 'Виллы'
	];

	return $block_names[$block];
}

// Custom breadcrumbs yoast
add_filter( 'wpseo_breadcrumb_links', 'custom_breadcrumbs' );

function custom_breadcrumbs( $links ) {
	global $post;

	if ( is_singular( 'villas' ) ) {
		$breadcrumb[] = array(
			'url' => get_page_link( 429 ),
			'text' => 'Виллы',
		);

		array_splice( $links, 1, -2, $breadcrumb );
	}

	if ( is_singular( 'services' ) ) {
		$breadcrumb[] = array(
			'url' => get_page_link( 484 ),
			'text' => 'Чем заняться',
		);

		array_splice( $links, 1, -2, $breadcrumb );
	}

	if ( is_singular( 'special-offers' ) ) {
		$breadcrumb[] = array(
			'url' => get_page_link( 383 ),
			'text' => 'Спецпредложения',
		);

		array_splice( $links, 1, -2, $breadcrumb );
	}

	return $links;
}

// Breadcrumbs indent
add_action('wp_footer', 'adem_breadcrumbs_indent');
function adem_breadcrumbs_indent() {
	?>
		<script>
			const breadcrumbs = document.querySelector('.breadcrumb');

			if (breadcrumbs) {
				const main = document.querySelector('.main');

				if (!main.firstElementChild.classList.contains('no-breadcrumbs-indent')) {
					let indent = 80;
					if (window.innerWidth < 1440) indent = 40;
					let mainIndent = parseInt(getComputedStyle(main).marginTop);

					main.style.marginTop = breadcrumbs.clientHeight + mainIndent + indent + 'px';
				}
			}
		</script>
	<?php
}

// Find book layout
function findBookLayout( $array ) {
    foreach ( $array as $item ) {
        if ( is_array( $item ) && isset( $item['acf_fc_layout'] ) && $item['acf_fc_layout'] === 'book' ) {
            return true;
        }
    }

    return false;
}

// TravelLine booking script
add_action('wp_head', 'adem_travelline_script');
function adem_travelline_script() {
	?>
	<link rel="stylesheet" href="/wp-content/themes/KG/travelline-style.css">
	<script type='text/javascript'>
		(function(w) {
			var q = [
				["setContext", "TL-INT-adem411-ru_2024-08-27", "ru"],
				["embed", "search-form", {
					container: "tl-search-form"
				}],
				["embed", "search-form", {
					container: "tl-search-form-mobile"
				}]
			];
			var h = ["ru-ibe.tlintegration.ru", "ibe.tlintegration.ru", "ibe.tlintegration.com"];
			var t = w.travelline = (w.travelline || {}),
				ti = t.integration = (t.integration || {});
			ti.__cq = ti.__cq? ti.__cq.concat(q) : q;
			if (!ti.__loader) {
				ti.__loader = true;
				var d=w.document,c=d.getElementsByTagName("head")[0]||d.getElementsByTagName("body")[0];
				function e(s,f) {return function() {w.TL||(c.removeChild(s),f())}}
				(function l(h) {
					if (0===h.length) return; var s=d.createElement("script");
					s.type="text/javascript";s.async=!0;s.src="https://"+h[0]+"/integration/loader.js";
					s.onerror=s.onload=e(s,function(){l(h.slice(1,h.length))});c.appendChild(s)
				})(h);
			}
		})(window);
	</script>
	<?php
}

// TravelLine reputation script
add_action('wp_head', 'adem_travelline_rating_script');
function adem_travelline_rating_script() {
	?>
	<script type='text/javascript'>
		(function(w) {
			var q = [
				['setContext', 'TL-INT-adem411-ru_2024-08-27', 'ru'],
				['embed', 'reputation-widget', {
					container: 'tl-reputation-widget'
				}]
			];
			var h=["ru-ibe.tlintegration.ru","ibe.tlintegration.ru","ibe.tlintegration.com"];
			var t = w.travelline = (w.travelline || {}),
				ti = t.integration = (t.integration || {});
			ti.__cq = ti.__cq ? ti.__cq.concat(q) : q;
			if (!ti.__loader) {
				ti.__loader = true;
				var d=w.document,c=d.getElementsByTagName("head")[0]||d.getElementsByTagName("body")[0];
				function e(s,f) {return function() {w.TL||(c.removeChild(s),f())}}
				(function l(h) {
					if (0===h.length) return; var s=d.createElement("script");
					s.type="text/javascript";s.async=!0;s.src="https://"+h[0]+"/integration/loader.js";
					s.onerror=s.onload=e(s,function(){l(h.slice(1,h.length))});c.appendChild(s)
				})(h);
			}
		})(window);
	</script>
	<?php
}

require 'inc/acf.php';
require 'inc/load-cat.php';
require 'inc/load-more.php';
require 'inc/mail.php';
require 'inc/max-pages.php';
require 'inc/svg.php';
require 'inc/tiny-mce.php';
require 'inc/traffic.php';
