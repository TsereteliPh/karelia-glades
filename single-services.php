<?php get_header(); ?>

<?php
	$slider = get_field( 'services-slider' );
	if ( $slider ) :
		?>

		<section class="single-services--slider no-breadcrumbs-indent swiper">
			<h1 class="hidden"><?php the_title(); ?></h1>

			<ul class="reset-list single-services__list swiper-wrapper">
				<?php foreach ( $slider as $item ) : ?>
					<li class="swiper-slide single-services__item <?php echo 'single-services__item--' . $item['color']; ?>" style="background-image: url('<?php echo $item['img'] ? $item['img'] : wp_get_attachment_image_url( 17, 'full', false ); ?>')">
						<div class="container">
							<div class="single-services__item-title"><?php the_title(); ?></div>

							<div class="single-services__item-text"><?php echo $item['text']; ?></div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>

			<div class="single-services__panel">
				<div class="pagination pagination--light single-services__pagination"></div>

				<div class="single-services__controls">
					<div class="btn-next single-services__next">
						<svg width="66" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
					</div>

					<div class="btn-prev single-services__prev">
						<svg width="66" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
					</div>
				</div>
			</div>
		</section>

		<?php else : ?>

		<?php
	endif;
?>

<?php get_template_part('layouts/partials/blocks'); ?>

<?php get_footer(); ?>
