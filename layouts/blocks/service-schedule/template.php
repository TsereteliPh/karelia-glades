<?php
	$schedule = get_sub_field( 'schedule' );
	if ( $schedule ) :
		?>

		<section id="service-schedule" class="service-schedule">
			<div class="container">
				<ul class="reset-list service-schedule__list">
					<?php foreach ( $schedule as $item ) : ?>
						<li class="service-schedule__item">
							<div class="service-schedule__item-period"><?php echo $item['period']; ?></div>

							<div class="service-schedule__item-content">
								<?php if ( $item['service'] ) : ?>
									<div class="service-schedule__item-label"><?php echo $item['service']; ?></div>
								<?php endif; ?>

								<?php if ( $item['text'] ) : ?>
									<div class="service-schedule__item-text"><?php echo $item['text']; ?></div>
								<?php endif; ?>

								<?php if ( $item['button'] ) : ?>
									<div class="service-schedule__item-panel">
										<div class="service-schedule__item-note">Время и дату уточняйте у нашего менеджера</div>
										<button class="btn service-schedule__item-button js-service-button" type="button" data-fancybox data-src="#sing-up" data-service="<?php the_title(); ?>">Записаться</button>
									</div>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>

		<?php
	endif;
?>
