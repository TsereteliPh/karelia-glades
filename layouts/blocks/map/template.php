<?php
	$map = get_field( 'map', 'options' );
	$map_link = get_field( 'map_link', 'options' );
	$tel = get_field( 'tel', 'options' );
	$address = get_field( 'address', 'options' );
	$office = get_field( 'office', 'options' );
	$content = false; // ! for temporarily hiding element

	if ( $map ) :
		?>
			<section class="map">
				<div class="map__holder" id="map"></div>

				<?php if ( $content ) : ?>
					<div class="container map__container">
						<div class="map__content">
							<svg class="map__logo" width="100" height="125"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo-secondary"></use></svg>

							<div class="map__info">
								<div class="map__label">Офис</div>

								<?php if ( $address['address'] ) : ?>
									<address><?php echo $address['address']; ?></address>
								<?php endif; ?>

								<?php if ( $tel ) : ?>
									<a href="tel:<?php echo preg_replace( '/[^0-9,+]/', '', $tel ); ?>" class="map__phone"><?php echo $tel; ?></a>
								<?php endif; ?>
							</div>

							<?php
								if ( $office ) {
									echo wp_get_attachment_image( $office, 'medium', false, array(
										'class' => 'map__img'
									) );
								}
							?>
						</div>
					</div>
				<?php endif; ?>

				<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
				<script>
					document.addEventListener("DOMContentLoaded", function (e) {
						function init(){
							<?php $map = json_decode( $map, true ); ?>
							const map = new ymaps.Map('map', {
								center: [<?php echo $map['center_lat'] ?>,<?php echo $map['center_lng'] ?>],
								zoom: <?php echo $map['zoom']; ?>
							});

							<?php foreach ( $map['marks'] as $mark ) : ?>
								map.geoObjects.add(
									new ymaps.Placemark([<?php echo $mark['coords'][0]; ?>, <?php echo $mark['coords'][1]; ?>], { },
										{
											iconLayout: 'default#image',
											iconImageHref: '<?php echo get_template_directory_uri(); ?>/assets/images/icon-marker.svg',
											iconImageSize: [61, 69],
											iconImageOffset: [-30, -69]
										})
								);

								map.geoObjects.each(function (geoObj) {
									geoObj.events.add('click', function () {
										window.open('<?php echo $map_link; ?>', '_blank');
									});
								})
							<?php endforeach; ?>

							map.controls.remove('geolocationControl'); // удаляем геолокацию
							map.controls.remove('searchControl'); // удаляем поиск
							map.controls.remove('trafficControl'); // удаляем контроль трафика
							map.controls.remove('typeSelector'); // удаляем тип
							map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
							// map.controls.remove('zoomControl'); // удаляем контрол зуммирования
							map.controls.remove('rulerControl'); // удаляем контрол правил
							map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
						}

						ymaps.ready(init);
					});
				</script>
			</section>
		<?php
	endif;
?>
