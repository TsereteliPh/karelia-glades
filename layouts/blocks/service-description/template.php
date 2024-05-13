<?php $label = get_sub_field( 'label' ); ?>
<section id="service-description" class="service-description">
	<div class="container service-description__container">
		<div class="service-description__info">
			<?php  if ( $label ) : ?>
				<div class="service-description__label"><?php echo $label; ?></div>
			<?php endif; ?>

			<?php  if ( get_sub_field( 'explanation' ) ) : ?>
				<div class="service-description__explanation"><?php the_sub_field( 'explanation' ); ?></div>
			<?php endif; ?>

			<?php  if ( get_sub_field( 'popular' ) ) : ?>
				<div class="service-description__popular">ПОПУЛЯРНОЕ</div>
			<?php endif; ?>
		</div>

		<div class="service-description__content">
			<?php  if ( get_sub_field( 'text' ) ) : ?>
				<div class="service-description__text"><?php the_sub_field( 'text' ); ?></div>
			<?php endif; ?>

			<?php  if ( get_sub_field( 'button' ) ) : ?>
				<button class="btn service-description__button js-service-button" data-fancybox data-src="#sing-up" data-service="<?php echo $label ? $label : 'Услуга без названия'; ?>">Записаться</button>
			<?php endif; ?>
		</div>
	</div>

	<?php if ( get_sub_field( 'img' ) ) : ?>
		<div class="service-description__img">
			<?php echo wp_get_attachment_image( get_sub_field( 'img' ), 'full', false ); ?>
		</div>
	<?php endif; ?>
</section>
